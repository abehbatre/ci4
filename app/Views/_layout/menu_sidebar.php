<li class="menu-header">General</li>

<li class=""><a class="nav-link" href="<?= site_url() ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

<?php if (in_groups('admin')) : ?>
    <li class="menu-header">Module (Admin)</li>

    <li class="nav-item dropdown">
        <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= site_url() . 'user' ?>"><span>- Pengguna</span></a></li>
            <li><a class="nav-link" href="<?= site_url() . 'user' ?>"><span>- Grup Pengguna</span></a></li>
            <li><a class="nav-link" href="<?= site_url() . 'user' ?>"><span>- Semester</span></a></li>
        </ul>
    </li>

<?php endif; ?>


<?php if (in_groups('admin') || in_groups('teacher')) : ?>
    <li class="menu-header">Module (Teacher)</li>
    
    <li><a class="nav-link" href="<?= site_url() ?>"><i class="fas fa-check"></i> <span>Absensi</span></a></li>
    <li><a class="nav-link" href="<?= site_url() ?>"><i class="fas fa-book"></i> <span>Pembelajaran</span></a></li>
    
    <li class="nav-item dropdown">
        <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= site_url() . 'user' ?>"><span>- Kelas</span></a></li>
            <li><a class="nav-link" href="<?= site_url() . 'user' ?>"><span>- Siswa</span></a></li>
        </ul>
    </li>

<?php endif; ?>

<?php if (in_groups('admin') || in_groups('student')) : ?>
    <li class="menu-header">Module (Student)</li>
    <li><a class="nav-link" href="<?= site_url() ?>"><i class="fas fa-check"></i> <span>Absensi</span></a></li>
    <li><a class="nav-link" href="<?= site_url() ?>"><i class="fas fa-book"></i> <span>Pembelajaran</span></a></li>

<?php endif; ?>