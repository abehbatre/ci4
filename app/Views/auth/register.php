<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; <?= getenv('APP_NAME') ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/selectric/public/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <!-- <div class="login-brand">
                            <img src="<?= base_url() ?>/template/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div> -->

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3><?= lang('Auth.register') ?></h3>
                            </div>
                            <div class="card-body">
                                <?= view('Myth\Auth\Views\_message_block') ?>
                            </div>

                            <div class="card-body">
                                <form action="<?= route_to('register') ?>" method="post">
                                    <?= csrf_field() ?>



                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="fullname">Nama Lengkap</label>
                                                <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" placeholder="Nama Lengkap" value="<?= old('fullname') ?>">
                                            </div>
                                        </div>


                                        <div class="form-group col-6">
                                            <label>Saya adalah</label>
                                            <select class="form-control selectric">
                                                <option>Siswa</option>
                                                <option>Guru</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="email"><?= lang('Auth.email') ?></label>
                                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="username"><?= lang('Auth.username') ?></label>
                                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="password"><?= lang('Auth.password') ?></label>
                                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            <?= lang('Auth.register') ?>
                                        </button>
                                    </div>
                                </form>
                                <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
    <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/selectric/public/jquery.selectric.min.js"></script>


    <!-- Template JS File -->
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>/template/assets/js/page/auth-register.js"></script>
</body>

</html>