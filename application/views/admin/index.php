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
                <a href="#addEmpModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>ADD SINH VIÊN</span></a>
                
                <table class="table table-bordered" id="employeeListing" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Mã sinh viên</th>
                      <th>Họ và tên</th>
                      <th>Ngày sinh</th>
                      <th>Giới tính</th>
                      <th>Dân tộc</th>
                      <th>Nơi sinh</th>
                      <th>Lớp</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                    
                  <tbody id="listRecords">
                    <?php
                        $query = $this->db->query('SELECT * FROM sinhvien');
                        foreach ($query->result_array() as $row) {
                    ?>
                    <tr >
                      <td><?php echo $row["ma_sv"] ?></td>
                      <td><?php echo $row["hoten_sv"]; ?></td>
                      <td><?php echo $row["ngay_sinh"]; ?></td>
                      <td><?php echo $row["gioi_tinh"]; ?></td>
                      <td><?php echo $row["dan_toc"]; ?></td>
                      <td><?php echo $row["noi_sinh"]; ?></td>
                      <td><?php echo $row["ma_lop"]; ?></td>
                      <td>
							<a href="#editEmpModal" class="btn btn-info btn-sm editRecord " data-toggle="modal"
                            data-masv="<?php echo $row["ma_sv"] ?>" 
                            data-name="<?php echo $row["hoten_sv"] ?>" 
                            data-ngaysinh="<?php echo $row["ngay_sinh"] ?>" 
                            data-sex="<?php echo $row["gioi_tinh"] ?>" 
                            data-dantoc="<?php echo $row["dan_toc"] ?>" 
                            data-address="<?php echo $row["noi_sinh"] ?>"
                            data-malop="<?php echo $row["ma_lop"] ?>"
                            >Edit</a>
							<a href="#deleteEmpModal" class="btn btn-danger btn-sm deleteRecord" data-toggle="modal" data-masv="<?php echo $row["ma_sv"] ?>">Delete</a>
					 </td>
                    </tr>
                    <?php 
                        }
                    ?>
                  </tbody>
                </table>
                <form id="saveEmpForm" method="post">
                    <div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    
                <form id="editEmpForm" method="post">
                    <div class="modal fade" id="editEmpModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">                       
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Mã SV</label>
                                                <div class="col-md-10">
                                                <input type="text" name="ma_sv" id="ma_sv1" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Name</label>
                                                <div class="col-md-10">
                                                <input type="text" name="hoten_sv" id="hoten_sv1" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Date</label>
                                                <div class="col-md-10">
                                                <input type="date" name="ngay_sinh" id="ngay_sinh1" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Sex</label>
                                                <div class="col-md-10">
                                                    <label>
                                                        <input type="radio" name="gioi_tinh" id="gioi_tinh1" value="Nam">
                                                        Nam
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="gioi_tinh" id="gioi_tinh1" value="Nữ" checked>
                                                        Nữ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Dân Tộc</label>
                                                <div class="col-md-10">
                                                <input type="text" name="dan_toc" id="dan_toc1" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Address</label>
                                                <div class="col-md-10">
                                                <input type="text" name="noi_sinh" id="noi_sinh1" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Class</label>
                                                <div class="col-md-10">
                                                <input type="text" name="ma_lop" id="ma_lop1" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="ma_sv" id="ma_sv" class="form-control">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="update" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form id="deleteEmpForm" method="post">
                    <div class="modal fade" id="deleteEmpModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <strong>Are you sure to delete this record?</strong>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="ma_sv" id="ma_sv" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
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