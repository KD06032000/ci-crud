<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Đăng nhập</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link href="http://qlnd.com/application/bootstraps/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">

  <div class="container">

    <div class="card card-login mx-auto mt-5 "> 
      <div class="card-header">Login Admin Page</div>
      <div class="card-body">
        <?php 
          if($this->session->flashdata('success')) {
        ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
        <?php
          } else if($this->session->flashdata('error')) {
        ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
        <?php 
          }
        ?>
        <form action="<?php echo base_url('index.php/login-user')?>" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Username" >
              <label for="inputEmail">Username</label>
            </div>
            <div style="color:red">
              <?php echo form_error('email'); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
              <label for="inputPassword">Password</label>
            </div>
            <div style="color:red">
              <?php echo form_error('password'); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Ghi nhớ mật khẩu
              </label>
            </div>
          </div>
          <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="">Đăng ký tài khoản</a>
          <a class="d-block small" href="">Quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </div>

</body>
<!-- Bootstrap core JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>