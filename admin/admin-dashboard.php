<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];


  //code for summing up number of users 
  $result ="SELECT count(*) FROM tms_user where u_category = 'User'";
  $stmt = $mysqli->prepare($result);
  $stmt->execute();
  $stmt->bind_result($user);
  $stmt->fetch();
  $stmt->close();


  //code for summing up number of drivers
  $result ="SELECT count(*) FROM tms_user where u_category = 'Driver'";
  $stmt = $mysqli->prepare($result);
  $stmt->execute();
  $stmt->bind_result($driver);
  $stmt->fetch();
  $stmt->close();

  //code for summing up number of vehicles
  $result ="SELECT count(*) FROM tms_vehicle";
  $stmt = $mysqli->prepare($result);
  $stmt->execute();
  $stmt->bind_result($vehicle);
  $stmt->fetch();
  $stmt->close();

  //code for summing up number of booking 
  $result ="SELECT count(*) FROM tms_user where u_car_book_status = 'Approved' || u_car_book_status = 'Pending' ";
  $stmt = $mysqli->prepare($result);
  $stmt->execute();
  $stmt->bind_result($book);
  $stmt->fetch();
  $stmt->close();

  $cards = [
    [
      'count' => $user,
      'icon' => "fas fa-fw fa-users",
      'name' => 'User',
      'link' => 'admin-view-user.php'
    ],
    [
      'count' => $driver,
      'icon' => "fas fa-fw fa fa-id-card",
      'name' => 'Driver',
      'link' => 'admin-view-driver.php'
    ],
    [
      'count' => $vehicle,
      'icon' => "fas fa-fw fa fa-bus",
      'name' => 'Vehicle',
      'link' => 'admin-view-vehicle.php'
    ],
    [
      'count' => $book,
      'icon' => "fas fa-fw fa fa-address-book",
      'name' => 'Booking',
      'link' => 'admin-view-booking.php'
    ],
  ]

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Car Rental System Transport Saccos, Matatu Industry">
  <meta name="author" content="MartDevelopers">

  <title>Car Rental System - Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
 <!--Start Navigation Bar-->
  <?php include("vendor/inc/nav.php");?>
  <!--Navigation Bar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("vendor/inc/sidebar.php");?>
    <!--End Sidebar-->
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">

          <?php foreach($cards as $card): ?>
          <div class="col-xl-5 col-sm-12 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: #35374B">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="<?= $card['icon'] ?>" ></i>
                </div>
                <div class="mr-5"><span class="badge badge-secondary"><?= $card['count'] ?></span> <?= $card['name'] ?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?= $card['link'] ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <?php endforeach ?>

        </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include("vendor/inc/footer.php");?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="admin-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>

</body>

</html>
