<!-- app/Views/public/user/profile_information.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<!-- Tab Content Navigation -->
<nav class="col-lg-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="iq-edit-list usr-edit">
                <ul class="iq-edit-profile d-flex justify-content-between nav nav-pills">
                    <li class="col-md-3 p-0">
                        <a class="nav-link active" href="<?= base_url('account') ?>">Edit Profile</a>
                    </li>
                    <li class="col-md-3 p-0">
                        <a class="nav-link" href="<?= base_url('account/settings') ?>">
                            Account Settings
                        </a>
                    </li>
                    <li class="col-md-3 p-0">
                        <a class="nav-link" href="<?= base_url('account/settings') ?>#emailnotifications">
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

            <!-- General Profile Information FORM -->
            <form action="<?= site_url('account/update') ?>" method="post" class="needs-validation" data-km="form" novalidate>
                <?= csrf_field() ?>

                <!-- Edit Personal Information -->
                <section class="tab-pane fade active show" id="personal-information" role="tabpanel">

                    <div class="row">

                        <!-- User Avatar & Social Links -->
                        <aside class="col-md-4">
                            <div class="card">
                                <!-- Card Header -->
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Avatar & Social</h4>
                                    </div>
                                </div>

                                <div class="card-body">

                                        <!-- User Avatar Image -->
                                        <div class="form-group text-center">
                                            <div class="d-flex justify-content-center">
                                                <div class="crm-profile-img-edit">
                                                    <img class="crm-profile-pic avatar-100"
                                                        src="uploads/default-avatar.jpg" alt="profile-pic">
                                                    <div class="crm-p-image bg-primary">
                                                        <i class="bi bi-image"></i>
                                                        <input class="file-upload" type="file" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="img-extension mt-3">
                                                <div class="d-inline-block align-items-center">
                                                    <span>Only</span>
                                                    <a href="javascript:void();">.jpg</a>
                                                    <a href="javascript:void();">.png</a>
                                                    <a href="javascript:void();">.jpeg</a>
                                                    <span>allowed</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- User Social Links -->
                                        <div class="form-group">
                                            <label for="furl">Facebook:</label>
                                            <input type="text" class="form-control" id="furl" value="<?= old('facebook', $facebook) ?>" placeholder="Facebook">
                                        </div>
                                        <div class="form-group">
                                            <label for="turl">Twitter:</label>
                                            <input type="text" class="form-control" id="turl" value="<?= old('twitter',$twitter) ?>" placeholder="Twitter">
                                        </div>
                                        <div class="form-group">
                                            <label for="instaurl">Snapchat:</label>
                                            <input type="text" class="form-control" id="instaurl" value="<?= old('snapchat', $snapchat) ?>" placeholder="Snapchat">
                                        </div>
                                        <div class="form-group">
                                            <label for="lurl">Instagram:</label>
                                            <input type="text" class="form-control" id="lurl" value="<?= old('instagram',$instagram) ?>" placeholder="Instagram">
                                        </div>

                                </div>
                            </div>
                        </aside>

                        <!-- General Profile Information -->
                        <section class="col-lg-8">

                            <!-- Profile Info Card -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Personal Information</h4>
                                    </div>
                                </div>

                                <!-- Profile Info Card Body -->
                                <div class="card-body">
                                    <div class="new-user-info">

                                        <div class="row">
                                            <!-- First, Last Name, & Profile Bio -->
                                            <div class="form-group col-md-6">
                                                <label for="fname">First Name:</label>
                                                <input type="text" class="form-control" name="first_name" id="fname" value="<?= old('first_name', $user->first_name) ?>"
                                                    placeholder="First Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="lname">Last Name:</label>
                                                <input type="text" class="form-control" name="last_name" id="lname" value="<?= old('last_name', $user->last_name) ?>"
                                                    placeholder="Last Name" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="bio" class="form-lable">Profile Bio</label>
                                                <textarea class="form-control" name="bio" id="bio" placehoder="A message to add to users account." rows="5"><?= old('bio', $user->bio) ?></textarea>
                                            </div>
                                            <input type="hidden" name="user_id" value="<?= $user->id ?>">

                                            <!-- Optional Information  -->
                                            <div class="col-md-12">
                                                <div class="card text-white bg-info">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-white mb-1">
                                                            Optional <small>(You don't need to add
                                                                this info. It's up
                                                                to you.)</small></h5>
                                                        <div class="row">
                                                            <!-- Orginization/Company Name & Phone Optional -->
                                                            <div class="form-group col-md-6">
                                                                <label for="coname">Company Name:</label>
                                                                <input type="text" class="form-control" name="organization" id="coname" value="<?= old('organization', $user->organization) ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="phone">Phone:</label>
                                                                <input type="text" class="form-control" name="phone" id="phone" value="<?= old('phone', $user->phone) ?>">
                                                            </div>
                                                            <!-- Address -->
                                                            <div class="form-group col-md-6">
                                                                <label for="add1">Street Address 1:</label>
                                                                <input type="text" class="form-control" name="address1" id="add1" value="<?= old('address1', $user->address1) ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="add2">Street Address 2:</label>
                                                                <input type="text" class="form-control" name="address2" id="add2" value="<?= old('address2', $user->address2) ?>">
                                                            </div>
                                                            <!-- City, State, & Zipcode -->
                                                            <div class="form-group col-md-6">
                                                                <label for="city">City:</label>
                                                                <input type="text" class="form-control" name="city" id="city" value="<?= old('city', $user->city) ?>">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="state">State:</label>
                                                                <input type="text" class="form-control" name="state" id="state" value="<?= old('state', $user->state) ?>">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="zip">Zip:</label>
                                                                <input type="text" class="form-control" name="zip" id="zip" value="<?= old('organization', $user->zip) ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-secondary mr-auto">
                                        <i class="bi bi-box-arrow-left"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary" data-km="submit">Save</button>
                                </div>
                            </div>
                        </section>
                    </div>

                </section>

            </form>
            <!-- END FORM -->

        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    // Form validation
    (function () {
        'use strict';

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
    })();
</script>
<?= $this->endSection() ?>