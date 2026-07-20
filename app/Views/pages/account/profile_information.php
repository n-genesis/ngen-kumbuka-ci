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


            <!-- Edit Personal Information -->
            <section class="tab-pane fade active show" id="personal-information" role="tabpanel">

                <div class="row">

                    <!-- User Cover, Avatar & Social Links -->
                    <aside class="col-md-4">
                        <!-- cover Image -->
                        <div class="card">
                            <header class="card-header">
                                <h1 class="lead">Cover Image</h1>
                            </header>
                            <div class="card-body d-flex justify-content-center">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            <div class="profile-img-edit">
                                                <div class="crm-profile-img-edit">
                                                    <form id="cover-image-form" action="<?= base_url('account/update-cover-image') ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                                    <label for="cover-image-input" role="button">
                                                        <img src="<?= base_url($user->cover_image) ?>" class="cover-image-preview img-thumbnail img-fluid rounded" alt="Profile Cover Image">
                                                    </label>
                                                    <label class="crm-p-image bg-primary" style="left: 0px; bottom: 0px;" for="cover-image-input">
                                                        <i class="bi bi-image"></i>
                                                        <input id="cover-image-input" class="file-upload" name="cover-image" type="file" accept="image/jpeg, image/png, image/webp" required>
                                                    </label>
                                                    <p class="mb-0 text-center">Click Image to upload</p>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="card">
                            <!-- Card Header -->
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Avatar & Social</h4>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="form-group text-center">
                                    <div class="d-flex justify-content-center">
                                        <div class="crm-profile-img-edit">
                                            <label for="avatarFile" role="button">
                                            <img class="crm-profile-pic avatar-100" src="<?= base_url($userAvatar) ?>"
                                                alt="profile-pic">
                                            </label>
                                            <!-- User Avatar Image -->
                                            <form id="user-avatar-form" action="<?= base_url('account/update-avatar') ?>" method="post"
                                                enctype="multipart/form-data">
                                                <?= csrf_field() ?>
                                                <input type="file" class="form-control" name="user-avatar"
                                                    id="avatarFile" hidden>
                                                <label class="crm-p-image bg-primary" for="avatarFile">
                                                    <i class="bi bi-image"></i>
                                                </label>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="img-extension mt-1">
                                        <div class="d-inline-block align-items-center">
                                            <span>Only</span>
                                            <a href="javascript:void();">.jpg</a>
                                            <a href="javascript:void();">.png</a>
                                            <a href="javascript:void();">.webp</a>
                                            <span>allowed</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- General Profile Information FORM -->
                                <form action="<?= site_url('account/update-social') ?>" method="post" class="needs-validation"
                                    data-km="form" novalidate>
                                    <?= csrf_field() ?>

                                    <!-- User Social Links -->
                                    <div class="form-group">
                                        <label for="furl">Facebook:</label>
                                        <input type="text" class="form-control" name="facebook" id="furl"
                                            value="<?= old('facebook', $facebook) ?>" placeholder="Facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="turl">Twitter:</label>
                                        <input type="text" class="form-control" name="twitter" id="turl"
                                            value="<?= old('twitter', $twitter) ?>" placeholder="Twitter">
                                    </div>
                                    <div class="form-group">
                                        <label for="instaurl">Snapchat:</label>
                                        <input type="text" class="form-control" name="snapchat" id="instaurl"
                                            value="<?= old('snapchat', $snapchat) ?>" placeholder="Snapchat">
                                    </div>
                                    <div class="form-group">
                                        <label for="lurl">Instagram:</label>
                                        <input type="text" class="form-control" name="instagram" id="lurl"
                                            value="<?= old('instagram', $instagram) ?>" placeholder="Instagram">
                                    </div>
                                    <div class="form-group">
                                        <label for="wurl">Website:</label>
                                        <input type="text" class="form-control" name="user_website" id="wurl"
                                            value="<?= old('user_website', $user_website) ?>" placeholder="Website" />
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" data-km="submit">
                                            <?= lang('App.btn.save') ?>
                                        </button>
                                    </div>
                                </form>

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
                            <!-- General Profile Information FORM -->
                            <form action="<?= site_url('account/update') ?>" method="post" class="needs-validation" data-km="form" novalidate>
                                <?= csrf_field() ?>
                                <!-- Profile Info Card Body -->
                                <div class="card-body">
                                    <div class="new-user-info">

                                        <div class="row">
                                            <!-- First, Last Name, & Profile Bio -->
                                            <div class="form-group col-md-6">
                                                <label for="fname">First Name:</label>
                                                <input type="text" class="form-control" name="first_name" id="fname"
                                                    value="<?= old('first_name', $user->first_name) ?>"
                                                    placeholder="First Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="lname">Last Name:</label>
                                                <input type="text" class="form-control" name="last_name" id="lname"
                                                    value="<?= old('last_name', $user->last_name) ?>"
                                                    placeholder="Last Name" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="bio" class="form-lable">Profile Bio</label>
                                                <textarea class="form-control" name="bio" id="bio"
                                                    placeholder="A brief description of yourself..." rows="5"
                                                    maxlength="500"><?= old('bio', $user->bio) ?></textarea>
                                            </div>
                                            <input type="hidden" name="user_id" value="<?= $user->user_id ?>">

                                            <!-- Optional Information  -->
                                            <div class="col-md-12">
                                                <div class="card border-primary border">
                                                    <div class="card-body">
                                                        <div class="alert bg-white alert-info " role="alert">
                                                            <div class="iq-alert-icon">
                                                                <img src="<?= base_url('assets/images/kuma-be-kind.webp'); ?>"   alt="Icon" class="float-left mr-2" width="128" height="128">
                                                            </div>
                                                            <div class="iq-alert-text">This section is only meant for fun, so silly answers are welcome. It's only shown on your profile if you fill it out.<br /> Remember Be Happy and No Worries.<br /> 
                                                            Thank you,<br />
                                                            <i>Love Kumba</i>
                                                         </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- Orginization/Company Name & Phone Optional -->
                                                            <div class="form-group col-md-6">
                                                                <label for="coname">Company Name:</label>
                                                                <input type="text" class="form-control"
                                                                    name="organization" id="coname"
                                                                    value="<?= old('organization', $user->organization) ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="phone">Phone:</label>
                                                                <input type="text" class="form-control" name="phone"
                                                                    id="phone"
                                                                    value="<?= old('phone', $user->phone) ?>">
                                                            </div>
                                                            <!-- Address -->
                                                            <div class="form-group col-md-6">
                                                                <label for="add1">Street Address 1:</label>
                                                                <input type="text" class="form-control" name="address1"
                                                                    id="add1"
                                                                    value="<?= old('address1', $user->address1) ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="add2">Street Address 2:</label>
                                                                <input type="text" class="form-control" name="address2"
                                                                    id="add2"
                                                                    value="<?= old('address2', $user->address2) ?>">
                                                            </div>
                                                            <!-- City, State, & Zipcode -->
                                                            <div class="form-group col-md-6">
                                                                <label for="city">City:</label>
                                                                <input type="text" class="form-control" name="city"
                                                                    id="city" value="<?= old('city', $user->city) ?>">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="state">State:</label>
                                                                <input type="text" class="form-control" name="state"
                                                                    id="state"
                                                                    value="<?= old('state', $user->state) ?>">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="zip">Zip:</label>
                                                                <input type="text" class="form-control" name="zip"
                                                                    id="zip" value="<?= old('zip', $user->zip) ?>">
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
                                    <a href="<?= site_url('home') ?>" class="btn btn-outline-secondary mr-auto">
                                        <i class="bi bi-box-arrow-left"></i> <?= lang('App.btn.back') ?>
                                    </a>
                                    <button type="submit" class="btn btn-primary"
                                        data-km="submit"><?= lang('App.btn.save') ?></button>
                                </div>
                            </form><!-- END FORM -->
                        </div>
                    </section>
                </div>

            </section>



        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<!-- Uploading User Avatar Image -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Avatar Image Uplaod
        const fileInput = document.getElementById('avatarFile');
        const avatarForm = document.getElementById('user-avatar-form');
        if (fileInput !== null && avatarForm !== null) {
            fileInput.addEventListener('change', function () {

                avatarForm.submit();
            });
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

        // Cover Image Uploading
        const fileCoverInput = document.getElementById('cover-image-input');
        const imageForm = document.getElementById('cover-image-form');
        if (fileCoverInput !== null && imageForm !== null) {
            fileCoverInput.addEventListener('change', function () {
                imageForm.submit();
            });
        }

    });
</script>

<?= $this->endSection() ?>