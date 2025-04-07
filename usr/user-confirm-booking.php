<?php
  session_start();
  include 'vendor/inc/config.php';
  include 'vendor/inc/checklogin.php';
  check_login();
  $aid=$_SESSION['u_id'];

  $vehicle_id=$_GET['v_id'];
  $ret="select * from tms_vehicle where v_id=?";
  $stmt= $mysqli->prepare($ret) ;
  $stmt->bind_param('i',$vehicle_id);
  $stmt->execute() ;
  $res=$stmt->get_result();
  $vehicle = $res->fetch_object();
?>

<?php include 'vendor/inc/head.php'; ?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="user-dashboard.php">Dashboard</a>
  </li>
  <li class="breadcrumb-item">Vehicle</li>
  <li class="breadcrumb-item ">Book Vehicle</li>
  <li class="breadcrumb-item active">Confirm Booking</li>
</ol>
<hr>
<div class="card">
  <div class="card-header">
    Confirm Booking
  </div>
  <div class="card-body">
    <!--Add User Form-->
    <form method ="POST" action="checkout.php"> 
      <div class="form-group">
        <label for="exampleInputEmail1">Vehicle Category</label>
        <input type="text" value="<?php echo $vehicle->v_category;?>" readonly class="form-control" name="u_car_type">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Vehicle Registration Number</label>
        <input type="email" value="<?php echo $vehicle->v_reg_no;?>" readonly class="form-control" name="u_car_regno">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Vehicle Rental Price</label>
        <input type="text" value="<?php echo $vehicle->v_price;?>" readonly class="form-control" name="u_car_price">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Booking Date</label>
        <input type="date" class="form-control" id="bookingDate" name="u_car_bookdate" min="" required>
      </div>
      <div class="form-group" style="display:none">
        <label for="exampleInputEmail1">Book Status</label>
        <input type="text" value="Pending" class="form-control" id="exampleInputEmail1"  name="u_car_book_status">
      </div>
      
      <!-- Hidden field for Product ID -->
      <input type="hidden" name="vehicle_id" value="<?php echo $vehicle->v_id; ?>">

      <button type="submit" name="book_vehicle" class="btn btn-success">Confirm Booking</button>
    </form>
    <!-- End Form-->
  </div>
</div>


</div>
<!-- /.container-fluid closer from head -->
<hr>

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
        <a class="btn btn-danger" href="admin-logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>

  <script>
  // Get today's date and calculate tomorrow's date
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1); // Add 1 day for tomorrow's date
  
  // Format the date in YYYY-MM-DD for tomorrow
  const year = tomorrow.getFullYear();
  const month = String(tomorrow.getMonth() + 1).padStart(2, '0');
  const day = String(tomorrow.getDate()).padStart(2, '0');
  const tomorrowDate = `${year}-${month}-${day}`;
  
  // Set the minimum date to tomorrow in the booking date input field
  document.getElementById('bookingDate').setAttribute('min', tomorrowDate);

  // Now, calculate the max date (1 month from today)
  const maxDate = new Date();
  maxDate.setMonth(maxDate.getMonth() + 1); // Add 1 month
  
  // Ensure the day remains valid when moving to next month
  const maxYear = maxDate.getFullYear();
  const maxMonth = String(maxDate.getMonth() + 1).padStart(2, '0');
  const maxDay = String(maxDate.getDate()).padStart(2, '0');
  const maxBookingDate = `${maxYear}-${maxMonth}-${maxDay}`;
  
  // Set the maximum date to 1 month from today in the booking date input field
  document.getElementById('bookingDate').setAttribute('max', maxBookingDate);
  </script>
  
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
