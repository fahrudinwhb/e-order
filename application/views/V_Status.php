<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman Status Pesanan</title>

    <link rel="icon" href="<?php echo base_url('assets-front-end').'/';?>img/fav.png" type="image/x-icon">

    <!-- CSS -->
    <link href="<?php echo base_url('assets-front-end').'/';?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>fonts/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>css/custom.css" rel="stylesheet">

    <!-- modernizr -->
    <script src="<?php echo base_url('assets-front-end').'/';?>js/modernizr.js"></script>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets-front-end').'/';?>js/jquery-2.1.1.js"></script>

    <!--  plugins -->
    <script src="<?php echo base_url('assets-front-end').'/';?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/';?>js/menu.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/';?>js/animated-headline.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/';?>js/isotope.pkgd.min.js"></script>

    <!--  custom script -->
    <script src="<?php echo base_url('assets-front-end').'/';?>js/custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('assets-front-end').'/';?>https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="<?php echo base_url('assets-front-end').'/';?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="pre-container">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- end Preloader -->

    <div class="container-fluid" style="padding:20px">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

            <h5 style="font-size:20px">Status Pesanan Anda:</h5>

            <br>

            <div id="refresh-status">
                <button type="button" onclick="location.reload();"><i class="fa fa-refresh"></i> Cek perubahan status</button>
            </div>
            <?php
                for($i=0;$i<sizeof($Nama);$i++){
            ?>
            <div class="list-pesanan">
                <h5 class="nama-menu-kedai"><?php echo $Nama[$i][0]['NAMA_MENU'];?><i class="fa fa-angle-down" aria-hidden="true"></i></h5>
                Status
                <p><?php echo $Status[$i][0]['STATUS_PEMESANAN'];?></p>
            </div>
            <?php
                }
            ?>
            <br>

            <div class="col-xs-6" id="after-status">
               <a href="<?php echo site_url(''); ?>" style="text-decoration:none;">
                   <button type="button" style="font-weight:600;background:rgba(255,255,255,1);color:rgba(255,120,0,1);padding:10px">Pesan Lagi</button><br>
               </a>
            </div>

            <div class="col-xs-6" id="after-status">
                <strong>
                    <a href="
                     <?php 
                             for($i=0;$i<sizeof($Nama);$i++){
                                 if($Status[$i][0]['STATUS_PEMESANAN'] == 'Selesai'){
                                     echo site_url('C_Pemesanan/Feedback');
                                 }
                             }
                    ?>
                     "
                      
                       style="text-decoration:none;">
                       <button type="button" style="font-weight:600;padding:10px">
                               Selesai
                       </button>
                    </a>
                </strong>
            </div>
        </div>
    </div>

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->

</body>

</html>
