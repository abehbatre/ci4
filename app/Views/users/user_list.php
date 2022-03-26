<?= $this->extend('_layout/default') ?>


<?= $this->section('title') ?>
<title><?= getenv('APP_NAME') ?> &mdash; <?= $title ?> </title>
<?= $this->endSection() ?>


<?= $this->section('add-css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1><?= $title ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="#"><?= $title ?></a></div>
        </div>


    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto mr-auto">
                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all_user_tab" data-toggle="tab" href="#all_user" role="tab" aria-selected="true">All Users <span class="badge badge-transparent">(<?= count($allUserList) ?>)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="student_tab" data-toggle="tab" href="#student" role="tab" aria-selected="false">Student <span class="badge badge-transparent">(<?= count($studentUserList) ?>)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="teacher_tab" data-toggle="tab" href="#teacher" role="tab" aria-selected="false">Teacher <span class="badge badge-transparent">(<?= count($teacherUserList) ?>)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="admin_tab" data-toggle="tab" href="#admin" role="tab" aria-selected="false">Admin <span class="badge badge-transparent">(<?= count($adminUserList) ?>)</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="<?= site_url() . 'user/add' ?>" class="btn btn-icon btn-light"><i class="far ion ion-plus-round"></i> Create New User</a>
                    </div>
                </div>



                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="all_user" role="tabpanel" aria-labelledby="all_user_tab">
                        <!-- All Users -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Avatar</th>
                                        <th>User Role</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                    <!-- body -->
                                    <?php $i = 1; ?>
                                    <?php foreach ($allUserList as $user) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $user->fullname ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->username ?></td>
                                            <td>
                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/<?= $user->avatar ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $user->fullname ?>">
                                            </td>
                                            <td>
                                                <?php if ($user->roleCode == "admin") : ?>
                                                    <div class="badge badge-danger"><?= ucwords($user->role) ?></div>
                                                <?php elseif ($user->roleCode == "teacher") : ?>
                                                    <div class="badge badge-warning"><?= ucwords($user->role) ?></div>
                                                <?php elseif ($user->roleCode == "student") : ?>
                                                    <div class="badge badge-info"><?= ucwords($user->role) ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($user->active == "1") : ?>
                                                    <div class="badge badge-light">✅</div>
                                                <?php else : ?>
                                                    <div class="badge badge-light">🟥</div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= site_url() . 'user/' . $user->userid ?>" class="btn btn-icon btn-primary"><i class="far fa-user"></i></a>
                                                <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student_tab">
                        <!-- Student Users -->
                        <?php if (!empty($studentUserList)) : ?>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Avatar</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                        <!-- body -->
                                        <?php $i = 1; ?>
                                        <?php foreach ($studentUserList as $user) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $user->fullname ?></td>
                                                <td><?= $user->email ?></td>
                                                <td><?= $user->username ?></td>
                                                <td>
                                                    <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/<?= $user->avatar ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $user->fullname ?>">
                                                </td>
                                                <td>
                                                    <?php if ($user->active == "1") : ?>
                                                        <div class="badge badge-success">✅</div>
                                                    <?php else : ?>
                                                        <div class="badge badge-danger">🟥</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><a href="sasd" class="btn btn-primary">Detail</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        <?php else : ?>
                            <br>
                            <div class="alert alert-warning alert-has-icon">
                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Ups</div>
                                    Data masih kosong.
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher_tab">
                        <!-- Teacher Users -->
                        <?php if (!empty($teacherUserList)) : ?>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="data_table" class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Avatar</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                        <!-- body -->
                                        <?php $i = 1; ?>
                                        <?php foreach ($teacherUserList as $user) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $user->fullname ?></td>
                                                <td><?= $user->email ?></td>
                                                <td><?= $user->username ?></td>
                                                <td>
                                                    <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/<?= $user->avatar ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $user->fullname ?>">
                                                </td>
                                                <td>
                                                    <?php if ($user->active == "1") : ?>
                                                        <div class="badge badge-success">✅</div>
                                                    <?php else : ?>
                                                        <div class="badge badge-danger">🟥</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        <?php else : ?>
                            <br>
                            <div class="alert alert-warning alert-has-icon">
                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Ups</div>
                                    Data masih kosong.
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin_tab">
                        <!-- Admin Users -->
                        <?php if (!empty($adminUserList)) : ?>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Avatar</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                        <!-- body -->
                                        <?php $i = 1; ?>
                                        <?php foreach ($adminUserList as $user) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $user->fullname ?></td>
                                                <td><?= $user->email ?></td>
                                                <td><?= $user->username ?></td>
                                                <td>
                                                    <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/<?= $user->avatar ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $user->fullname ?>">
                                                </td>
                                                <td>
                                                    <?php if ($user->active == "1") : ?>
                                                        <div class="badge badge-success">✅</div>
                                                    <?php else : ?>
                                                        <div class="badge badge-danger">🟥</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        <?php else : ?>
                            <br>
                            <div class="alert alert-warning alert-has-icon">
                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Ups</div>
                                    Data masih kosong.
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>



<?= $this->section('add-js') ?>
<script src="<?= base_url() ?>/template/assets/js/page/components-table.js"></script>

<!-- DataTables -->
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- page script -->
<script>
    $(function() {
        $('#data_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            
        });
    });
</script>

<?= $this->endSection() ?>