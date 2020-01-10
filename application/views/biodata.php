<?php
$page = "biodata";
$pagetitle = "Biodata";
require_once('header.php');
?>
<!--================Hero Banner Area Start =================-->
<section style="margin-bottom: 110px;" class="hero-banner">
    <div class="container">

        <div class="row align-items-center text-center text-md-left">
            <?php if ($this->session->flashdata('res')) { ?>
                <div class="col-md-12">
                    <div class="alert alert-danger alert-cus text-center" role="alert">
                        <?php echo $this->session->flashdata('res'); ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-6">
                <?php if($biodata['emailstat'] == 'OFF'){ ?>
                <span>Anda belum konfirmasi alamat email anda. <a href="#">Konfirmasi email sekarang</a>!</span>
                <?php } ?>
                <h3>Silahkan lengkapi biodata anda sebelum melanjutkan.</h3>
                <form action="<?php echo base_url('biodata/update'); ?>" method="post">
                    <div class="row mb-2">
                        <div class="col">
                            <label><small>Nama Lengkap</small></label>
                            <input type="text" class="form-control upper" placeholder="Nama Lengkap" name="nama" value="<?php echo $biodata['nama']; ?>" required>
                        </div>
                        <div class="col">
                            <label id="emaillbl1"><small>Email</small></label>
                            <input type="email" class="form-control" placeholder="Alamat Email" name="email" id="emailvld1" value="<?php echo $biodata['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label><small>No Handphone</small></label>
                            <input type="text" class="form-control" placeholder="No Handphone" name="notelp" value="<?php echo $biodata['notelp']; ?>" required>
                        </div>
                        <div class="col">
                            <label><small>Tempat Lahir</small></label>
                            <input type="text" class="form-control upper" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $biodata['tempat_lahir']; ?>" required>
                        </div>
                        <div class="col">
                            <label><small>Tangal Lahir</small></label>
                            <input type="text" class="form-control" placeholder="Tanggal Lahir" id="dp" name="tgl_lahir" value="<?php echo $biodata['tgl_lahir']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label><small>Pekerjaan</small></label>
                            <input type="text" class="form-control" placeholder="Pekerjaan" name="pekerjaan" value="<?php echo $biodata['pekerjaan']; ?>" required>
                        </div>
                        <div class="col">
                            <label><small>Golongan Darah</small></label>
                            <input type="text" class="form-control upper" placeholder="Golongan Darah" name="gol_darah" value="<?php echo $biodata['gol_darah']; ?>" required>
                        </div>
                        <div class="col">
                            <label><small>Warga Kenegaraan</small></label>
                            <select class="form-control" name="kenegaraan" required>
                                <option value="" <?php if($biodata['kenegaraan'] === ""){echo 'selected'; } ?>>PILIH KENEGARAAN</option>
                                <option value="WNI" <?php if($biodata['kenegaraan'] === "WNI"){echo 'selected'; } ?>>WNI</option>
                                <option value="WNA" <?php if($biodata['kenegaraan'] === "WNA"){echo 'selected'; } ?>>WNA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label><small>Alamat</small></label>
                            <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat" required><?php echo $biodata['alamat']; ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-danger">Update Biodata</button>
                </form>
                <h3 style="margin-top: 50px;">Form ubah password.</h3>
                <form action="<?php echo base_url('biodata/ubah_pwd'); ?>" method="post">
                    
                    <div class="row mb-2">
                        <div class="col">
                            <label><small>Password Baru</small></label>
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="pw" required>
                        </div>
                        <div class="col">
                            <label><small>Konfirmasi Password</small></label>
                            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="kpw" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-danger" onclick="return confirm('Yakin mengubah password?')">Ubah Password</button>
                </form>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="<?php echo base_url('assets/img/bg-hero-panel.png'); ?>" alt="">
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