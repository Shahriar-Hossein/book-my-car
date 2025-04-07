<?php
// Configure session cookie parameters
session_set_cookie_params([
    'lifetime' => 0,            // The session will last until the browser is closed
    'path' => '/',              // Cookie is available in the entire domain
    'domain' => 'localhost',    // Use your domain here, 'localhost' for local development
    'secure' => false,          // Set to false during local development to allow both HTTP and HTTPS
    'httponly' => true,         // Ensures the cookie is only accessible via HTTP (not JavaScript)
    'samesite' => 'Lax'         // Lax allows cookies to be sent when navigating from HTTP to HTTPS
]);

session_start();
include_once("vendor/inc/config.php");
include('vendor/inc/checklogin.php');

check_login();
$user_id=$_SESSION['u_id'];

// Query to get the user's first name, last name, phone number, and email
$query = "SELECT u_fname, u_lname, u_phone, u_email FROM tms_user WHERE u_id = ?";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $user_id);
// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the user's details
$row = $result->fetch_assoc();
$first_name = $row['u_fname'];
$last_name = $row['u_lname'];
$phone = $row['u_phone'];
$email = $row['u_email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $car_type = $_POST['u_car_type'];
    $car_regno = $_POST['u_car_regno'];
    $book_date = $_POST['u_car_bookdate'];
    $book_status = $_POST['u_car_book_status'];
    $vehicle_id = $_POST['vehicle_id'];  // Assuming vehicle_id is passed as a hidden input field

    // Query to get the vehicle price from the database
    $query = "SELECT v_price FROM tms_vehicle WHERE v_id = ?";
    // Prepare the SQL statement
    $stmt = $mysqli->prepare($query);
    // Bind the vehicle ID parameter
    $stmt->bind_param("i", $vehicle_id);
    // Execute the query
    $stmt->execute();
    // Get the result
    $result = $stmt->get_result();
    // Fetch the vehicle price
    $row = $result->fetch_assoc();
    $vehicle_price = $row['v_price'];

    // Close the statement
    $stmt->close();
} else {
    // Redirect the user to the previous page if the request is not POST
    if (isset($_SERVER['HTTP_REFERER'])) {
        // Go back to the previous page
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        // If there's no HTTP_REFERER, redirect to a default page
        header("Location: usr-book-vehicle.php"); // Replace with your default page
    }
}

/* PHP */
$post_data = array();
$post_data['store_id'] = "cyber670e1cc54b674";
$post_data['store_passwd'] = "cyber670e1cc54b674@ssl";
$post_data['total_amount'] = $vehicle_price ?? 2500;
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
$post_data['success_url'] = "http://localhost/book-my-car/usr/usr-book-vehicle.php?" . http_build_query(['status' => 1, 'user_id'=>$user_id,'booking_date'=>$_POST['u_car_bookdate'],'vehicle_id'=>$_POST['vehicle_id']]);
$post_data['fail_url'] = "http://localhost/book-my-car/usr/usr-book-vehicle.php?" . http_build_query(['status' => 0, 'user_id'=>$user_id]);
$post_data['cancel_url'] = "http://localhost/book-my-car/usr/usr-book-vehicle.php?" . http_build_query(['status' => -1, 'user_id'=>$user_id]);

# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

# EMI INFO
$post_data['emi_option'] = "1";
$post_data['emi_max_inst_option'] = "9";
$post_data['emi_selected_inst'] = "9";

# CUSTOMER INFORMATION
$post_data['cus_name'] = $first_name . ' ' . $last_name;
$post_data['cus_email'] = $email;
$post_data['cus_add1'] = "Dhaka";
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = $phone;
$post_data['cus_fax'] = $phone;

# SHIPMENT INFORMATION
$post_data['ship_name'] = "Triptrip";
$post_data['ship_add1 '] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1230";
$post_data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$post_data['value_a'] = $user_id;
$post_data['value_b'] = $vehicle_id;
$post_data['value_c'] = "ref003";
$post_data['value_d'] = "ref004";

$post_data['product_amount'] = $vehicle_price ?? 2500;
$post_data['vat'] = "0";
$post_data['discount_amount'] = "0";
$post_data['convenience_fee'] = "0";

# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url);
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1);
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code == 200 && !(curl_errno($handle))) {
    curl_close($handle);
    $sslcommerzResponse = $content;
} else {
    curl_close($handle);
    echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
    exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true);

if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
    # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
    # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
    // echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
    header("Location: ". $sslcz['GatewayPageURL']);
    exit;
} else {
    echo "JSON Data parsing error!";
}