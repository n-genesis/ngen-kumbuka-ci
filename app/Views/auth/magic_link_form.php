<?php $this->setVar('appTitle', lang(line: 'Auth.forgotPassword')); ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('main'); ?>

<div class="wrapper">
    <section class="login-content">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center height-self-center">

                <div class="col-md-5 col-sm-12 col-12 align-self-center">

                    <!-- Alerts -->
                    <?= $this->include('blocks/alerts') ?>

                    <div class="sign-user_card">
                        <div class="logo-detail">
                            <div class="d-flex align-items-center">
                                <img src="<?= base_url('assets/images/logo.png') ?>" class="img-fluid rounded-normal light-logo logo" alt="logo">   
                                <h4 class="logo-title ml-3"><?= esc($appName) ?></h4>
                            </div>
                        </div>
                        <h3 class="mb-2"><?= lang('Auth.forgotPassword') ?></h3>
                        <p><?= lang('Auth.useMagicLinkText') ?></p>
                        <form action="<?= url_to('magic-link') ?>" method="post">

                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <!-- Email -->
                                        <input class="floating-input form-control" type="email" id="floatingEmailInput" name="email" autocomplete="email" placeholder=" " value="<?= old('email', auth()->user()->email ?? null) ?>" required>
                                        <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><?= lang('Auth.send') ?></button>
                        </form>
                        <p class="text-center mt-3"><a href="<?= url_to('login') ?>"><?= lang('Auth.backToLogin') ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- END Main -->
<?= $this->endSection(); ?>