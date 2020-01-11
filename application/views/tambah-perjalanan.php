<?php
$page = "perjalanan";
$pagetitle = "Tambah Perjalanan";
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
            <div class="col-md-8 offset-md-2">
                <form style="min-height: 400px;" action="<?php echo base_url('perjalanan/add'); ?>" method="post">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h3>Silahkan pilih lokasi.</h3>
                            <select class="form-control" name="lokasi" id="lokasi" required>
                                <option value="">PILIH LOKASI</option>
                                <?php
                                foreach ($lokasi as $l) {
                                ?>
                                    <option value="<?php echo $l->kunct_idlokasi; ?>"><?php echo $l->nama_klinik . ' - ' . $l->nama_lokasi; ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div id="tgl" class="col-6">
                            <h3>Pilih tanggal.</h3>
                            <input type="text" class="form-control" id="dp" name="tgl" autocomplete="off" required disabled>
                        </div>
                    </div>
                    <div class="row mb-2" id="formkuis">
                        <div class="col-12 text-center mt-4 mb-2">
                            <h3>Form Kuisioner.</h3>
                        </div>
                        <?php echo $kuis; ?>
                        <div class="col-12 mt-5 text-center">
                            <button type="submit" class="btn btn-primary">SIMPAN DAN BAYAR</button>
                        </div>
                        <div class="col-12 text-info my-2">
                            <hr>
                            <ul style="font-size: 12px; list-style-type: circle;">
                                <li>INFORMASI YANG DIMASUKKAN DENGAN BENAR AKAN MEMBANTU ANDA KETIKA MENDAPATKAN
                                    MASALAH SEWAKTU MELAKAUKAN PENDAKIAN</li>
                                <li>INFORMASI INI DIOLAH OLEH TIM YANG PROFESIONAL</li>
                                <li>UNTUK MENGISI FORMULIR DIBUTUHKAN WAKTU 5 - 15 MENIT</li>
                                <li>ANDA DAPAT MENGISINYA KETIKA BERADA DI LOKASI OLEH TIM KLINIK DI LAPANGAN,
                                    TETAPI PROSES ONLINE AKAN MEMPERCEPAT PROSES PEMERIKSAAN DI LAPANGAN</li>
                            </ul>
                            <hr>
                        </div>
                    </div>
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