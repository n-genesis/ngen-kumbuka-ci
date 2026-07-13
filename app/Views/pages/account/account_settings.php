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

                            <!-- Username & Email FORM -->
                            <form action="<?= site_url('account/settings/update') ?>"  method="post" class="needs-validation" data-km="form" novalidate>
                                <?= csrf_field() ?>
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title m-0"><i class="bi bi-person"></i> User Credentials</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    
                                    <div class="acc-edit">

                                        <div class="form-group">
                                            <label for="uname">Username:</label>
                                            <input type="text" class="form-control" name="username" id="uname" value="<?= old('username', $user->username) ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?= old('email', $user->email) ?>" required>
                                        </div>
                                    </div>

                                    <!-- Update Notice -->
                                    <div class="alert bg-white alert-warning mb-0" role="alert">
                                            <div class="iq-alert-icon">
                                            <i class="bi bi-exclamation-diamond"></i>
                                        </div>
                                            <div class="iq-alert-text">
                                                <?= lang('Account.update-notice') ?>
                                            </div>
                                        </div>
                                    </div>

                                <footer class="card-footer d-flex align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-primary ml-auto" data-km="submit"><i class="bi bi-person-square"></i> Update User</button>
                                </footer>
                            </form>
                        </div>

                        <!-- Delete Account -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title"><i class="bi bi-x-octagon"></i> Delete Account</h4>
                                </div>
                                <a href="<?= site_url('privacy_policy') ?>" class="btn btn-outline-primary"><i class="bi bi-file-earmark-ruled"></i>Read Privacy
                                    Policy</a>
                            </div>
                            <div class="card-body">
                                <!-- User form -->
                                <form action="<?= base_url('admin/users/delete/' . $user->id) ?>" data-km="delete-form" data-km-username="<?= esc($user->username) ?>" method="post">

                                <!-- CSRF Protection is mandatory for destructive actions -->
                                <?= csrf_field() ?>
                                <!-- This "spoofs" the POST request as a DELETE request -->
                                <input type="hidden" name="_method" value="DELETE">
                                    <p><?= lang('Account.delete-account.text') ?></p>
                                    <div class="alert alert-info"><?= lang('Account.delete-account.notice') ?></div>
                                    <button type="submit" class="btn btn-outline-danger" role="#" data-km="submit" data-bs-toggle="tooltip" title="Delete Account">
                                        <i class="bi bi-trash"></i>
                                        <?= lang('Account.delete-account.btn') ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- User Password -->
                    <div class="col-6">
                        <!-- Security Kuma -->
                         <img src="<?= base_url('assets/images/layouts/kuma-security.png') ?>" class="img-fluid mx-auto d-block" alt="Centered Image" width="360">

                        <div class="card">
                            <!-- Change Password FORM -->
                            <form id="password-form" action="<?= site_url('account/settings/change-password') ?>" method="post" class="needs-validation" data-km="form" novalidate>
                                <?= csrf_field() ?>
                                
                                <div class="card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title m-0"><i class="bi bi-shield-lock"></i> Change Password</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    
                                    <label for="current_password">Current Password:</label>
                                    <div class="input-group mb-3">    
                                        <input id="current_password" type="password" class="form-control" name="current_password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="cp-btn-addon" data-km="show"><i class="bi bi-eye-slash-fill"></i></button>
                                        </div>
                                    </div>

                                    <label for="current_password">New Password:</label>
                                    <div class="input-group mb-3">    
                                        <input id="password" type="password" class="form-control" name="password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="pass-btn-addon" data-km="show"><i class="bi bi-eye-slash-fill"></i></button>
                                        </div>
                                    </div>

                                    <div class="alert bg-white alert-info" role="alert">
                                        <div class="iq-alert-text"><?= lang('Account.update-password.text-new-password') ?> </div>
                                    </div>

                                    <label for="current_password">Verify Password:</label>
                                    <div class="input-group mb-3">    
                                        <input id="password_confirm" name="password_confirm" type="password" class="form-control" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="pass-conf-btn-addon" data-km="show"><i class="bi bi-eye-slash-fill"></i></button>
                                        </div>
                                    </div>

                                </div>

                                <footer class="card-footer d-flex align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-primary ml-auto" data-km="submit"><i class="bi bi-shield-lock"></i> Save</button>
                                </footer>

                            </form>
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

<!-- Delete Account Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Account Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('assets/images/kuma-confirm-deletion.webp') ?>" class="img-fluid mx-auto d-block" alt="Centered Image">
                Are you sure you want to delete the account for <span id="modalUsername" class="text-danger"></span>? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalBtn" data-dismiss="modal">Cancel</button>
                <buttom type="button" id="deleteUserBtn" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let hash = window.location.hash;
    if (hash) {
        $('#nav-tabs a[href="' + hash + '"]').tab('show');
    }

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {

            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });


    const showBtn = document.querySelectorAll('[data-km="show"]');

    showBtn.forEach(ele => {
        ele.addEventListener('click', (event) => {
            event.preventDefault();
            let btn = event.target.closest('button');
            btn.classList.toggle('btn-outline-secondary');
            btn.classList.toggle('btn-primary');
            btn.querySelector('i').classList.toggle('bi-eye-slash-fill');
            btn.querySelector('i').classList.toggle('bi-eye');
            const par = event.target.closest('.input-group');
            const input = par.querySelector('input');
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    });




const deleteForms = document.querySelectorAll('form[data-km="delete-form"]');
deleteForms.forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault();// Prevent form submission
        $('#deleteModal').modal({// Show the modal
            backdrop: 'static',
            keyboard: false
        });
        const username = form.dataset.kmUsername;// Get form
        document.getElementById('modalUsername').textContent = username;
        $('#deleteModal').on('click','#deleteUserBtn', function(event) {
            const deleteUserBtn = document.getElementById('deleteUserBtn');
            deleteUserBtn.innerHTML = 'Loading...';
            document.getElementById('closeModalBtn').disabled = true;// Disable close button
            deleteUserBtn.disabled = true;// Confirm button
            form.submit();// Submit form
        })
    });
});
});
</script>
<?= $this->endSection() ?>