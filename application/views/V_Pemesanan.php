<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman Pemesanan</title>

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

    <div class="container-fluid">
        <?php $this->load->view('V_Header.php');?>
    </div>

    <div class="container-fluid" style="padding:20px;margin-top:80px">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

            <h5 style="font-size:20px">Daftar Pesanan Anda:</h5><br>

            <div id="nomor-meja">
                <p>Nomor meja</p>
                <input type="number" min="1" max="24" placeholder="0" name="NoMeja" form="iniForm" required>
            </div>
            <form id="iniForm" action="<?php echo site_url('C_Pemesanan/inputPemesanan');?>" method="post">
               <?php
                for($i=0;$i<sizeof($Tmp);$i++){
                ?>
            <div class="list-pesanan">
                   <input type="text" name="idKedai[]" hidden="hidden" value="<?php echo $Tmp[$i][0]['ID_KEDAI']; ?>">
                   <input type="text" name="idMenu[]" hidden="hidden" value="<?php echo $Tmp[$i][0]['ID_MENU']; ?>">
                   <input type="text" name="jumlah[]" hidden="hidden" value="<?php echo $Jumlah[$i];?>">
                   <input type="text" name="harga[]" hidden="hidden" value="<?php echo $Jumlah[$i]*$Tmp[$i][0]['HARGA_MENU'];?>">
                    <h5 class="nama-menu-kedai"><?php echo $Tmp[$i][0]['NAMA_MENU']; ?><i class="fa fa-angle-down" aria-hidden="true"></i></h5>
                    Jumlah <p><?php echo $Jumlah[$i];?></p>
                    Harga <p><?php echo $Jumlah[$i]*$Tmp[$i][0]['HARGA_MENU'];?></p>
                    <a href="<?php echo site_url('C_Pemesanan/delTmpData').'/'.$Tmp[$i][0]['ID_MENU'];?>">
                        <button type="button">Batal</button>
                    </a>
                    <?php $TotalHarga[] = $Jumlah[$i]*$Tmp[$i][0]['HARGA_MENU']; ?>
            </div>
                <?php } ?>
                </form>
            <div id="kirim">
                Total Harga
                <p>
                    <?php
                        $total = $TotalHarga[0]+next($TotalHarga);
                        echo $total;
                    ?>
                </p>
                <button type="submit" form="iniForm"><i class="fa fa-send"></i></button>
            </div>
        </div>
    </div>

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->

</body>

</html>
