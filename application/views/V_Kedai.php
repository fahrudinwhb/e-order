<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman Kedai</title>

    <link rel="icon" href="<?php echo base_url('assets-front-end').'/'; ?>img/fav.png" type="image/x-icon">

    <!-- CSS -->
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>fonts/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/sweetalert2.min.css" rel="stylesheet">

    <!-- modernizr -->
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/modernizr.js"></script>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/jquery-2.1.1.js"></script>

    <!--  plugins -->
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/menu.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/animated-headline.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/sweetalert2.min.js"></script>
    <!--  custom script -->
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('assets-front-end').'/'; ?>https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="<?php echo base_url('assets-front-end').'/'; ?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .top-bar {
            color: #333;
            padding: 150px 0 150px;
/*            background: -webkit-linear-gradient( rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(<?php echo base_url().$kedai[0]['LOGO_KEDAI'];?>);*/
            background: linear-gradient( rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(<?php echo base_url().str_replace(' ','%20',$kedai[0]['LOGO_KEDAI']);?>);
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
            text-align: center;
        }
        .aktif{
            margin-left: 0;
            background-color: #ffbf00;
            padding: 0px 20px;
            color: white;
            border-radius: 10px;
            text-decoration: none;
        }
        #kate{
            display: inline-block;
            color: #60606e;
            padding: 0px 20px;
            cursor: pointer;
        }
    </style>
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
        <?php $this->load->view('V_Header');?>
    </div>

    <!-- top bar -->
    <div class="top-bar">
        <h1><?php echo $kedai[0]['NAMA_KEDAI'];?></h1>
    </div>
    <!-- end top bar -->

    <!-- main container -->
    <div>
        <!-- menu div -->
        <div class="portfolio-div">
            <div class="portfolio">
                <!-- menu_filter -->
                <div class="categories-grid wow fadeInLeft">
                    <nav class="categories text-center">
                        <ul class="portfolio_filter">
                           <?php
                                foreach($kategori as $row){
                            ?>
                            <li id="kategori">
                                <p id="kate" class="<?php echo $row['KATEGORY']; ?>">
                                    <?php echo $row['KATEGORY']; ?>
                                </p>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
                <!-- end menu_filter -->

                <div class="container-fluid" style="padding:20px">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
<!--
                        <div id="search">
                            <input type="text" placeholder="Ketik 'Nama Makanan/Minuman'"/>
                        </div>
-->
                        <?php $o = 1; foreach($menu as $row){ ?>
                            <div class="list-menu <?php echo 'C'.$row['KATEGORI'];?>" hidden="hidden">
                                <form action="<?php echo site_url('C_Pemesanan/TempData');?>" method="post" class="pesan">
                                    <h5 class="nama-menu-kedai"><?php echo $row['NAMA_MENU'];?><i class="fa fa-angle-down" aria-hidden="true"></i></h5>
                                    <p><?php echo $row['DESKRIPSI_MENU'];?></p>
                                    <img src="<?php echo base_url().'/'.$row['GAMBAR']; ?>"/>
                                    <input type="text" name="IdKedai" value="<?php echo $kedai[0]['ID_KEDAI'];?>" hidden="hidden">
                                    <input type="text" name="IdMenu" value="<?php echo $row['ID_MENU'];?>" hidden="hidden">
                                    <input type="text" name="Angka" value="<?php echo $o;?>" hidden="hidden">
                                    <input type="text" name="NamaKedai" hidden="hidden" value="<?php echo $kedai[0]['NAMA_KEDAI'];?>">
                                    <div class="text-center">Jumlah</div><input type="number" min="1" max="99" placeholder="0" name="Jumlah" required><br>
                                    <button type="submit">Pesan</button>
                                </form>
                            </div>
                        <?php $o++;} ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end menu div -->
    </div>
    <!-- end main container -->

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#kategori p:first").addClass("aktif");
            if($("p.aktif").text().trim() == "Makanan"){
                $(".C2").hide();
                $(".C3").hide();
                $(".C1").show();
            }
            if($("p.aktif").text().trim() == "Snack"){
                $(".C1").hide();
                $(".C3").hide();
                $(".C2").show();
            }
            if($("p.aktif").text().trim() == "Minuman"){
                $(".C1").hide();
                $(".C2").hide();
                $(".C3").show();
            }
        });
        $(".Makanan").click(function(){
            $(".Snack").removeClass("aktif");
            $(".Minuman").removeClass("aktif");
            $(".Makanan").addClass("aktif");
            $(".C2").hide();
            $(".C3").hide();
            $(".C1").show();
        });
        $(".Snack").click(function(){
            $(".Makanan").removeClass("aktif");
            $(".Minuman").removeClass("aktif");
            $(".Snack").addClass("aktif");
            $(".C1").hide();
            $(".C3").hide();
            $(".C2").show();
        });
        $(".Minuman").click(function(){
            $(".Snack").removeClass("aktif");
            $(".Makanan").removeClass("aktif");
            $(".Minuman").addClass("aktif");
            $(".C1").hide();
            $(".C2").hide();
            $(".C3").show();
        });
    </script>
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
                        window.location='<?php echo site_url('C_Kedai').'/'.$this->uri->segment(2); ?>';
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
