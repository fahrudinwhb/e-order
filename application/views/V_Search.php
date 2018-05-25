<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman Pencarian</title>

    <link rel="icon" href="<?php echo base_url('assets-front-end').'/';?>img/fav.png" type="image/x-icon">

    <!-- CSS -->
    <link href="<?php echo base_url('assets-front-end').'/';?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>fonts/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/sweetalert2.min.css" rel="stylesheet">

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
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/sweetalert2.min.js"></script>
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
        <!-- box header -->
        <header class="box-header">
            <div class="box-logo">
                <a href="Home.html"><img src="<?php echo base_url('assets-front-end').'/';?>img/logo-1.png" width="100" alt="Logo"></a>
            </div>
            <!-- box-nav -->
            <a class="box-primary-nav-trigger" href="#0">
                <span class="box-menu-text">Pemesanan</span><span class="box-menu-icon"></span>
            </a>
            <!-- box-primary-nav-trigger -->
        </header>
        <!-- end box header -->

        <!-- nav -->
        <?php
            $this->load->view('V_Header.php');
        ?>
        <!-- end nav -->
    </div>

    <div class="container-fluid" style="padding:20px;margin-top:80px">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

        <form autocomplete="off" action="<?php echo site_url('C_Search');?>" method="post">
            <div id="search" class="text-center">
                <input type="text" placeholder="Ketik 'Nama Makanan/Minuman'" name="key">
                <button type="submit"><i class="fa fa-arrow-right"></i></button>
            </div>
        </form>

            <br>
            <?php
                    foreach($menu as $row){

            ?>
            <div class="list-menu">
                <form class="pesan">
                    <h5 class="nama-menu-kedai"><?php echo $row['NAMA_MENU'];?><i class="fa fa-angle-down" aria-hidden="true"></i></h5>
                    <p><?php echo $row['DESKRIPSI_MENU'];?></p>
                    <img src="<?php echo base_url().$row['GAMBAR'];?>"/>
                    <input type="text" name="IdKedai" value="<?php echo $row['ID_KEDAI'];?>" hidden="hidden">
                    <input type="text" name="IdMenu" value="<?php echo $row['ID_MENU'];?>" hidden="hidden">
                    <input type="text" name="NamaKedai" hidden="hidden" value="<?php echo $kedai[0]['NAMA_KEDAI'];?>">
                    <div class="text-center">Jumlah</div><input type="number" min="1" max="99" placeholder="0" name="Jumlah"><br>
                    <button type="submit">Pesan</button>
                </form>
            </div>
                <?php
                    }
                    if($menu == null){
                        echo '<p style="color:#fff;font-size:20px;text-align:center;">~ No Result ~</p>';
                    }
                ?>
        </div>
    </div>

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->
    <script type="text/javascript">
        $(".pesan").submit(function(e){
            var formData = new FormData(this);
            e.preventDefault();
            $.ajax({
                type : 'POST',
                url : '<?php echo site_url('C_Pemesanan/TempData') ?>',
                data : formData,
                cache : false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.ajaxLoader').show();
                },
                complete: function(){
                    $('.ajaxLoader').hide();
                },
                success : function(respon){
                    swal('Anda Telan Memesan, Silahkan cek daftar pesanan anda','','success').then(function() {
                        window.location='<?php echo site_url('');?>';
                    });
                },
                error : function(respon){
                    alert(respon);
                }
            });
        });
    </script>
</body>

</html>
