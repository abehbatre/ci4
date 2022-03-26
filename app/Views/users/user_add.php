<?= $this->extend('_layout/default') ?>


<?= $this->section('title') ?>
<title><?= getenv('APP_NAME') ?> &mdash; <?= $title ?> </title>
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/template/assets/js/page/features-post-create.js"></script>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url() . 'user' ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1><?= $title ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="#"><?= user()->fullname ?></a></div>
        </div>
    </div>


    <div class="section-body">
        <br>
        <div class="card profile-widget">
            <div class="profile-widget-header">
                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                <div class="profile-widget-items">
                    <!-- <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Role</div>
                        <div class="profile-widget-item-value">CHANGE_ME</div>
                    </div> -->
                    <!-- <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Create At</div>
                        <div class="profile-widget-item-value">CHANGE_ME</div>
                    </div>
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Update At</div>
                        <div class="profile-widget-item-value">CHANGE_ME</div>
                    </div> -->
                </div>
            </div>
            <div class="profile-widget-description pb-0">
                <div class="profile-widget-name">New User<div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div> ID<?= rand(100000, 1000000000) ?>
                    </div>
                </div>


                <!--  FORM  -->
                <div class="card-body">
                    <form action="<?= route_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="form-group col-12">

                                <label>User Role</label>
                                <select class="form-control selectric">
                                    <option>Siswa</option>
                                    <option>Guru</option>
                                    <option>Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="fullname">Nama Lengkap</label>
                                <input id="fullname" type="name" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="username">Username</label>
                                <input id="username" type="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="password" class="d-block">Password</label>
                                <input id="password" type="password" class="form-control pwstrength <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" data-indicator="pwindicator" name="password">
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="password2" class="d-block">Password Confirmation</label>
                                <input id="password2" type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <div class="control-label">Status User</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" value="">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Active</span>
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <button type="submit" class="btn btn-warning btn-lg btn-block">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- END FORM -->

            </div>

            <br>
        </div>


    </div>
</section>
<?= $this->endSection() ?>