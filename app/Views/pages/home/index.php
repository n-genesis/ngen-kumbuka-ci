<!-- app/Views/pages/home/index.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('styles') ?>
    <!-- Core Stylesheet -->
    <link href="<?= base_url('assets/js/libs/introjs.min.css') ?>" rel="stylesheet" />
<?= $this->endSection() ?>


<?= $this->section('backend'); ?>

<!-- Backend Content -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Dashboard Home</h4>
            </div>
        </div>
        <div class="card-body">
            <?= view_cell('QuickPickCell', ['quickPickPage' => $quickPickPage]) ?>
        </div>
    </div>
</div>
<!-- END Backend Content-->

<!-- Home Content -->


<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
    <script src="<?= base_url('assets/js/libs/intro.min.js') ?>"></script>
    <!-- <script src="<?= base_url('assets/js/tour.js') ?>"></script> -->
<?= $this->endSection() ?>