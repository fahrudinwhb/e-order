<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin E-order</title>
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
        <?php $this->load->view("admin/komponen/header") ?>
        <!-- Left side -->
        <?php $this->load->view("admin/komponen/left_side") ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="">
          <div class="row">
            <div class="col-xs-12" style="padding-left:25px;">
                <div class="artikel-list" id="tabel-artikel">
                    <div class="artikel-list-header col-xs-12 no-padding-left no-padding-right">
                        <div class="col-xs-3 no-padding-left"><span>List Kedai</span></div>
                        <div id="custom-search-input" class="col-xs-6">
                            <div class="input-group search-bar">
                                <input type="text" class="form-control search" placeholder="Cari berdasarkan Judul,Sub Judul,Katergori,Editor" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-3 no-padding-right" style="text-align:right">
                            <a href="<?php echo site_url('admin/kedai/buat') ?>" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Kedai</a>
                        </div>
                    </div>
                    <div class="artikel-list-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg-primary">
                                <th class="id-column sort">ID Kedai</th>
                                <th class="gambar-column">Gambar Kedai</th>
                                <th class="nama-column sort">Nama Kedai</th>
                                <th class="admin-column sort" data-sort="judul-row">Admin Kedai</th>
                                <th class="aksi-column">Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php foreach($kedai as $data){ ?>
                            <tr class="">
                                <td class="id-row"><?php echo $data['ID_KEDAI'] ?></td>
                                <td class="gambar-row"><img src="<?php echo base_url($data['LOGO_KEDAI']) ?>" class="img-responsive"></td>
                                <td class="nama-row"><?php echo $data['NAMA_KEDAI'] ?></td>
                                <td class="admin-row"><?php echo $data['ADMIN_KEDAI'] ?></td>
                                <td class="aksi-row">
                                    <a href="<?php echo site_url('admin/kedai/edit/').$data['ID_KEDAI'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" data-id-kedai="<?php echo $data['ID_KEDAI'] ?>" title="Hapus" class="action-link"><i class="fa fa-trash-o"></i></a>
                                </td>
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
    <!-- JS -->
    <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/list.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/velocity.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/app.js')?>"></script>
    <script>
        function ajaxDelete(id_kedai){
            $.ajax({
                type : 'POST',
                url : '<?php echo site_url('admin/kedai_delete')?>',
                data : {'id': id_kedai},
                success : function(berhasil){
                    swal('Berhasil Menghapus Kedai','','success');
                }
            });
        }
    </script>
    <script>
    $(document).ready(function(){
        var height = $(".main-sidebar").height();
        $(".content-wrapper").css("height",height);
        $('[data-toggle="tooltip"]').tooltip();
        var options = {
            valueNames: [ 'id-row', 'nama-row','admin-row']
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
        $(".action-link").click(function(){
            var id_kedai = $(this).attr('data-id-kedai');
            var parent = $(this).parentsUntil("tbody ").contents();
            swal({
                title : 'Yakin menghapus kedai ini ?',
                type : 'warning',
                showCancelButton: true,
            }).then(function() {
            ajaxDelete(id_kedai);
            parent.velocity("slideUp", { duration: 100 });
            });
        });
    });
    </script>
    <script>
    $("li.left-link").click(function(){
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
    });
    $('#artikel-collapse').on('show.bs.collapse',function(){
        $(".left-link i.fa-angle-down").addClass("secondmenu-active");
    });
    $('#artikel-collapse').on('hide.bs.collapse',function(){
        $(".left-link i.fa-angle-down").removeClass("secondmenu-active");
    });
    </script>
  </body>
</html>
