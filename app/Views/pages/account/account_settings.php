<!-- app/Views/pages/account/settings.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>


<!-- Tab Content Navigation -->
<nav class="col-lg-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="iq-edit-list usr-edit">
                <ul id="nav-tabs" class="iq-edit-profile d-flex justify-content-between nav nav-pills">
                    <li class="col-md-3 p-0">
                        <a class="nav-link" href="<?= base_url('account') ?>">Edit Profile</a>
                    </li>
                    <li class="col-md-3 p-0">
                        <a class="nav-link active" data-toggle="pill" href="#user-credentials">
                            Personal Information
                        </a>
                    </li>
                    <li class="col-md-3 p-0">
                        <a class="nav-link" data-toggle="pill" href="#emailnotifications">
                            Email Notifications
                        </a>
                    </li>
                    <li class="col-md-3 p-0">
                        <a class="nav-link" href="<?= base_url('account/privacy') ?>">
                            Privacy Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="col-lg-12">
    <div class="iq-edit-list-data">

        <!-- MAIN TAB Content -->
        <div class="tab-content">

            <!-- Username & Email -->
            <div class="tab-pane fade active show" id="user-credentials" role="tabpanel">

                <div class="row">

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title m-0">User Credentials</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="acc-edit">
                                    <!-- Username & Email FORM-->
                                    <form>
                                        <div class="form-group">
                                            <label for="uname">Username:</label>
                                            <input type="text" class="form-control" id="uname"
                                                value="<?= old('username', $user->username) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email"
                                                value="<?= old('email', $user->email) ?>">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <footer class="card-footer d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-primary ml-auto">Save</button>
                            </footer>

                        </div>
                        
                        <!-- Delete Account -->
                        <div class="card">
                        <div class="card-header">Delete Account</div>
                        <div class="card-body">
                            <form>
                                <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                                <button type="button" class="btn btn-outline-danger" role="#">I understand, delete my account</button>
                            </form>
                        </div>
                    </div>
                    </div>

                    <!-- User Password -->
                    <div class="col-6">
                        <div class="card">

                            <div class="card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title m-0">Password</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                <!-- Change Password FORM-->
                                <form>
                                    <div class="form-group">
                                        <label for="cpass">Current Password:</label>
                                        <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                        <input type="Password" class="form-control" id="cpass" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="npass">New Password:</label>
                                        <input type="Password" class="form-control" id="npass" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vpass">Verify Password:</label>
                                        <input type="Password" class="form-control" id="vpass" value="">
                                    </div>
                                </form>
                            </div>

                            <footer class="card-footer d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-primary ml-auto">Save</button>
                            </footer>

                        </div>
                    </div>

                </div>

            </div>

            <!-- Email Notification Settings -->
            <div class="tab-pane fade" id="emailnotifications" role="tabpanel">

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title m-0">Email Notification</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Notification Setting Form -->
                        <form>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                <div class="col-md-9 custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="emailnotification"
                                        checked="">
                                    <label class="custom-control-label" for="emailnotification"></label>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3" for="npass">When To Email</label>
                                <div class="col-md-9">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email01">
                                        <label class="custom-control-label" for="email01">You have new
                                            notifications.</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email02">
                                        <label class="custom-control-label" for="email02">You're sent a direct
                                            message</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                        <label class="custom-control-label" for="email03">Someone adds you as a
                                            connection</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn iq-bg-danger">Cancel</button>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    let hash = window.location.hash;
        console.log("hash:" + hash);
        if (hash) {
            $('#nav-tabs a[href="' + hash + '"]').tab('show');
        }
});
</script>
<?= $this->endSection(); ?>