<header class="box-header">
    <div class="box-logo">
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets').'/'; ?>img/logo-1.png" width="100" alt="Logo"></a>
    </div>
    <!-- box-nav -->
    <a class="box-primary-nav-trigger" href="#0">
        <span class="box-menu-text">Pemesanan</span><span class="box-menu-icon"></span>
    </a>
    <!-- box-primary-nav-trigger -->
</header>
<nav>
    <ul class="box-primary-nav">
        <li class="box-label" style="border:2px solid #fff;border-radius:7px">
            <a href="<?php echo site_url('C_Pemesanan'); ?>">Daftar Pesanan Anda</a>
        </li>

        <h1 class="box-label">Pilih Kedai</h1>
        <?php 
            foreach($data as $row){
        ?>
        <li>
            <a href="<?php echo site_url('C_Kedai').'/'.$row['NAMA_KEDAI'];?>"
              <?php if(str_replace('%20',' ',$this->uri->segment(2)) == $row['NAMA_KEDAI']){
                    echo 'style="background-color:red;"';
                    } 
               ?>
               >
                <?php echo $row['NAMA_KEDAI'];?>
            </a>
        </li>
        <?php
            }
        ?>
    </ul>
</nav>