<?php
$page = "home";
$pagetitle = "Home";
require_once('header.php');
?>
    <!--================Hero Banner Area Start =================-->
    <section style="margin-bottom: 50px" class="hero-banner">
        <div class="container">

            <div class="row align-items-center text-center text-md-left">
                <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
                    <h2 class="float-right">An Indonesian, Independent Medical Humanitarian Organisation</h2>
                    <p>Membawa pemberdayaan dan gerakan kemanusiaan untuk semua manusia yang membutuhkan, khususnya bagi mereka yang hidup di daerah terpencil.</p>
                    <a class="button button-hero mt-4" href="<?php echo base_url('auth'); ?>">Get Started</a>
                </div>
                <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
                    <img class="img-fluid" src="<?php echo base_url('assets/img/bg-hero-panel.png'); ?>" alt="">
                </div>
            </div>
            <div style="margin-top: 140px;" class="row align-items-center">
                <div class="col-md-1">
                    <img width="100%" src="<?php echo base_url('assets/img/logo-kun-center.jpg'); ?>">
                </div>
                <div class="col-md-11">
                    <span style="margin-right: 20px;">
                        <img style="margin-right: 5px;" width="30px" src="<?php echo base_url('assets/img/icon-home.png'); ?>" alt="">
                        Jl. Dago Pojok 84, Bandung, Jawa Barat, Indonesia
                    </span>
                    <span style="margin-right: 20px;">
                        <img style="margin-right: 5px;" width="30px" src="<?php echo base_url('assets/img/icon-phone.png'); ?>" alt="">
                        +6222- 2045 7853
                    </span>
                    <span>
                        <img style="margin-right: 5px;" width="30px" src="<?php echo base_url('assets/img/icon-mail.png'); ?>" alt="">
                        <a href="mailto:kun.humanistysystem@gmail.com">kun.humanistysystem@gmail.com</a>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <!--================Hero Banner Area End =================-->
<?php
require_once('footer.php');
?>