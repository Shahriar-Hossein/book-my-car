<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark pb-2">
  <div class="container-fluid">
    <!-- Section for Logo and Brand -->
    <div class="d-flex align-items-center">
      <img src="resource/car.png" alt="Car Logo" height="60px" class="mr-2">
      <a class="navbar-brand" href="index.php">
        <h4 class="mb-0">Car Rental System</h4>
      </a>
    </div>

    <!-- Support Email Section (Hidden on smaller devices) -->
    <div class="d-none d-lg-flex align-items-center ml-auto mr-4">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="mr-2" width="24" height="24">
        <path fill="#ffffff" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
      </svg>
      <div>
        <h6 class="mb-0 text-white">For Support</h6>
        <p class="mb-0 text-white-50 small">sadia@khushbo.com</p>
      </div>
    </div>

    <!-- Service Helpline Section (Hidden on smaller devices) -->
    <div class="d-none d-lg-flex align-items-center mr-4">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="mr-2" width="24" height="24">
        <path fill="#ffffff" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
      </svg>
      <div>
        <h6 class="mb-0 text-white">Helpline</h6>
        <p class="mb-0 text-white-50 small">+88013XXXXXXXXX</p>
      </div>
    </div>

    <!-- Toggler for Mobile View -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible Menu -->
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery.php">Gallery</a>
        </li>

        <!-- Login Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18">
              <path fill="#ffffff" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/>
            </svg>
            Login Panel
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="admin/">Admin Login</a>
            <a class="dropdown-item" href="usr/">Client Login</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
