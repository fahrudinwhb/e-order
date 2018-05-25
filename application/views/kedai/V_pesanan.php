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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/dataurl.css')?>">
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
                <div class="artikel-list" id="tabel-artikel">
                    <div class="artikel-list-header col-xs-12 no-padding-left no-padding-right">
                        <div class="col-xs-3 no-padding-left"><span>List Pesanan</span></div>
                        <div id="custom-search-input" class="col-xs-6">
                            <div class="input-group search-bar">
                                <input type="text" class="form-control search" placeholder="Cari Nama Menu,Nomor Meja,Jumlah Pesanan,Status" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="artikel-list-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg-primary">
                                <th class="id-column">ID</th>
                                <th class="meja-column">Nomor Meja</th>
                                <th class="menu-column">Menu</th>
                                <th class="waktu-column">Waktu Pemesanan</th>
                                <th class="jumlah-column">Jumlah Pesanan</th>
                                <th class="total-column">Total Harga</th>
                                <th class="status-column">Status</th>
                                <th class="aksi-column">Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php for($i = 0; $i< count($array_pesanan['pesanan']); $i++){ ?>
                            <tr class="">
                                <td class="id-row"><?php echo $array_pesanan['pesanan'][$i]['ID_PEMESANAN'] ?></td>
                                <td class="meja-row"><?php echo $array_pesanan['pesanan'][$i]['ID_MEJA'] ?></td>
                                <td class="menu-row">
                                    <?php foreach($array_pesanan['menu_pesanan'] as $data){
                                        if($data['ID_PEMESANAN'] == $array_pesanan['pesanan'][$i]['ID_PEMESANAN']){
                                    ?>
                                    <div class="" style="margin-bottom:10px">
                                        <img src="<?php echo base_url().$data['GAMBAR'] ?>" width="50">
                                        <span><?php echo $data['NAMA_MENU'] ?></span>
                                        <span>( <?php echo $data['JUMLAH_MENU_PESANAN'] ?> )</span>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="waktu-row"><?php echo $array_pesanan['pesanan'][$i]['WAKTU_PEMESANAN'] ?></td>
                                <td class="jumlah-row">
                                    <?php
                                    $total_menu = 0;
                                    foreach($array_pesanan['menu_pesanan'] as $data){
                                        if($data['ID_PEMESANAN'] == $array_pesanan['pesanan'][$i]['ID_PEMESANAN']){
                                            $total_menu = $total_menu+$data['JUMLAH_MENU_PESANAN'];
                                        }
                                    }
                                    echo $total_menu;
                                    ?>
                                </td>
                                <td class="total-row">
                                    <?php
                                    $total_harga = 0;
                                    foreach($array_pesanan['menu_pesanan'] as $data){
                                        if($data['ID_PEMESANAN'] == $array_pesanan['pesanan'][$i]['ID_PEMESANAN']){
                                            $total_harga = $total_harga+$data['JUMLAH_HARGA_PESANAN'];
                                        }
                                    }
                                    echo "Rp ".number_format($total_harga);
                                    ?>
                                </td>
                                <td class="status-row">
                                    <?php if($array_pesanan['pesanan'][$i]['STATUS_PEMESANAN'] == 'Selesai'){ ?>
                                        <span class="pesanan-selesai"><?php echo $array_pesanan['pesanan'][$i]['STATUS_PEMESANAN'] ?></span>
                                    <?php } ?>
                                    <?php if($array_pesanan['pesanan'][$i]['STATUS_PEMESANAN'] == 'Sedang Di Masak'){ ?>
                                        <span class="pesanan-masak"><?php echo $array_pesanan['pesanan'][$i]['STATUS_PEMESANAN'] ?></span>
                                    <?php } ?>
                                    <?php if($array_pesanan['pesanan'][$i]['STATUS_PEMESANAN'] == 'Sudah Di Konfirmasi'){ ?>
                                        <span class="pesanan-sudah-konfirm"><?php echo $array_pesanan['pesanan'][$i]['STATUS_PEMESANAN'] ?></span>
                                    <?php } ?>
                                    <?php if($array_pesanan['pesanan'][$i]['STATUS_PEMESANAN'] == 'Belum Di Konfirmasi'){ ?>
                                        <span class="pesanan-belum-konfirm"><?php echo $array_pesanan['pesanan'][$i]['STATUS_PEMESANAN'] ?></span>
                                    <?php } ?>
                                </td>
                                <td class="aksi-row"><a href="#" class="ubah-status">Ubah Status</a></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ubah Status Pesanan</h4>
          </div>
          <div class="modal-body">
            <form id="ganti-status">
              <div class="radio">
                <label><input type="radio" name="optradio" value="Belum Di Konfirmasi">Belum Di Konfirmasi</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="Sudah Di Konfirmasi">Sudah Di Konfirmasi</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="Sedang Di Masak">Sedang Di Masak</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="Selesai">Selesai</label>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-0">
                  <button type="submit" class="btn btn-default">Update</button>
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
    <!-- /popup -->
    <!-- JS -->
    <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/list.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/velocity.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/app.js')?>"></script>
    <script>

    $('.ubah-status').click(function(){
        $('#myModal').modal('show');
        var id_pesanan,status;
            id_pesanan = $(this).parent().siblings(".id-row").text();
        $('#ganti-status input').on('change', function(){
            status = $("input[name*='optradio']:checked", '#ganti-status').val();
        });
        $('#ganti-status').submit(function(e){
            e.preventDefault();
            $.ajax({
                type : 'POST',
                url : '<?php echo site_url('kedai/edit_status_pesanan')?>',
                data : {'meja-id-pesanan': id_pesanan,'optradio': status},
                success : function(berhasil){
                    // alert(berhasil);
                    swal('Berhasil Mengedit Status Pesanan','','success').then(function() {
                        window.location='<?php echo site_url('kedai/pesanan') ?>';
                    });
                }
            });
        });
    });
    </script>
    <script>
    $(document).ready(function(){
        var height = $(".main-sidebar").height();
        $(".content-wrapper").css("height",height);
        $('[data-toggle="tooltip"]').tooltip();
        var options = {
            valueNames: [ 'meja-row', 'menu-row','jumlah-row','total-row','status-row']
        };
        var userList = new List('tabel-artikel', options);
        $(".sort").click(function(){
            if($(this).hasClass("sortAscending")){
                $(this).addClass("sortDescending");
                $(this).removeClass("sortAscending");
                $(this).siblings().removeClass("sortDescending sortAscending");
            }
            else{
                $(this).addClass("sortAscending");
                $(this).removeClass("sortDescending");
                $(this).siblings().removeClass("sortDescending sortAscending");
            }
        });
    });
    </script>
  </body>
</html>
