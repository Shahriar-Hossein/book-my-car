<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
  //Add Booking
  if(isset($_POST['delete_booking']))
  {
    $u_id = $_SESSION['u_id'];
    //$u_fname=$_POST['u_fname'];
    //$u_lname = $_POST['u_lname'];
    //$u_phone=$_POST['u_phone'];
    //$u_addr=$_POST['u_addr'];
    $u_car_type = $_POST['u_car_type'];
    $u_car_regno  = $_POST['u_car_regno'];
    $u_car_bookdate = $_POST['u_car_bookdate'];
    $u_car_book_status  = $_POST['u_car_book_status'];
    $query="update tms_user set u_car_type=?, u_car_regno=?, u_car_bookdate=?,  u_car_book_status=? where u_id=?";
    $stmt = $mysqli->prepare($query);
    $rc=$stmt->bind_param('ssssi',  $u_car_type, $u_car_regno, $u_car_bookdate, $u_car_book_status, $u_id);
    $stmt->execute();
    if($stmt)
    {
        $succ = "Booking Cancelled";
    }
    else 
    {
        $err = "Please Try Again Later";
    }
  }
?>
<?php include('vendor/inc/head.php');?>

<?php if(isset($succ)) {?>
<!--This code for injecting an alert-->
  <script>
  setTimeout(function () 
  { 
      swal("Success!","<?php echo $succ;?>!","success");
  },
      100);
  </script>

  <?php } ?>
  <?php if(isset($err)) {?>
  <!--This code for injecting an alert-->
  <script>
  setTimeout(function () 
  { 
      swal("Failed!","<?php echo $err;?>!","Failed");
  },
      100);
  </script>

  <?php } ?>

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="user-dashboard.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item">Booking</li>
    <li class="breadcrumb-item ">Cancel My Booking</li>
  </ol>
  <hr>
  <div class="card">
  <div class="card-header">
    Approve Booking
  </div>
  <div class="card-body">
    <!--Add User Form-->
    <?php
      $aid=$_GET['u_id'];
      $ret="select * from tms_user where u_id=?";
      $stmt= $mysqli->prepare($ret) ;
      $stmt->bind_param('i',$aid);
      $stmt->execute() ;//ok
      $res=$stmt->get_result();
      //$cnt=1;
      while($row=$res->fetch_object())
  {
  ?>
    <form method ="POST"> 
      <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" readonly value="<?php echo $row->u_fname;?>" required class="form-control" id="exampleInputEmail1" name="u_fname">
      </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input type="text" readonly  class="form-control" value="<?php echo $row->u_lname;?>" id="exampleInputEmail1" name="u_lname">
      </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Contact</label>
          <input type="text" readonly class="form-control" value="<?php echo $row->u_phone;?>" id="exampleInputEmail1" name="u_phone">
      </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" readonly class="form-control" value="<?php echo $row->u_addr;?>" id="exampleInputEmail1" name="u_addr">
      </div>
      
      <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" readonly value="<?php echo $row->u_email;?>" class="form-control" name="u_email"">
      </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Vehicle Category</label>
          <input type="email" readonly placeholder="<?php echo $row->u_car_type;?>" class="form-control" name="u_car_type">
      </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Vehicle Registration NUmber</label>
          <input type="email" readonly placeholder="<?php echo $row->u_car_regno;?>" class="form-control" name="u_car_regno">
      </div>

  
      <div class="form-group">
          <label for="exampleInputEmail1">Booking Date</label>
          <input type="text" readonly placeholder="<?php echo $row->u_car_bookdate;?>" class="form-control"   name="u_car_bookdate">
      </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Booking Status</label>
          <input type="text" readonly placeholder="<?php echo $row->u_car_book_status;?>" class="form-control" id="exampleInputEmail1"  name="u_car_book_status">
      </div>

      

      <button type="submit" name="delete_booking" class="btn btn-danger">Cancel Booking</button>
    </form>
    <!-- End Form-->
  <?php }?>
  </div>
</div>
  
<hr>

</div>
  <!-- Sticky Footer -->
  <?php include("vendor/inc/footer.php");?>

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
