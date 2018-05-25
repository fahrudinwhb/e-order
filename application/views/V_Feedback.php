<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Halaman Feedback</title>
    
    <link rel="icon" href="<?php echo base_url('assets-front-end').'/';?>img/fav.png" type="image/x-icon">

    <!-- CSS -->
    <link href="<?php echo base_url('assets-front-end').'/';?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>fonts/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/';?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url('assets-front-end').'/'; ?>css/sweetalert2.min.css" rel="stylesheet">

    <!-- modernizr -->
    <script src="<?php echo base_url('assets-front-end').'/';?>js/modernizr.js"></script>
    
    <!-- jQuery -->
    <script src="<?php echo base_url('assets-front-end').'/';?>js/jquery-2.1.1.js"></script>
    
    <!--  plugins -->
    <script src="<?php echo base_url('assets-front-end').'/';?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/';?>js/menu.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/';?>js/animated-headline.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/';?>js/isotope.pkgd.min.js"></script>

    <!--  custom script -->
    <script src="<?php echo base_url('assets-front-end').'/'; ?>js/sweetalert2.min.js"></script>
    <script src="<?php echo base_url('assets-front-end').'/';?>js/custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('assets-front-end').'/';?>https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="<?php echo base_url('assets-front-end').'/';?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="feedback">
    
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

    <!-- main-container -->
    <div class="container main-container">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <div class="col-xs-12">
                <img src="<?php echo base_url('assets-front-end').'/';?>img/logo-2.png" width="100%" /><br><br><br><br>
            </div>
            
            <p class="text-center" style="color:#ffbf00">Harap berikan penilaian atas pelayanan kami,<br>penilaian Anda menunjukkan bahwa Anda telah selesai dan meninggalkan tempat duduk Anda</p><br>
            
                <div class="row">
                  <form action="<?php echo site_url('C_Pemesanan/inputFeedback');?>" method="post">
                   <?php 
                    for($j=0;$j<sizeof($kedai);$j++){
                        for($i=0;$i<sizeof($Tmp);$i++){
                            if($kedai[$j]['ID_KEDAI'] == $Tmp[$i][0]['ID_KEDAI']){
                    ?>
                    <div class="col-xs-12">
                        <h5 class="text-center" style="font-size:20px"><?php echo $kedai[$j]['NAMA_KEDAI'];?></h5>
                        <div class="textarea-contact">
                            <textarea name="pesan[]" placeholder="Kesan/Pesan" required></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <div class="stars">
                                <input class="star star-5" id="star-5<?php echo $i; ?>" type="checkbox" value="5" name="star[]" required>
                                <label class="star star-5" for="star-5<?php echo $i; ?>"></label>
                                <input class="star star-4" id="star-4<?php echo $i; ?>" type="checkbox" value="4" name="star[]" required>
                                <label class="star star-4" for="star-4<?php echo $i; ?>"></label>
                                <input class="star star-3" id="star-3<?php echo $i; ?>" type="checkbox" value="3" name="star[]" required>
                                <label class="star star-3" for="star-3<?php echo $i; ?>"></label>
                                <input class="star star-2" id="star-2<?php echo $i; ?>" type="checkbox" value="2" name="star[]" required>
                                <label class="star star-2" for="star-2<?php echo $i; ?>"></label>
                                <input class="star star-1" id="star-1<?php echo $i; ?>" type="checkbox" value="1" name="star[]" required>
                                <label class="star star-1" for="star-1<?php echo $i; ?>"></label>
                        </div><br><br>
                    </div>
                    <?php 
                            }
                        }
                    }
                    ?>
                    <div class="col-xs-8 col-xs-offset-2">
                        <button type="submit" class="btn btn-box">Kirim</button>
                    </div>
                    </form>
                </div>
        </div>

    </div>
    <!-- end main-container -->

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->
    <script type="text/javascript">
        $(function(){
            var requiredCheckboxes = $('.text-center :checkbox[required]');
            requiredCheckboxes.change(function(){
                if(requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                } else {
                    requiredCheckboxes.attr('required', 'required');
                }
            });
        });        
    </script>
</body>

</html>