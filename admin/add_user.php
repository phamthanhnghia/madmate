<?php
require_once('../system/model/Users.php');
require_once('../system/controller/UsersController.php');

$mUsers = new Users();
$usersController = new UsersController();
$usersController->postAddNewUser();
// echo $_SERVER['SERVER_NAME'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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

          <!-- Topbar Search -->


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Add New User</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form</h6>
            </div>
            <div class="card-body">
              <!-- Body -->
              <form action="/madmate/admin/add_user.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="email">First Name:</label>
                  <input value="Phạm" type="text" class="form-control" id="email" placeholder="First Name" name="first_name">
                </div>
                <div class="form-group">
                  <label for="pwd">Last Name:</label>
                  <input value="nghia" type="text" class="form-control" id="pwd" placeholder="Last Name" name="last_name">
                </div>
                <div class="form-group">
                  <label for="pwd">Gender:</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="gender">
                    <?php foreach ($mUsers->getArrayGender() as $key => $value) : ?>
                      <option><?= $value ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
                <div class="form-group">
                  <label for="pwd">Birth day:</label>
                  <input class="form-control" type="date" value="2011-08-19" name="dob" id="example-date-input">
                </div>
                <div class="form-group">
                  <label for="pwd">Email:</label>
                  <input value="test@gmail.com" type="email" class="form-control" id="pwd" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Job:</label>
                  <input value="staff" type="text" class="form-control" id="pwd" placeholder="Job" name="job">
                </div>
                <div class="form-group">
                  <label for="pwd">Marriage Status:</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="marriage_status">
                    <?php foreach ($mUsers->getArrayMarriage() as $key => $value) : ?>
                      <option><?= $value ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Roles:</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="roles">
                    <?php foreach ($mUsers->getArrayRoles() as $key => $value) : ?>
                      <option><?= $value ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pwd">Address:</label>
                  <input value="98 Điện biên phủ, Quận 1, TPHCM" type="text" class="form-control" id="pwd" placeholder="Address:" name="address">
                </div>
                <div class="form-group">
                  <label for="pwd">City:</label>
                  <input value="TPHCM" type="text" class="form-control" id="pwd" placeholder="Last Name" name="city">
                </div>
                <div class="form-group">
                  <label for="pwd">Postal Code:</label>
                  <input value="0901902"type="text" class="form-control" id="pwd" placeholder="Last Name" name="postal_code">
                </div>

                <div class="form-group">
                  <label for="pwd">Country:</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="country">
                    <?php foreach ($mUsers->getArrayCountry() as $key => $value) : ?>
                      <option><?= $value ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
                <div class="form-group">
                  <label for="pwd">Avatar</label>
                  <input type="file" class="form-control-file" name="avatar" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>