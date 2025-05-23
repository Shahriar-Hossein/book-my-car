<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
?>

<?php include("vendor/inc/head.php");?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="user-dashboard.php">Dashboard</a>
  </li>
  <li class="breadcrumb-item">Booking</li>
  <li class="breadcrumb-item ">View My Booking</li>
</ol>

<!-- My Bookings-->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Bookings</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Vehicle Type</th>
            <th>Reg No.</th>
            <th>Booking date</th>
            <th>Status</th>
          </tr>
        </thead>
        
        <tbody>
        <?php
            $aid=$_SESSION['u_id'];
            $ret="SELECT * from tms_user where u_id=? ";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object()) :
        ?>
          <tr>
            <td><?php echo $row->u_fname;?> <?php echo $row->u_lname;?></td>
            <td><?php echo $row->u_phone;?></td>
            <td><?php echo $row->u_car_type;?></td>
            <td><?php echo $row->u_car_regno;?></td>
            <td><?php echo $row->u_car_bookdate;?></td>
            <td><?php echo $row->u_car_bookdate ? "Paid" :"";?></td>
            <td>
              <?=
              ($row->u_car_book_status === "Pending") 
              ? '<span class = "badge badge-warning">'.$row->u_car_book_status.'</span>' 
              : '<span class = "badge badge-success">'.$row->u_car_book_status.'</span>'
              ?>
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
      echo "Generated:" . date("h:i:sa");
    ?> 
  </div>
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

</body>

</html>
