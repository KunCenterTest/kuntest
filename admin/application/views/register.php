<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-kuncenter.png'); ?>">
    <title>KUN Center</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url('assets/plugins/chartist-js/dist/chartist.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/chartist-js/dist/chartist-init.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/bs-datepicker/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?php echo base_url('assets/plugins/c3-master/c3.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url('assets/css/colors/custom.css'); ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div style="background: #D60000; height: 100vh;" class="row justify-content-center align-self-center">
            <!-- Column -->
            <div style="padding-top: 10px" class="col-md-4">
                <?php if ($this->session->flashdata('res')) { ?>
                    <div class="alert alert-danger alert-cus text-center" role="alert">
                        <?php echo $this->session->flashdata('res'); ?>
                    </div>
                <?php } ?>
                <div class="text-center">
                    <img width="30%" src="<?php echo base_url('assets/images/logo-kun-center.jpg'); ?>">
                </div>
                <form action="<?php echo base_url('register/add_user'); ?>" id="form-regis" method="post">
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
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label id="emaillbl"><small>Email</small></label>
                                    <input type="email" class="form-control" placeholder="Alamat Email" name="email" id="emailvld" required>
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
                        </div>
                    </div> 
                    <div class="text-center">
                        <button type="submit" class="btn btn-md btn-red btn-primary">DAFTAR</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/tether.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url('assets/js/jquery.slimscroll.js'); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/js/waves.js'); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('assets/js/sidebarmenu.js'); ?>"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('assets/js/custom.min.js'); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="<?php echo base_url('assets/plugins/chartist-js/dist/chartist.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'); ?>"></script>
    <!--c3 JavaScript -->
    <script src="<?php echo base_url('assets/plugins/d3/d3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/c3-master/c3.min.js'); ?>"></script>
    <!-- bs datepicker -->
    <script src="<?php echo base_url('assets/plugins/bs-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
    <!-- recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LfRNswUAAAAAJguQmQgnfx1suGLIw4WlVls97N9"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url('assets/js/dashboard1.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#dp').datepicker({
                format: "dd-mm-yyyy"
            });

            $('.upper').keyup(function() {
                this.value = this.value.toUpperCase();
            });

            $('.lower').keyup(function() {
                this.value = this.value.toLowerCase();
            });

            $("#emailvld").blur(function() {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var str = $("#emailvld").val();
                if (!re.test(str)) {
                    $("#emaillbl").attr("class", "text-danger");
                    $("#emailvld").css("border", "1px solid red");
                    alert("Mohon input email dengan benar.");
                } else {
                    $("#emaillbl").removeClass("text-danger");
                    $("#emailvld").css("border", "1px solid rgba(0,0,0,.15)");
                }
            });

            var saveExec = "<?php echo base_url('register/add_user'); ?>"

            $('#form-regis').submit(function(event) {
                event.preventDefault();
                // var email = $('#email').val();

                grecaptcha.ready(function() {
                    grecaptcha.execute('6LfRNswUAAAAAJguQmQgnfx1suGLIw4WlVls97N9', {
                        action: 'registration'
                    }).then(function(token) {
                        $('#form-regis').prepend('<input type="hidden" name="token" value="' + token + '">');
                        $('#form-regis').prepend('<input type="hidden" name="action" value="registration">');
                        $('#form-regis').unbind('submit').submit();
                    });;
                });
            });
        });
    </script>

</body>

</html>