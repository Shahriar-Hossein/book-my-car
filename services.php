<!DOCTYPE html>
<html lang="en">

<?php include "vendor/inc/head.php"; ?>

<body class="d-flex flex-column min-vh-100">

  <!-- Navigation -->
  <?php include "vendor/inc/nav.php"; ?>

  <!-- Page Content -->
  <div class="container flex-grow-1 mt-4">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Services
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Services</li>
    </ol>

    <!-- Image Header -->
    <div class="img-container mb-4" style="width: 100%; height: 420px; overflow: hidden;">
      <img class="img-fluid rounded mb-4" src="vendor/img/service.webp" alt="" style="width: 100%; height: 100%; object-fit: scale-down; background-color: #f8f9fa;">
    </div>


    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Enhanced Transport Modes</h4>
          <div class="card-body">
            <p class="card-text">
              We Improve access to public transport for all people and organizations by strengthening
              he condition s for sustainable transport modes.
            </p>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Faster And Safe Travels</h4>
          <div class="card-body">
            <p class="card-text">
              Our Travels reduce traffic growth and congestion by achieving a mode shift from private
              motorized vehicle trips to a more efficient and sustainable mode of transport.
            </p>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Networking</h4>
          <div class="card-body">
            <p class="card-text">
              Create an efficient multimodal public transport network that will facilitate the
              interconnection and interoperability of associated transport network.
            </p>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include("vendor/inc/footer.php");?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
