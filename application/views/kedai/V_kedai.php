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
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/kursi.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/menu.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.min.css') ?>">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300' rel='stylesheet' type='text/css'>
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
                        <p>Denah Meja</p>
                        <br>
                      </div>
                      <div class="col-xs-3"></div>
                    </div>
                    <!-- baris meja -->
                    <div class="col-xs-12 baris">
                        <div class="col-xs-2"></div>
                        <?php for($i=0;$i<sizeof($meja);$i++){ ?>
                            <div class="col-xs-1" style="margin-bottom:10px;">
                                <div class="meja <?php if($meja[$i]['STATUS_MEJA'] == 1){ echo "isi"; } ?>" data-id="<?php echo $meja[$i]['ID_MEJA'] ?>"><span><?php echo $meja[$i]['NOMOR_MEJA'];?></span></div>
                            </div>
                            <?php if($i == 7 or $i == 15 or $i == 23 or $i == 31){?>
                                <div class="clearfix"></div>
                                <div class="col-xs-2"></div>
                            <?php } ?>
                        <?php } ?>
                        <div class="col-xs-2"></div>
                    </div>
                </div>
            </div>
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      </div><!-- ./wrapper -->
      <!-- Modal -->
      <?php foreach($jumlah_meja_pesanan as $key=>$data){
      ?>
      <div class="modal fade" id="<?php echo "modal-".$jumlah_meja_pesanan[$key]['ID_MEJA'] ?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Pemesanan Meja Nomer <?php echo $jumlah_meja_pesanan[$key]['NOMOR_MEJA'] ?></h4>
            </div>
            <div class="modal-body meja-body-modal">
            <!-- <?php
                foreach ( $pesanan as $index => $data ) {
                    if ($pesanan[$index]['ID_MEJA'] !=  $jumlah_meja_pesanan[$key]['ID_MEJA']) {
                        unset($temp[$index]);
                    }
                    if($pesanan[$index]['STATUS_PEMESANAN'] == "Selesai"){
                        unset($temp[$index]);
                    }
                }
             ?> -->
            <form action="<?php echo site_url('kedai/edit_status_pesanan') ?>" method="post" class="form-ganti-status" id="<?php echo "meja".$jumlah_meja_pesanan[$key]['NOMOR_MEJA'] ?>">
              <table class="table table-bordered">
                  <input type="hidden" name="meja-id-pesanan" value="<?php echo $jumlah_meja_pesanan[$key]['ID_PEMESANAN'] ?>">
                  <input type="hidden" name="id-meja" value="<?php echo $jumlah_meja_pesanan[$key]['ID_MEJA'] ?>">
                  <tr>
                      <td>Status Pemesanan</td>
                      <td class="meja-status-pesanan-sekarang">
                          <?php
                          foreach($array_pesanan['pesanan'] as $data_pesanan){
                              if($data_pesanan['ID_PEMESANAN'] == $jumlah_meja_pesanan[$key]['ID_PEMESANAN']){
                                  if($data_pesanan['STATUS_PEMESANAN'] == 'Selesai'){
                                      echo '<span class="pesanan-selesai">'.$data_pesanan['STATUS_PEMESANAN'].'</span>';
                                  }
                                  elseif($data_pesanan['STATUS_PEMESANAN'] == 'Sudah Di Konfirmasi'){
                                      echo '<span class="pesanan-sudah-konfirm">'.$data_pesanan['STATUS_PEMESANAN'].'</span>';
                                  }
                                  elseif($data_pesanan['STATUS_PEMESANAN'] == 'Belum Di Konfirmasi'){
                                      echo '<span class="pesanan-belum-konfirm">'.$data_pesanan['STATUS_PEMESANAN'].'</span>';
                                  }
                                  elseif($data_pesanan['STATUS_PEMESANAN'] == 'Sedang Di Masak'){
                                      echo '<span class="pesanan-masak">'.$data_pesanan['STATUS_PEMESANAN'].'</span>';
                                  }
                              }
                          }
                          ?>
                      </td>
                      <td></td>
                  </tr>
                  <tr>
                      <td>Menu</td>
                      <td>Jumlah Pesanan</td>
                      <td>Total Harga</td>
                  </tr>
                  <?php foreach($array_pesanan['menu_pesanan'] as $data){
                      if($data['ID_PEMESANAN'] == $jumlah_meja_pesanan[$key]['ID_PEMESANAN']){ ?>
                  <tr>
                      <td class="meja-menu-pesanan"><?php echo $data['NAMA_MENU'] ?></td>
                      <td class="meja-jumlah-pesanan"><?php echo $data['JUMLAH_MENU_PESANAN'] ?></td>
                      <td class="meja-total-pesanan"><?php echo $data['JUMLAH_HARGA_PESANAN'] ?></td>
                  </tr>
                  <?php }
                    } ?>
                  <tr>
                      <td>Update Status</td>
                      <td class="meja-status-pesanan">
                            <div class="radio">
                              <label><input type="radio" name="optradio" value="Belum Di Konfirmasi" <?php if($jumlah_meja_pesanan[$key]['STATUS_PEMESANAN'] == 'Belum Di Konfirmasi'){ echo "checked"; } ?>>Belum Di Konfirmasi</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="optradio" value="Sudah Di Konfirmasi" <?php if($jumlah_meja_pesanan[$key]['STATUS_PEMESANAN'] == 'Sudah Di Konfirmasi'){ echo "checked"; } ?>>Sudah Di Konfirmasi</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="optradio" value="Sedang Di Masak" <?php if($jumlah_meja_pesanan[$key]['STATUS_PEMESANAN'] == 'Sedang Di Masak'){ echo "checked"; } ?>>Sedang Di Masak</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="optradio" value="Selesai" <?php if($jumlah_meja_pesanan[$key]['STATUS_PEMESANAN'] == 'Selesai'){ echo "checked"; } ?>>Selesai</label>
                            </div>
                      </td>
                  </tr>
              </table>
              <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
            </form>
            <?php
             ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <?php
        }
       ?>
      <!-- /popup -->
    <!-- jS -->
    <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/app.js')?>"></script>
    <script>
    $(document).ready(function(){
        var height = $(".main-sidebar").height();
        $(".content-wrapper").css("height",height);
        $('.isi').each(function(){
            $(this).click(function(){
                var id_meja = parseInt($(this).attr("data-id"));
                var id_modal = "#modal-"+id_meja;
                $(id_modal).modal('show');
            });
        });
    });
    </script>
  </body>
</html>
