<!-- User Home Page -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<!-- Backend Content -->
<div class="col-12">
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