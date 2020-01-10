<form action="<?php echo base_url('register/add_user'); ?>" method="post">
                    <div class="card my-4">
                        <div class="card-block">
                            <div class="text-center">
                                <h2>FORM REGISTRASI</h2>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col">
                                    <label><small>Nama Lengkap</small></label>
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                                </div>
                                <div class="col">
                                    <label id="emaillbl"><small>Email</small></label>
                                    <input type="email" class="form-control" placeholder="Alamat Email" name="email" id="emailvld" required>
                                </div>
                                <div class="col">
                                    <label><small>No Handphone</small></label>
                                    <input type="text" class="form-control" placeholder="No Handphone" name="nohp" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label><small>Tempat Lahir</small></label>
                                    <input type="text" class="form-control upper" placeholder="Tempat Lahir" name="tmplahir" required>
                                </div>
                                <div class="col">
                                    <label><small>Tangal Lahir</small></label>
                                    <input type="text" class="form-control" placeholder="Tanggal Lahir" id="dp" name="tgllhr" required>
                                </div>
                                <div class="col">
                                    <label><small>Pekerjaan</small></label>
                                    <input type="text" class="form-control" placeholder="Pekerjaan" name="pekerjaan" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label><small>Golongan Darah</small></label>
                                    <input type="text" class="form-control upper" placeholder="Golongan Darah" name="gd" required>
                                </div>
                                <div class="col">
                                    <label><small>Password</small></label>
                                    <input type="password" class="form-control" placeholder="Masukkan Password" name="pw" required>
                                </div>
                                <div class="col">
                                    <label><small>Konfirmasi Password</small></label>
                                    <input type="password" class="form-control" placeholder="Konfirmasi Password" name="kpw" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label><small>Warga Kenegaraan</small></label>
                                    <select class="form-control" name="kenegaraan" required>
                                        <option value="">PILIH KENEGARAAN</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                </div>
                                <div class="col-8">
                                    <label><small>Alamat</small></label>
                                    <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-md btn-red btn-primary">DAFTAR</button>
                    </div>
                </form>