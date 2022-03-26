<?= $this->extend('_layout/default') ?>


<?= $this->section('title') ?>
<title><?= getenv('APP_NAME') ?> &mdash; <?= $title ?></title>
<?= $this->endSection() ?>



<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="section-body">
    <?= d(user()->getRoles()) ?>
    </div>
</section>
<?= $this->endSection() ?>
