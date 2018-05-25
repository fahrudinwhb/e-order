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
                        <p>Feedback</p>
                      </div>
                      <div class="col-xs-3"></div>
                    </div>
                    <div class="col-xs-12">
                        <div class="direct-chat-messages">
                          <!-- Message. Default to the left -->
                          <?php foreach($ulasan as $data){ ?>
                          <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                              <span class="direct-chat-name pull-left">Unkown</span>
                              <span class="direct-chat-timestamp pull-right"><?php echo $data['WAKTU'] ?></span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="<?php echo base_url('assets/img/placeholder-user.png') ?>" alt="message user image">

                            <div class="rating">
                                <?php for ($i=0;$i<$data['BINTANG'];$i++) { ?>
                                <span class="fa fa-star"></span>
                                <?php } ?>
                                <?php for ($i=0;$i<(5-$data['BINTANG']);$i++) { ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                              </div>
                            <div class="direct-chat-text">
                              <?php echo $data['ULASAN']; ?>
                            </div>
                            <!-- /.direct-chat-text -->
                          </div>
                        <?php } ?>
                        </div>
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
