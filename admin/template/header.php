<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-vote  <sup>System</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
   <!--    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" href="addelection.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Add Election</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="position.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Add Position</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="college.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Add College</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="course.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Add Department</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="candidates.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Add Candidate</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../Register.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Add Voters</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="voter.php">
          <i class="fas fa-fw fa-book"></i>
          <span>View Voters</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="result.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Result</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
 

    
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

       <!-- Heading -->
      <div class="sidebar-heading">
        Device side
      </div>

       <li class="nav-item">
        <a class="nav-link" href="../ActiveDevice.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Activate Device</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0);" id="open_api_form">
          <i class="fas fa-fw fa-key"></i>
          <span>API SETTINGS</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

<h6 style="color: green; font-weight: 700;">USING FINGER PRINT AS AUTHENTICATION</h6>
  
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

 
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo  $name;?></span>
                <img class="img-profile rounded-circle" src="../img/noimage.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->