<?php $this->setVar('appTitle', lang(line: 'Auth.useMagicLink')); ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('main'); ?>

<div class="wrapper">
    <section class="login-content">
        <div class="container-fluid h-100">
            <div class="row justify-content-center align-items-center height-self-center">
                <div class="col-md-5 col-sm-12 col-12 align-self-center">
                    <div class="sign-user_card">
                        <div class="logo-detail">
                            <div class="d-flex align-items-center"><img src="<?= base_url('assets/images/logo.png') ?>" class="img-fluid rounded-normal light-logo logo" alt="logo">
                                <h4 class="logo-title ml-3"><?= esc($appName) ?></h4>
                            </div>
                        </div>
                        <h3 class="mb-2"><?= lang('Auth.checkYourEmail') ?></h3>
                        <p class="cnf-mail m-auto mb-1">
                            <?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?></p>
                        <div class="d-inline-block w-100">
                            <a href="<?= url_to('login') ?>"
                                class="btn btn-primary mt-3"><?= lang('Auth.backToLogin') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- END Main -->
<?= $this->endSection(); ?>