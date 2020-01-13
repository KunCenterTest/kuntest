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
            <div style="min-height: 300px;" class="col-md-10 offset-md-1 mb-5">
                <h3 class="text-center">HISTORY PERJALANAN</h3>
                <hr class="mb-3">
                <table class="table table-striped">
                    <thead class="text-light bg-danger">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Klinik</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Hasil Kuisioner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($perjalanan as $kp => $p) {
                            $no++;
                            foreach ($lokasi as $l) {
                                if ($l->kunct_idlokasi == $p->kunct_idlokasi) {
                                    $klinik = $l->nama_klinik;
                                    $lokasi = $l->nama_lokasi;
                                }
                            }
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no; ?></th>
                                <td><?php echo $klinik; ?></td>
                                <td><?php echo $lokasi; ?></td>
                                <td><?php echo $p->tgl; ?></td>
                                <td width="15%"><button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal">preview</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modaltitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitle">Detail Kuisioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <strong>Pertanyaan</strong>
                    </div>
                    <div class="col-1">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div style="padding-left: 30px;" class="col">
                        Pertanyaan Child 1
                    </div>
                    <div class="col-1">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3">
                        <strong>Pertanyaan</strong>
                    </div>
                    <div class="col-1 mt-3">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div style="padding-left: 30px;" class="col">
                        Pertanyaan Child 1
                    </div>
                    <div class="col-1">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div style="padding-left: 60px;" class="col">
                        Pertanyaan Child 2
                    </div>
                    <div class="col-1">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div style="padding-left: 90px;" class="col">
                        Pertanyaan Child 3
                    </div>
                    <div class="col-1">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3">
                        <strong>Pertanyaan</strong>
                    </div>
                    <div class="col-1 mt-3">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div style="padding-left: 30px;" class="col">
                        Pertanyaan Child 1
                    </div>
                    <div class="col-1">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div style="padding-left: 60px;" class="col">
                        Pertanyaan Child 2
                    </div>
                    <div class="col-1">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div style="padding-left: 90px;" class="col">
                        Pertanyaan Child 3
                    </div>
                    <div class="col-1">
                        YES
                    </div>
                </div>
                <div class="row">
                    <div style="padding-left: 120px;" class="col">
                        Pertanyaan Child 4
                    </div>
                    <div class="col-1">
                        YES
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>
<!--================Hero Banner Area End =================-->
<?php
require_once('footer.php');
?>