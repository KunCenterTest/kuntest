<?php
$pagetitle = "Auth";
$recaptcha = "ON";
require_once('header.php');
?>
<!--================Hero Banner Area Start =================-->
<section style="margin-bottom: 50px;" class="hero-banner">
    <div class="container">

        <div style="margin-top: 50px;" class="row align-items-center text-center text-md-left">
            <?php if ($this->session->flashdata('res')) { ?>
                <div class="col-md-12">
                    <div class="alert alert-danger alert-cus text-center" role="alert">
                        <?php echo $this->session->flashdata('res'); ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-4 mb-5 mb-md-0">
                <h3>Login.</h3>
                <form action="<?php echo base_url('login'); ?>" id="form-login" method="post">
                    <div class="form-group">
                        <label id="emaillbl1"><small>Email</small></label>
                        <input type="email" class="form-control" name="email" id="emailvld1" required>
                    </div>
                    <div class="form-group">
                        <label><small>Password</small></label>
                        <input type="password" class="form-control" name="pswd" required>
                        <small class="form-text text-muted">&nbsp;</small>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label"><small>Remember me</small></label>
                    </div>
                    <button type="submit" class="btn btn-block btn-danger">Login</button>
                </form>
            </div>
            <div class="col-md-7 offset-md-1">
                <h3>Atau buat akun baru.</h3>
                <form action="<?php echo base_url('register'); ?>" id="form-regis" method="post">
                    <div class="row mb-2">
                        <div class="col">
                            <label><small>Nama Lengkap</small></label>
                            <input type="text" class="form-control upper" placeholder="Nama Lengkap" name="nama" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label id="emaillbl2"><small>Email</small></label>
                            <input type="email" class="form-control" placeholder="Alamat Email" name="email" id="emailvld2" required>
                        </div>
                        <div class="col">
                            <label><small>Tangal Lahir</small></label>
                            <input type="text" class="form-control" placeholder="Tanggal Lahir" id="dp" name="tgllhr" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label><small>Password</small></label>
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="pw" required>
                        </div>
                        <div class="col">
                            <label><small>Konfirmasi Password</small></label>
                            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="kpw" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-danger">Daftar</button>
                </form>
            </div>
        </div>
        <div style="margin-top: 180px;" class="row align-items-center">
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