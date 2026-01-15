<?= $this->extend('layouts/main'); ?>

<?= $this->section('main'); ?>

<div class="wrapper">
    <div class="mt-5 iq-maintenance">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-sm-12 text-center">
                    <div class="iq-maintenance mb-4">
                        <img src="assets/images/kuma-avatar.png" class="img-fluid" alt="">
                        <h1 class="mt-0 mb-1"><?= esc($pageTitle) ?></h1>
                        <h3><?= esc($pageDescription) ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3 mb-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-window-fullscreen display-4 line-height text-primary"></i>
                            <h5 class="card-title mt-1 mb-1">It's Just That</h5>
                            <p class="mb-0">Nothing complext, just simply share notes with your friends.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-journal-text display-4 line-height text-primary"></i>
                            <h5 class="card-title mt-1 mb-3">Getting Started</h5>
                            <a href="<?= site_url('login') ?>" class="btn btn-primary">User Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-exclamation-octagon display-4 line-height text-primary"></i>
                            <h5 class="card-title mt-1 mb-1">Do you need Support?</h5>
                            <p class="mb-0">Contact an administrator for any technical issues. For more detail
                                information and support <a href="<?= site_url('support') ?>">Click Here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END Main -->
<?= $this->endSection(); ?>