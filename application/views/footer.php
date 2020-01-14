    <!-- ================ start footer Area ================= -->
    <footer class="footer-area">
        <div class="container">
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy; 2020 - KUN Center
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                    <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->

    <script src="<?php echo base_url('assets/vendors/jquery/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/owl-carousel/owl.carousel.min.js'); ?>"></script>
    <!-- <script src="<?php //echo base_url('assets/vendors/nice-select/jquery.nice-select.min.js'); 
                        ?>"></script> -->
    <script src="<?php echo base_url('assets/js/jquery.ajaxchimp.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/mail-script.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/skrollr.min.js'); ?>"></script>
    <!-- bs datepicker -->
    <script src="<?php echo base_url('assets/plugins/bs-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bs4-toggle/bootstrap4-toggle.min.js'); ?>"></script>

    <?php if (isset($recaptcha) && $recaptcha == "ON") { ?>
        <!-- recaptcha -->
        <script src="https://www.google.com/recaptcha/api.js?render=6Le9E84UAAAAAE-Va-h5gIIZKLq3aFMgX3pqzeT4"></script>
    <?php } ?>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
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

            $('#inputGroupFile').on('change', function() {
                //get the file name
                // var fileName = $(this).val();
                var fileName = $(this).val().replace('C:\\fakepath\\', " ");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });

            $("#emailvld1").blur(function() {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var str = $("#emailvld1").val();
                if (!re.test(str)) {
                    $("#emaillbl1").attr("class", "text-danger");
                    $("#emailvld1").css("border", "1px solid red");
                    alert("Mohon input email dengan benar.");
                } else {
                    $("#emaillbl1").removeClass("text-danger");
                    $("#emailvld1").css("border", "1px solid rgba(0,0,0,.15)");
                }
            });

            $("#emailvld2").blur(function() {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var str = $("#emailvld2").val();
                if (!re.test(str)) {
                    $("#emaillbl2").attr("class", "text-danger");
                    $("#emailvld2").css("border", "1px solid red");
                    alert("Mohon input email dengan benar.");
                } else {
                    $("#emaillbl2").removeClass("text-danger");
                    $("#emailvld2").css("border", "1px solid rgba(0,0,0,.15)");
                }
            });

            $('#form-login').submit(function(event) {
                event.preventDefault();
                // var email = $('#email').val();

                grecaptcha.ready(function() {
                    grecaptcha.execute('6Le9E84UAAAAAE-Va-h5gIIZKLq3aFMgX3pqzeT4', {
                        action: 'login'
                    }).then(function(token) {
                        $('#form-login').prepend('<input type="hidden" name="token" value="' + token + '">');
                        $('#form-login').prepend('<input type="hidden" name="action" value="login">');
                        $('#form-login').unbind('submit').submit();
                    });;
                });
            });

            $('#form-regis').submit(function(event) {
                event.preventDefault();
                // var email = $('#email').val();

                grecaptcha.ready(function() {
                    grecaptcha.execute('6Le9E84UAAAAAE-Va-h5gIIZKLq3aFMgX3pqzeT4', {
                        action: 'registration'
                    }).then(function(token) {
                        $('#form-regis').prepend('<input type="hidden" name="token" value="' + token + '">');
                        $('#form-regis').prepend('<input type="hidden" name="action" value="registration">');
                        $('#form-regis').unbind('submit').submit();
                    });;
                });
            });

            // Proses Input Kuisioner
            var lokasi = $('#lokasi');
            var tgldp = $('#dp');
            var parcat = $('.parcat');
            var subparcat = $('.subparcat');
            var btn = $('.btn-modal');

            $('.dspn').css('display', 'none');

            lokasi.change(function() {
                if ($(this).val() == '') {
                    tgldp.prop('disabled', true);
                } else {
                    tgldp.prop('disabled', false);
                }
            });

            tgldp.change(function() {
                if ($(this).val() != '') {
                    parcat.bootstrapToggle('enable');
                }
            });

            parcat.change(function() {
                if ($(this).attr('data-child')) {
                    var classChild = $(this).attr('data-child');
                    var classUncheck = $(this).attr('data-uncheck');
                    if ($('.' + classChild).length > 0) {
                        if ($(this).prop('checked')) {
                            $('.' + classChild).each(function() {
                                if ($(this).attr('data-toggle')) {
                                    $(this).bootstrapToggle('enable');
                                } else {
                                    $(this).val('');
                                    $(this).prop('disabled', false);
                                }
                            });
                        } else {
                            $('.' + classChild).each(function() {
                                if ($(this).attr('data-toggle')) {
                                    $(this).prop('checked', false).change();
                                    $(this).bootstrapToggle('disable');
                                } else {
                                    $(this).val('');
                                    $(this).prop('disabled', true);
                                }
                            });
                        }
                    }
                    if ($(this).prop('checked')) {
                        $('.' + classUncheck).each(function() {
                            $(this).prop('disabled', true);
                        });
                    } else {
                        $('.' + classUncheck).each(function() {
                            $(this).prop('disabled', false);
                        });
                    }
                }
            });

            btn.click(function() {
                if ($(this).attr('data-perjl')) {
                    var id = $(this).attr('data-perjl');
                    $.ajax({
                        url: '<?php echo base_url('perjalanan/detilperjl'); ?>',
                        method: 'post',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response.data);
                            var len = response.length;

                            if (len > 0) {
                                // alert('DATA DITEMUKAN');
                                $('.modal-body').html(response.data);

                            } else {
                                alert('DATA TIDAK DITEMUKAN');
                            }

                        }
                    });
                }
            });

            subparcat.change(function() {
                if ($(this).attr('data-child')) {
                    var classChild = $(this).attr('data-child');
                    var classUncheck = $(this).attr('data-uncheck');
                    if ($('.' + classChild).length > 0) {
                        if ($(this).prop('checked')) {
                            $('.' + classChild).each(function() {
                                if ($(this).attr('data-toggle')) {
                                    $(this).bootstrapToggle('enable');
                                } else {
                                    $(this).val('');
                                    $(this).prop('disabled', false);
                                }
                            });
                        } else {
                            $('.' + classChild).each(function() {
                                if ($(this).attr('data-toggle')) {
                                    $(this).prop('checked', false).change();
                                    $(this).bootstrapToggle('disable');
                                } else {
                                    $(this).val('');
                                    $(this).prop('disabled', true);
                                }
                            });
                        }
                    }
                    if ($(this).prop('checked')) {
                        $('.' + classUncheck).each(function() {
                            $(this).prop('disabled', true);
                        });
                    } else {
                        $('.' + classUncheck).each(function() {
                            $(this).prop('disabled', false);
                        });
                    }
                }
            });
        });
    </script>
    </body>

    </html>