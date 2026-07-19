<?php $this->setVar('appTitle', lang(line: 'Auth.register')); ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('main'); ?>

<div class="wrapper">
    <section class="login-content">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center height-self-center pb-4">

                <div class="col-lg-4 col-sm-12 mt-5 mt-md-0">
                    <div class="alert alert-info" role="alert">
                        <div class="iq-alert-text">
                            <h5 class="alert-heading">Hey There,</h5>
                            <p>"This application is a live portfolio project built to showcase web development skills using the CodeIgniter framework. It is not intended for commercial use."</p>
                            <p>This App is made just for fun and to mess around with the CodeIgniter 4 (it's like the new <b>TinkerToy <i>Extream</i> 2000 Set</b>) they just cam out with. Feel free to sighn
                                up using your snap email. It's only used for logging to post some Notes. Plus you can <span class="text-danger">Delete</span> your
                                account and info any time you want.
                            </p>
                            <hr>
                            <p class="mb-0">So I guess have fun, and if you have to time feedbaks welcome. I might keep toying around with Kumbuka later on.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 col-sm-12">
                    <!-- Alerts -->
                    <?= $this->include('blocks/alerts') ?>
                    <div class="sign-user_card">
                        <!-- Logo -->
                        <div class="logo-detail mb-0">
                            <div class="d-flex align-items-center"><img src="<?= base_url('assets/images/logo.png') ?>"
                                    class="img-fluid rounded-normal light-logo logo" alt="logo">
                                <a href="<?= url_to('login') ?>">
                                    <h4 class="logo-title ml-3"><?= esc($appName) ?></h4>
                                </a>
                            </div>
                        </div>

                        <h3 class="mb-2"><?= lang('Auth.register') ?></h3>
                        <p><?= lang('Auth.registerSubHeader') ?></p>

                        <form id="user-register-form" action="<?= url_to('register') ?>" method="post"
                            data-form-register="required">
                            <?= csrf_field() ?>

                            <div class="row">

                                <!-- Username -->
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="text"
                                            id="floatingUsernameInput" name="username" inputmode="text"
                                            autocomplete="username" placeholder=" " value="<?= old('username') ?>"
                                            required>
                                        <label for="floatingEmailInput"><?= lang('Auth.username') ?></label>
                                    </div>
                                </div>

                                <!-- First Name -->
                                <div class="col-lg-6">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="text"
                                            id="floatingFirstNameInput" name="first_name" inputmode="email"
                                            autocomplete="email" placeholder=" " value="<?= old('first_name') ?>"
                                            required>
                                        <label for="floatingFirstNameInput"><?= lang('Auth.firstName') ?></label>
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-lg-6">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="text"
                                            id="floatingLastNameInput" name="last_name" inputmode="email"
                                            autocomplete="email" placeholder=" " value="<?= old('last_name') ?>"
                                            required>
                                        <label for="floatingLastNameInput"><?= lang('Auth.lastName') ?></label>
                                    </div>
                                </div>


                                <!-- Email -->
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="email" id="floatingEmailInput"
                                            name="email" inputmode="email" autocomplete="email" placeholder=" "
                                            value="<?= old('email') ?>" required>
                                        <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-lg-6">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="password"
                                            id="floatingPasswordInput" name="password" inputmode="text"
                                            autocomplete="new-password" placeholder=" " required>
                                        <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                                    </div>
                                </div>

                                <!-- Password (Again) -->
                                <div class="col-lg-6">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="password"
                                            id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text"
                                            autocomplete="new-password" placeholder=" " required>
                                        <label
                                            for="floatingPasswordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="custom-control custom-checkbox mb-3 text-left">
                                        <input type="checkbox" class="custom-control-input" id="checkboxTermsOfUse">
                                        <label class="custom-control-label"
                                            for="checkboxTermsOfUse"><?= lang('Auth.iAgreeWithTerms') ?></label> <a
                                            href="<?= site_url('terms_of_use') ?>" target="_blank">
                                            <?= lang('Auth.termsOfService') ?></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Sign Up Button -->
                            <button type="submit" class="btn btn-primary"><?= lang('Auth.register') ?></button>

                            <p class="mt-3 mb-0">
                                <?= lang('Auth.haveAccount') ?>
                                <a href="<?= site_url('login') ?>"
                                    class="text-primary"><b><?= lang('Auth.login') ?></b></a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- END Main -->
<?= $this->endSection(); ?>