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
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/cropper.min.css')?>">
    <script type="text/javascript" src="<?php echo base_url('/assets/js/pace.min.js') ?>"></script>
    <script src='<?php echo base_url().'assets/tinymce/tinymce.min.js'?>'></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="container-fluid" style="padding:0">
      <!--header-->
      <?php $this->load->view("admin/komponen/header") ?>
      <!-- Left side -->
      <?php $this->load->view("admin/komponen/left_side") ?>
      <!-- Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="">
          <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10">
                <div class="artikel-list col-xs-12 no-padding">
                    <div class="artikel-list-header col-xs-12">
                        <h4>Tambah Pengguna</h4>
                    </div>
                    <div class="artikel-list-body col-xs-12 no-padding">
                        <div class="col-xs-4 left-list-body">
                            <div>
                                <div class="artikel-img-preview-wrap">
                                    <img src="<?php echo base_url('assets/img/placeholder.png')?>" class="img-responsive" id="imgPreview">
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
                                    <span class="btn btn-default">Nama</span>
                                  </span>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default">Password</span>
                                 </span>
                                <input type="text" class="form-control" name="password" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default">Status</span>
                                 </span>
                                 <select class="form-control" name="status">
                                     <option value="0">Admin</option>
                                     <option value="1">Admin Kedai</option>
                                 </select>
                            </div>
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
    <?php $this->load->view('admin/komponen/ajax_loader'); ?>
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
                url : '<?php echo site_url('admin/gambar/admin')?>',
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
                success : function(respon){
                    var gambar = '<?php echo base_url(); ?>';
                    image.attr('src',gambar+respon);
                    $('#imgPreview').attr('src',gambar+respon);
                    $('#myModal').modal({
                        backdrop : 'static',
                        keyboard : false,
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
          $.ajax('<?php echo site_url('admin/gambarCrop/admin')?>', {
            method: "POST",
            data: {'pngimageData': croppng,'filename': imageName},
            beforeSend: function() {
                $('.ajaxLoader').show();
            },
            complete: function(){
                $('.ajaxLoader').hide();
            },
            success: function(respon) {
                $('#imgPreview').attr('src',respon);
                $('#myModal').modal('hide');
                console.log(respon);
            },
            error: function (respon) {
              alert('Error'+respon);
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
                url : '<?php echo site_url('admin/pengguna_submit')?>',
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
                success : function(respon){
                    // alert(respon);
                    swal('Berhasil Menambah Pengguna','','success').then(function() {
                        window.location='<?php echo site_url('admin/pengguna') ?>';
                    });
                },
                error : function(respon){
                    alert(respon);
                }
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
    var uri1 = "<?php $uri = explode("/",uri_string());echo $uri['1'];?>";
    var uri2 = "<?php $uri = explode("/",uri_string());echo $uri['2'];?>";
    $(".left-link").each(function(){
        if($(this).text().toUpperCase() == uri1.toUpperCase()){
            var menu_collpase = "#"+uri1+"-collapse";
            $(menu_collpase).addClass("in");
            $(this).addClass("active");
            $(this).siblings().removeClass("active");
        }
    });
    $(".left-link-2").each(function(){
        if($(this).text().toUpperCase() == uri2.toUpperCase()){
            $(this).addClass("active2");
        }
    });
    </script>
  </body>
</html>
