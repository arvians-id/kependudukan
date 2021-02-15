<?= $this->extend('auth/authLayout/indexLayout') ?>
<?= $this->section('content') ?>
<div id="app">
    <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="p-4 m-3">
                    <img src="/template/stisla/assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                    <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">PT ARFIAN SEJAHTERA</span></h4>
                    <p class="text-muted">Silahkan login bagi yang sudah memiliki akun, bila belum memiliki akun silahkan datang ke IT Center</p>
                    <input type="hidden" value="<?= old('') ?>">
                    <form action="/auth/login" method="POST" id="form-input">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" value="<?= old('email') ?>" />
                            <div class="invalid-feedback email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" />
                            <div class="invalid-feedback password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <a href="auth-forgot-password.html" class="float-left mt-3">
                                Lupa Password?
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4" id="btn-masuk">
                                Masuk
                            </button>
                        </div>
                    </form>
                    <div class="text-center mt-5 text-small">
                        Copyright &copy; PT ARFIAN SEJAHTERA. Made with 💙 by Stisla
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 order-1 overlay-gradient-bottom" data-background="/template/stisla/assets/img/unsplash/login-bg.jpg">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                            <h5 class="font-weight-normal text-muted-transparent">Sukabumi, Indonesia</h5>
                        </div>
                        Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    function validationForm(response) {
        if (response.error.email) {
            $('#email').addClass('is-invalid');
            $('.email').html(response.error.email);
        } else {
            $('#email').removeClass('is-invalid');
            $('.email').html('');
        }

        if (response.error.password) {
            $('#password').addClass('is-invalid');
            $('.password').html(response.error.password);
        } else {
            $('#password').removeClass('is-invalid');
            $('.password').html('');
        }
    }
    $(document).ready(function() {
        $('#form-input').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btn-masuk').attr('disabled', true);
                    $('#btn-masuk').html('<div class="spinner-border text-info spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
                },
                success: function(response) {
                    if (response.error) {
                        validationForm(response)
                    } else {
                        alert(response.success)
                    }
                },
                complete: function() {
                    $('#btn-masuk').removeAttr('disabled');
                    $('#btn-masuk').html('Masuk');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + xhr.responseText + thrownError);
                }
            })
            return false;
        })
    })
</script>
<?= $this->endSection() ?>