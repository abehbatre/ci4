<?= $this->extend('_layout/default') ?>


<?= $this->section('title') ?>
<title><?= getenv('APP_NAME') ?> &mdash; <?= $title ?> </title>
<?= $this->endSection() ?>


<?= $this->section('add-css') ?>
<!-- additional css (spesific page) -->
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<!-- additional js (spesific page) -->
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
    </div>
</section>
<?= $this->endSection() ?>