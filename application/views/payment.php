<?php
$page = "perjalanan";
$pagetitle = "Pembayaran";
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
            <?php foreach ($perjalanan as $p) {
                $id = $p->kunct_idperjalanan;
            } ?>
            <div class="col-md-8 offset-md-2">
                <form style="min-height: 400px;" action="<?php echo base_url('perjalanan/bayar_action'); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="row">
                        <div class="col-md-6 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Detail Pembayaran</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Biaya Administrasi</h6>
                                        <small class="text-muted">Biaya Administrasi</small>
                                    </div>
                                    <span class="text-muted">Rp. 100.000,-</span>
                                </li>
                                <!-- <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div class="text-success">
                                        <h6 class="my-0">Promo code</h6>
                                        <small>EXAMPLECODE</small>
                                    </div>
                                    <span class="text-success">-$5</span>
                                </li> -->
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><strong>Total (IDR)</strong></span>
                                    <strong>Rp. 100.000,-</strong>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 order-md-1">
                            <h4 class="mb-3">Payment Method</h4>
                            <?php if ($keneg == "WNA") { ?>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="paypal" name="customRadio" class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="paypal">
                                            <img width="50%" src="<?php echo base_url('assets/img/paypal.png'); ?>" alt="">
                                        </label>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="transfer" name="customRadio" class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="transfer">
                                            <img width="50%" src="<?php echo base_url('assets/img/tf-bank.png'); ?>" alt="">
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gopay" name="customRadio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="gopay">
                                            <img width="50%" src="<?php echo base_url('assets/img/gopay.png'); ?>" alt="">
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="ovo" name="customRadio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="ovo">
                                            <img width="50%" src="<?php echo base_url('assets/img/ovo.png'); ?>" alt="">
                                        </label>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 order-md-3">
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Bayar</button>
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