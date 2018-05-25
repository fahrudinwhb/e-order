<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman Home</title>

    <link rel="icon" href="<?php echo base_url('assets-front-end').'/'; ?>img/fav.png" type="image/x-icon">

    <!-- CSS -->
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>fonts/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets-front-end').'/'; ?>css/animate.css">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/sweetalert2.min.css" rel="stylesheet">

    <!-- modernizr -->
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/modernizr.js"></script>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/jquery-2.1.1.js"></script>

    <!--  plugins -->
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/menu.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/animated-headline.js"></script>
    <!-- <script src="<?php echo base_url('assets-front-end').'/'; ?>js/isotope.pkgd.min.js"></script> -->

    <!--  custom script -->
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/sweetalert2.min.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/custom.js"></script>

    <!-- js for nav-smooth scroll -->
    <script>
    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });
    </script>
    <!-- /js for nav-smooth scroll -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('assets-front-end').'/'; ?>https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="<?php echo base_url('assets-front-end').'/'; ?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
        <?php $this->load->view('V_Header');?>
        <!-- box-intro -->
        <section class="box-intro">
            <div class="table-cell">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <h1><b>Order with ease<em style="color:#ffbf00">.</em></b></h1>
                    <h5>Melakukan pemesanan menjadi lebih mudah dan cepat</h5>
                    <br>
                </div>
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                    <div id="search">
                       <form autocomplete="off" action="<?php echo site_url('C_Search');?>" method="post">
                           <input type="text" placeholder="Ketik 'Nama Makanan/Minuman'" name="key">
                        <button type="submit"><i class="fa fa-arrow-right"></i></button>
                       </form>
                    </div>
                </div>
                <div class="promo col-xs-12">
                    <a href="#konten"><i class="fa fa-angle-double-down"></i></a>
                </div>
            </div>

        </section>
        <!-- end box-intro -->
    </div>
    <div class="col-xs-12 no-padding">
        <div class="divider"></div>
    </div>
    <div class="col-xs-12">
        <div class="separator"></div>
    </div>
    <div class="col-xs-12 promo-title">
        <span>Promo Hari ini</span>
    </div>
    <div class="col-xs-12">
        <div class="separator"></div>
    </div>
    <!-- portfolio div -->
    <div class="portfolio-div" id="konten">
        <div class="portfolio">
            <div class="no-padding portfolio_container col-xs-12">
                <!-- single work -->
                <?php
                    $e = 1;
                    foreach($Promo as $row){
                        if($row['PROMO'] != null){
                ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 wow slideInUp">
                    <a href="#0" class="portfolio_item">
                        <img src="<?php echo base_url($row['GAMBAR']);?>" alt="image"/>
                        <div class="portfolio_item_hover">
                            <div class="portfolio-border clearfix">
                                <div class="item_info">
                                    <span><?php echo $row['NAMA_MENU'];?></span>
                                    <p><?php echo $row['PROMO'];?></p>
                                    <em class="tombol-pesan" data-toggle="modal" data-target="#myModal<?php echo $e;?>">Pesan</em>
                                    <!-- <img src="<?php echo base_url($row['GAMBAR']); ?>"> -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                            }
                    $e++;}
                ?>
            </div>
            <!-- end portfolio_container -->
        </div>
        <!-- portfolio -->
    </div>
    <!-- end portfolio div -->

    <!-- footer -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">© FILKOM Universitas Brawijaya</p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->
    <!-- Modal -->
    <?php
    $d = 1;
    foreach($Promo as $row){
            if($row['PROMO'] != null){
    ?>
    <div class="modal fade" id="myModal<?php echo $d; ?>" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Nama Menu</h4>
          </div>
          <div class="modal-body">
            <form id="ganti-status" class="pesan<?php echo $d;?>">
                <div class="form-group">
                    <input type="text" name="IdKedai" value="<?php echo $row['ID_KEDAI'];?>" hidden="hidden">
                    <input type="text" name="IdMenu" value="<?php echo $row['ID_MENU'];?>" hidden="hidden">
                    <input type="text" name="Angka" value="<?php echo $d;?>" hidden="hidden">
                    <input type="text" name="NamaKedai" hidden="hidden" value="<?php echo $kedai[0]['NAMA_KEDAI'];?>">
                    <input type="number" min="1" max="100" class="form-control" placeholder="0" name="Jumlah" required>
                </div>
              <div class="form-group">
                <div class="col-sm-offset-0">
                  <button type="submit" class="btn btn-primary btn-sm btn-block btn-pesan">Pesan</button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php
            }
    $d++;}
    ?>
    <!-- /popup -->
</body>
<script src="<?php echo base_url('assets-front-end').'/'; ?>js/wow.min.js"></script>
<script>
new WOW().init();
</script>
    <script type="text/javascript">
        <?php $s=1; foreach($Promo as $row){?>
        $(".pesan<?php echo $s; ?>").submit(function(e){
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
//                    alert(respon);
                    swal('Anda Telan Memesan, Silahkan cek daftar pesanan anda','','success').then(function() {
                        window.location='<?php echo site_url();?>';
                    });
                },
                error : function(respon){
                    alert(respon);
                }
            });
        });
        <?php
            $s++;}
        ?>
    </script>
</html>
