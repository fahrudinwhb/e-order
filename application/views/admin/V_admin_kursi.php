<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/kursi.css')?>">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
      <!--header-->
      <?php $this->load->view("admin/komponen/header") ?>
      <!-- Left side -->
      <?php $this->load->view("admin/komponen/left_side") ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid artikel-list" id="tabel-artikel">
            <div class="col-xs-12">
              <div class="col-xs-3"></div>
              <div class="col-xs-6 judul">
                <p>Denah Meja</p>
              </div>
              <div class="col-xs-3"></div>
            </div>
            <!-- baris meja -->
            <div class="col-xs-12 baris">
                <div class="col-xs-2"></div>
                <?php for($i=0;$i<sizeof($meja);$i++){ ?>
                    <div class="col-xs-1" style="margin-bottom:10px;">
                        <div class="meja" data-id="<?php echo $meja[$i]['ID_MEJA'] ?>"><span><?php echo $meja[$i]['NOMOR_MEJA'];?></span></div>
                    </div>
                    <?php if($i == 7 or $i == 15 or $i == 23 or $i == 31){?>
                        <div class="clearfix"></div>
                        <div class="col-xs-2"></div>
                    <?php } ?>
                <?php } ?>
                <div class="col-xs-2"></div>
            </div>
          </div>
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
  </div><!-- ./wrapper -->
  <!-- jS -->
  <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/Chart.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/app.js')?>"></script>
  <script>
  $(document).ready(function(){
      $(".left-link i.fa-angle-down").removeClass("secondmenu-active");
      $("li.left-link").click(function(){
          $(this).addClass("active");
          $(this).siblings().removeClass("active");
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
  <script>
      var ctx = $('#kunjungan-chart');
      var myChart = new Chart(ctx, {
  type: 'line',
  data: {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli","Agustus","September","Oktober","November", "Desember"],
      datasets: [{
          label: 'Jumlah Pesanan Per Bulan',
          data: [
              1,2,3,4,1,2,5,6,2,3,4,5
          ],
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
          ],
          borderColor: [
              'rgba(255,99,132,1)',
          ],
          borderWidth: 1
      }]
  },
  options: {
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true
              }
          }]
      }
  }
});
  </script>
</body>
</html>
