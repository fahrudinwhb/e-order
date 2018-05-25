<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login E-Order</title>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/fav.png" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/font/flaticon.css">
</head>
<style>
    body{
    background-image: url(<?php echo base_url()?>assets/img/bexy.jpg);
    background-repeat: no-repeat;
}
</style>
<body>
<div class="container">
    <div class="login">
        <div class="col-xs-12 col-md-5 col-centered">
            <div class="col-xs-12 no-padding">
                <div class="col-xs-12 top-section">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-8">
                        <img src="<?php echo base_url() ?>/assets/img/logo-2.png" class="img-responsive">
                    </div>
                    <div class="col-xs-2"></div>
                </div>
                <div class="col-xs-12 down-section">
                    <div class="inner-down">
                        <p class="login-header">Login</p>
                        <p class="login-subheader">Masukkan Username dan Password</p>
                        <form action="<?php echo site_url('login')?>" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <input type="text" class="form-control" placeholder="username" name="username">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                    <input type="password" class="form-control" placeholder="password" id="exampleInputAmount" name="password">
                                </div>
                            </div>
                            <input type="submit" value="Log In" class="login-btn center-block" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script>
    <?php if($this->session->flashdata('login') == "gagal"){
        echo 'alert("Login Gagal,Cek Usernam dan Password anda")';
    }
     ?>
    </script>
</body>

</html>
