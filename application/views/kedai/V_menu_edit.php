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
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/cropper.min.css')?>">
    <script type="text/javascript" src="<?php echo base_url('/assets/js/pace.min.js') ?>"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="container-fluid" style="padding:0">
      <!--header-->
      <?php $this->load->view("kedai/komponen/header") ?>
      <!-- Left side -->
      <?php $this->load->view("kedai/komponen/left_side") ?>
      <!-- Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="">
          <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10">
                <div class="artikel-list col-xs-12 no-padding">
                    <div class="artikel-list-header col-xs-12">
                        <h4>Edit Menu</h4>
                    </div>
                    <div class="artikel-list-body col-xs-12 no-padding">
                        <div class="col-xs-4 left-list-body">
                            <div>
                                <div class="artikel-img-preview-wrap">
                                  <img src="<?php echo base_url('').$menu[0]['GAMBAR'] ?>" class="img-responsive" id="imgPreview">
                                  <div class="artikel-img-preview">
                                      <span class="article-btn-wrap">
                                          <button class="icon-article-btn btn btn-info"><i class="fa fa-upload" aria-hidden="true"></i>Pilih Icon</button>
                                          <button class="icon-article-btn btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</button>
                                      </span>
                                  </div>
                                </div>
                            </div>
                            <!-- untuk submit gambar icon -->
                            <form action="" method="post" id="gambar-artikel" enctype="multipart/form-data">
                                <div class="input-group hidden">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default">Icon</span>
                                     </span>
                                    <input type="file" name="icon" id="file" class="input-right" required>
                                    <label for="file" class="input-label-file form-control"><span><i class="fa fa-file-image-o" aria-hidden="true"></i>Choose a file&hellip;</span></label>
                                </div>
                                <input type="submit" class="hidden">
                            </form>
                        </div>
                        <form action="" method="post" id="form-artikel" enctype="multipart/form-data">
                        <div class="col-xs-8 right-list-body">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default">ID Menu</span>
                                  </span>
                                <input type="text" class="form-control" name="id_menu" value="<?php echo $menu[0]['ID_MENU'] ?>" readonly>
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default">Nama Menu</span>
                                  </span>
                                <input type="text" class="form-control" name="nama" value="<?php echo $menu[0]['NAMA_MENU'] ?>" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default">Deskripsi Menu</span>
                                  </span>
                                <input type="text" class="form-control" name="deskripsi" value="<?php echo $menu[0]['DESKRIPSI_MENU'] ?>" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default">Promo</span>
                                  </span>
                                <input type="text" class="form-control" name="promo" value="<?php echo $menu[0]['PROMO'] ?>">
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default">Harga Menu</span>
                                  </span>
                                <input type="text" class="form-control" name="harga" value="<?php echo $menu[0]['HARGA_MENU'] ?>" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default">Kategori Menu</span>
                                  </span>
                                  <select class="form-control" name="kategori">
                                      <option selected disabled>Pilih</option>
                                      <option value="1" <?php if($menu[0]['ID_KATEGORI'] == 1){ echo "selected";} ?>>Makanan</option>
                                      <option value="2" <?php if($menu[0]['ID_KATEGORI'] == 2){ echo "selected";} ?>>Snack</option>
                                      <option value="3" <?php if($menu[0]['ID_KATEGORI'] == 3){ echo "selected";} ?>>Minuman</option>
                                  </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default">Baru</span>
                                 </span>
                                 <select class="form-control" name="baru">
                                     <option value="0" <?php if($menu[0]['BARU'] == 0){ echo "selected";} ?>>Tidak</option>
                                     <option value="1" <?php if($menu[0]['BARU'] == 1){ echo "selected";} ?>>Ya</option>
                                 </select>
                            </div>
                            <input type="hidden" name="id_kedai" value="<?php echo $menu[0]['ID_KEDAI'] ?>">
                        </div>
                        <div class="col-xs-12">
                            <div id="submitWrap">
                                <input type="submit" class="submitButton" id="submitArtikel" value="Simpan">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-1"></div>
          </div>
        </section>
      </div>
    </div>
    <!-- Modal -->
    <?php $this->load->view('admin/komponen/modal_crop'); ?>
    <!-- ajax loader -->
    <?php $this->load->view('admin/komponen/ajax_loader') ?>
    <!-- JS -->
    <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/style-input-file.js')?>"></script>
    <script src="<?php echo base_url('assets/js/cropper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/app.js')?>"></script>
    <script>
    $('.btn-info').click(function(e){
        $('#file').click();
    });
    $('.btn-danger').click(function(e){
        var defaultImage = '<?php echo base_url('assets/img/placeholder.png')?>';
        $('#imgPreview').attr('src',defaultImage);
    });
    $('#file').change(function(){
        // Fungsi Ajax untuk upload gambar ke server dan menampilkan modal untuk crop gambar
        $("#gambar-artikel").submit(function(e){
            var image = $('#imgReadyCrop');
            var cropBoxData;
            var canvasData;
            e.preventDefault();
            $.ajax({
                type : 'POST',
                url : '<?php echo site_url('kedai/gambar/menu')?>',
                data :  new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.ajaxLoader').show();
                },
                complete: function(){
                    $('.ajaxLoader').hide();
                },
                success : function(berhasil){
                    var gambar = '<?php echo base_url(); ?>';
                    image.attr('src',gambar+berhasil);
                    $('#imgPreview').attr('src',gambar+berhasil);
                    $('#myModal').modal({
                        backdrop : 'static',
                        keyboard : true,
                    });
                    $('#myModal').on('shown.bs.modal', function () {
                    image.cropper({
                      autoCropArea: 0.7,
                      aspectRatio : 4/3,
                      built: function () {
                        image.cropper('setCanvasData', canvasData);
                        image.cropper('setCropBoxData', cropBoxData);
                      }
                    });
                  }).on('hidden.bs.modal', function () {
                    cropBoxData = image.cropper('getCropBoxData');
                    canvasData = image.cropper('getCanvasData');
                    image.cropper('destroy');
                  });
                }
            });
        });
        //Submit form dan upload gambar ukuran asli ke server (user memilih tidak ngeCrop)
        $("#gambar-artikel").find('input[type=submit]').click();
    });
    //Submit form dan upload gambar hasil crop ke server (user memilih tidak ngeCrop)
    $("#formCropGambar").submit(function(e){
        e.preventDefault();
        var cropcanvas = $('#imgReadyCrop').cropper('getCroppedCanvas');
        var croppng = cropcanvas.toDataURL("image/jpeg",0.9);
        var imageName = $('#imgReadyCrop').attr('src').split(/(\\|\/)/g).pop();
          $.ajax('<?php echo site_url('kedai/gambarCrop/menu')?>', {
            method: "POST",
            data: {'pngimageData': croppng,'filename': imageName},
            beforeSend: function() {
                $('.ajaxLoader').show();
            },
            complete: function(){
                $('.ajaxLoader').hide();
            },
            success: function(e) {
                $('#imgPreview').attr('src',e);
                $('#myModal').modal('hide');
                console.log(e);
            //   alert(e);
            },
            error: function () {
              alert('Error'+e);
            }
          });
    });
    </script>
    <script>
    $(document).ready(function(){
        var height = $(".main-sidebar").height();
        $(".content-wrapper").css("height",height);
        $("#form-artikel").submit(function(event){
            event.preventDefault();
            var formData = new FormData(this);
            var icon_gambar = $('#imgPreview').attr('src');
            formData.append("icon",icon_gambar);
            $.ajax({
                type : 'POST',
                url : '<?php echo site_url('kedai/menu_edit')?>',
                data : formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.ajaxLoader').show();
                },
                complete: function(){
                    $('.ajaxLoader').hide();
                },
                success : function(berhasil){
                    swal('Berhasil Mengedit Menu','','success').then(function() {
                        window.location='<?php echo site_url('kedai/menu') ?>';
                    });
                }
            });
        });
    });
    </script>
  </body>
</html>
