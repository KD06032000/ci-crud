<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>QUẢN LÝ SINH VIÊN</title>
    <!-- Custom fonts for this template-->
    <link href="http://qlnd.com/application/bootstraps/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    <!-- Custom styles for this template-->
    <link href="http://qlnd.com/application/bootstraps/css/sb-admin-2.min.css" rel="stylesheet">
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
                <div class="sidebar-brand-text mx-3">QUẢN LÝ SINH VIÊN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Sinh Viên</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

        </ul>
        <div class="container-fluid">
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Tất cả sinh viên
            </div>
            <div class="card-body">
                <div class="table-responsive">  
                    <br />  
                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>  
                    <br /><br />  
                    <table id="user_data" class="table table-bordered table-striped">  
                        <thead>  
                            <tr>  
                                <th >MA SV</th>  
                                <th >Name</th>  
                                <th >Date</th>
                                <th >SEX</th> 
                                <th >DAN TOc</th> 
                                <th >ADDRESS</th> 
                                <th >MALOP</th>   
                                <th >Edit</th>  
                                <th >Delete</th>  
                            </tr>  
                        </thead>  
                    </table>  
                </div>
                
                <div id="userModal" class="modal fade">  
                    <div class="modal-dialog">  
                        <form method="post" id="user_form">  
                                <div class="modal-content">  
                                    <div class="modal-header">  
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                        <h4 class="modal-title">Add User</h4>  
                                    </div>  
                                    <div class="modal-body">  
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Mã SV</label>
                                            <div class="col-md-10">
                                                <input type="text" name="ma_sv" id="ma_sv" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Name</label>
                                            <div class="col-md-10">
                                                <input type="text" name="hoten_sv" id="hoten_sv" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Date</label>
                                            <div class="col-md-10">
                                                <input type="date" name="ngay_sinh" id="ngay_sinh" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Sex</label>
                                            <div class="col-md-10">
                                                <label>
                                                    <input type="radio" name="gioi_tinh" id="gioi_tinh" value="Nam" >
                                                                Nam
                                                </label>
                                                <label>
                                                    <input type="radio" name="gioi_tinh" id="gioi_tinh" value="Nữ">
                                                                Nữ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Dân Tộc</label>
                                            <div class="col-md-10">
                                                <input type="text" name="dan_toc" id="dan_toc" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Address</label>
                                            <div class="col-md-10">
                                                <input type="text" name="noi_sinh" id="noi_sinh" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Class</label>
                                            <div class="col-md-10">
                                                <input type="text" name="ma_lop" id="ma_lop" class="form-control" required>
                                            </div>
                                        </div>  
                                    </div>  
                                    <div class="modal-footer"> 
                                        <input type="hidden" name="user_id" id="user_id" /> 
                                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                    </div>  
                                </div>  
                        </form>  
                    </div>  
                </div> 
                
            </div>
          </div>
        </div>
      </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <script src="http://qlnd.com/application/bootstraps/vendor/jquery/jquery.min.js"></script>
    <!-- <script src="../../bootstraps/vendor/jquery/jquery.min.js"></script> -->
    <script src="http://qlnd.com/application/bootstraps/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://qlnd.com/application/bootstraps/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://qlnd.com/application/bootstraps/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="http://qlnd.com/application/bootstraps/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="http://qlnd.com/application/bootstraps/js/ajax.js"></script>
    <script src="http://qlnd.com/application/bootstraps/js/dataTable.js"></script>
    <script src="http://qlnd.com/application/bootstraps/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
</body>

</html>
