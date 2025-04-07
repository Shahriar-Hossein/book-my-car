<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  if( ! isset($_SESSION['u_id'])){
    $_SESSION['u_id'] = $_GET['user_id'] ?? 0;
  }
  check_login();
  $aid=$_SESSION['u_id'];
  $notice = $_GET['status'] ?? -1;

  if($notice == 1 && $_GET['vehicle_id'] && $_GET['booking_date']) {
    $vehicle_id = intval($_GET['vehicle_id']); // Get and sanitize vehicle_id from query params
    
    // Step 1: Fetch vehicle details using the vehicle_id
    $query = "SELECT * FROM tms_vehicle WHERE v_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $vehicle_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
      $vehicle = $result->fetch_assoc();
      $car_type = $vehicle['v_name'];
      $reg_no = $vehicle['v_reg_no'];
      $date = $_GET['booking_date']; // Set the current timestamp as booking date
      
      $user_id = $_SESSION['u_id']; // Or any method to get the current user's ID
      $status = 'pending'; // Set the status to 'booked' or whatever is applicable
      
      $updateQuery = "UPDATE tms_user SET u_car_type = ?, u_car_regno = ?, u_car_bookdate = ?, u_car_book_status = ? WHERE u_id = ?";
      $updateStmt = $mysqli->prepare($updateQuery);
      $updateStmt->bind_param("ssssi", $car_type, $reg_no, $date, $status, $user_id);
      
      if ($updateStmt->execute()) {
          echo "User table updated successfully.";
      } else {
          echo "Error updating user table.";
      }
    }
  }
?>

<!--Head-->
<?php include ('vendor/inc/head.php');?>
<!--End Head-->

<?php if($notice ==1 ) : ?>
<!--This code for injecting an alert-->
  <script>
  setTimeout(function () { 
    swal("Success!","Car booked for you!","success");
  },100);
  </script>
<?php endif ?>

<?php if($notice ==0) : ?>
  <!--This code for injecting an alert-->
  <script>
  setTimeout(function () { 
    swal("Failed!","Car could not be booked!","error");
  },100);
  </script>
<?php endif; ?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="user-dashboard.php">Dashboard</a>
  </li>
  <li class="breadcrumb-item">Vehicle</li>
  <li class="breadcrumb-item active">Book Vehicle</li>
</ol>


<!--Bookings-->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-bus"></i>
    Available Vehicles</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Vehicle Name</th>
            <th>Reg No.</th>
            <th>Price</th>
            <th>Seats</th>
            <th>Driver</th>
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>

        <?php
          $ret="SELECT * FROM tms_vehicle  where   v_status ='Available' "; //get all bookings
          $stmt= $mysqli->prepare($ret) ;
          $stmt->execute() ;//ok
          $res=$stmt->get_result();
          $cnt=1;
          while($row=$res->fetch_object()) :
        ?>
          <tr>
            <td><?php echo $cnt++;?></td>
            <td><?php echo $row->v_name;?></td>
            <td><?php echo $row->v_reg_no;?></td>
            <td><?php echo $row->v_price;?></td>
            <td><?php echo $row->v_pass_no;?> Passengers</td>
            <td><?php echo $row->v_driver;?></td>
            <td>
              <a href="user-confirm-booking.php?v_id=<?php echo $row->v_id;?>" class = "btn btn-outline-success"><i class ="fa fa-clipboard"></i> Book Vehicle</a>
            </td>
          </tr>
          <?php endwhile; ?>
          
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">
    <?php
      date_default_timezone_set("Africa/Nairobi");
      echo "Generated At : " . date("h:i:sa");
    ?> 
  </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Sticky Footer -->
<?php include("vendor/inc/footer.php");?>

</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->


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
          <a class="btn btn-danger" href="user-logout.php">Logout</a>
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
  <!--INject Sweet alert js-->
  <script src="vendor/js/swal.js"></script>

</body>

</html>
