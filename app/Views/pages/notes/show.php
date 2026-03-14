<!-- app/Views/pages/notes/show.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('styles') ?>

<?= $this->endSection(); ?>

<?= $this->section('backend'); ?>

<div class="col-12">
    <div class="card card-block card-stretch">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">User Notes</h4>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>

    </div>
</div>

<?= $this->endSection(); ?>

<!-- Additional  JS Scripts -->
<?= $this->section('js') ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>


<?= $this->endSection() ?>