<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kedai</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/fav.png" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/AdminLTE.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/_all-skins.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/admin.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/dataurl.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/menu.css')?>">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.min.css') ?>">
    <script type="text/javascript" src="<?php echo base_url('/assets/js/pace.min.js') ?>"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
      <div class="container-fluid" style="padding:0">
      <!--header-->
      <?php $this->load->view("kedai/komponen/header") ?>
      <!-- Left side -->
      <?php $this->load->view("kedai/komponen/left_side") ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="">
          <div class="row">
            <div class="col-xs-12" style="padding-left:25px;">
                <div class="container-fluid artikel-list" id="tabel-artikel">
                    <div class="col-xs-12">
                      <div class="col-xs-3"></div>
                      <div class="col-xs-6 judul-list-menu">
                        <p>Daftar Menu</p>
                      </div>
                      <div class="col-xs-3"></div>
                    </div>
                    <div class="col-xs-12 add-menu-wrap">
                        <a href="<?php echo site_url('kedai/menu/buat') ?>"><i class="fa fa-plus"></i>Tambah Menu</a>
                    </div>
                    <div class="col-xs-12">
                        <?php foreach($menu as $data){ ?>
                        <div class="col-xs-6 menu-wrap">
                            <div class="col-xs-4 gambar-menu no-padding">
                                <img src="<?php echo base_url('').$data['GAMBAR']?>" class="img-responsive">
                                <div class="kategori-menu"><?php echo $data['KATEGORY'] ?></div>
                                <div class="menu-hover-option">
                                    <div class="hover-option">
                                        <span class="hover-option-edit"><a href="<?php echo site_url('kedai/menu/edit/').$data['ID_MENU'] ?>">Edit</a></span>
                                        <span class="hover-option-hapus"><a href="#" data-id-menu="<?php echo $data['ID_MENU']; ?>">Hapus</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8 atribut-menu">
                                <div class="nama-menu"><?php echo $data['NAMA_MENU'] ?><?php if($data['BARU'] == 1){echo '<span class="baru-menu">baru</span>';}?><span class="harga-menu"><?php echo "Rp ".number_format($data['HARGA_MENU']) ?></span></div>
                                <div class="deksripsi-menu"><?php echo $data['DESKRIPSI_MENU'] ?></div>
                                <div class="promo-menu">Promo : <?php echo $data['PROMO'] ?></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      </div><!-- ./wrapper -->
    <!-- jS -->
    <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/app.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert2.min.js')?>"></script>
    <script>
    $(document).ready(function(){
        var height = $(".main-sidebar").height();
        $(".content-wrapper").css("height",height);
        var height2 = $(".gambar-menu").height();
        $(".atribut-menu").css("height",height2);
    });
    </script>
    <script>
        function ajaxDelete(id_menu){
            $.ajax({
                type : 'POST',
                url : '<?php echo site_url('kedai/menu_delete')?>',
                data : {'id': id_menu},
                success : function(berhasil){
                    swal('Berhasil Menghapus menu','','success');
                }
            });
        }
        $(".hover-option-hapus a").click(function(){
            var id_menu = $(this).attr('data-id-menu');
            swal({
                title : 'Yakin menghapus menu ini ?',
                type : 'warning',
                showCancelButton: true,
            }).then(function() {
            ajaxDelete(id_menu);
            window.location.replace("<?php echo site_url('kedai/menu') ?>");
            });
        });
    </script>
  </body>
</html>
