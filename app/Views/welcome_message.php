<?= $this->extend('layouts/main'); ?>

<?= $this->section('main'); ?>

<main class="wrapper">
    <div class="mt-5 iq-maintenance">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-sm-12 text-center">
                    <div class="iq-maintenance mb-4">
                        <img src="<?= base_url('assets/images/kuma-avatar.png') ?>" class="img-fluid" alt="">
                        <h1 class="mt-0 mb-1"><?= lang('Landing.pageHeading') ?></h1>
                        <h3><?= lang('Landing.pageSubHeading') ?></h3>
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
                            <h5 class="card-title mt-1 mb-1"><?= lang('Landing.cardOneTitle') ?></h5>
                            <p class="mb-0"><?= lang('Landing.cardOneBody') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-journal-text display-4 line-height text-primary"></i>
                            <h5 class="card-title mt-1 mb-3"><?= lang('Landing.cardTwoTitle') ?></h5>
                            <a href="<?= site_url('login') ?>"
                                class="btn btn-primary"><?= lang('Landing.cardTwoLink') ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center">
                        <!-- Registration Link -->
                        <?php if (setting('Auth.allowRegistration')): ?>
                            <div class="card-body">
                                <i class="bi bi-people display-4 line-height text-primary"></i>
                                <h5 class="card-title mt-1 mb-1"><?= lang('Auth.needAccount') ?></h5>
                                <p class="mb-0"><a
                                        href="<?= url_to('register') ?>"><?= lang('Auth.needAccountLinkText') ?></a>
                                    <?= lang('Auth.needAccountText') ?>
                                </p>
                            </div>
                        <?php else: ?>
                            <div class="card-body">
                                <i class="bi bi-exclamation-octagon display-4 line-height text-primary"></i>
                                <h5 class="card-title mt-1 mb-1"><?= lang('Landing.cardThreeTitle') ?></h5>
                                <p class="mb-0"><?= lang('Landing.cardThreeBody') ?> <a
                                        href="<?= site_url('support') ?>"><?= lang('Landing.cardThreeLink') ?></a>.</p>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- END Main -->
<?= $this->endSection(); ?>