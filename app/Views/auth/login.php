<?php $this->setVar('appTitle', lang(line: 'Auth.login')); ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('main'); ?>

<div class="wrapper">
    <section class="login-content">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center height-self-center">

                <div class="col-lg-6 d-none d-lg-block">
                    <!-- Background Image: Shifted right and placed behind -->
                        <img src="assets/images/layouts/kuma-login.png" class="img-fluid" alt="Hello There">
                </div>

                <div class="col-sm-12 col-lg-4 align-self-center">

                    <!-- Alerts -->
                    <?= $this->include('blocks/alerts') ?>

                    <!-- SignIn User Card -->
                    <div class="sign-user_card">
                        <div class="logo-detail">
                            <div class="d-flex align-items-center">
                                <img src="<?= base_url('assets/images/logo.png') ?>"
                                    class="img-fluid rounded-normal light-logo logo" alt="logo">
                                <a href="<?= site_url('/') ?>"><h4 class="logo-title ml-3"><?= esc($appName) ?></h4>
                                </a>
                            </div>
                        </div>

                        <h3 class="mb-2"><?= lang('Auth.login') ?></h3>
                        <p><?= lang('Auth.loginHeadline') ?></p>

                        <form action="<?= url_to('login') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">

                                <!-- Email -->
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input id="floatingEmailInput" class="floating-input form-control" type="email" name="email"
                                            inputmode="email" autocomplete="email" placeholder=" " value="<?= old('email') ?>"required>
                                            <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input id="floatingPasswordInput" class="floating-input form-control" type="password" name="password" inputmode="text" autocomplete="current-password" placeholder=" " required>
                                            <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                                    </div>
                                </div>
                                
                                <!-- Remember me -->
                                <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                                    <div class="col-lg-6">
                                        <div class="custom-control custom-checkbox mb-3 text-left">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="rememberMeKumbuka" <?php if (old('remember')): ?> checked<?php endif ?>>
                                            <label class="custom-control-label" for="rememberMeKumbuka"><?= lang('Auth.rememberMe') ?></label>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- MagicLink -->
                                <?php if (setting('Auth.allowMagicLinkLogins')): ?>
                                    <div class="col-lg-6">
                                        <a href="<?= url_to('magic-link') ?>"
                                            class="text-primary float-right"><?= lang('Auth.forgotPassword') ?></a>
                                    </div>
                                <?php endif ?>
                            </div>

                            <!-- Sign In Button -->
                            <button type="submit" class="btn btn-primary"><?= lang('Auth.loginButton') ?></button>
                            
                            <!-- Registration Link -->
                            <?php if (setting('Auth.allowRegistration')): ?>
                                <p class="mt-3 mb-0">
                                    <?= lang('Auth.needAccount') ?> <a href="<?= url_to('register') ?>"
                                        class="text-primary"><b><?= lang('Auth.register') ?></b></a>
                                </p>
                            <?php endif ?>
                            
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </section>
</div>

<!-- END Main -->
<?= $this->endSection(); ?>