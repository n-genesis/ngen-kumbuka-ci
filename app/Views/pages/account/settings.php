<!-- app/Views/pages/account/settings.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">User Settings</h4>
            </div>
            <a href="<?= site_url('admin/dashboard') ?>" class="btn btn-primary">
                <i class="bi bi-box-arrow-left"></i> Cancel
            </a>
        </div>
        <!-- Card Body -->
        <div class="card-body">

        </div>
    </div>
</div>


<?= $this->endSection(); ?>