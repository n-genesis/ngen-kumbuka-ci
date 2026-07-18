<!-- app/Views/pages/account/privacy.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<!-- Tab Content Navigation -->
<nav class="col-lg-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="iq-edit-list usr-edit">
                <ul class="iq-edit-profile d-flex justify-content-between nav nav-pills">
                    <li class="col-md-3 p-0">
                        <a class="nav-link" href="<?= base_url('account') ?>">Edit Profile</a>
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
                        <a class="nav-link active" href="<?= base_url('account/privacy') ?>">
                            Privacy Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- User Privacy Settings -->
<div class="col-lg-12">
    <div class="card">
        <form id="user-notification-form" action="<?= site_url('account/privacy/update') ?>" method="post" data-km="form">
            <?= csrf_field() ?>

            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title m-0">Privacy Setting</h4>
                </div>
                <a href="<?= site_url('privacy_policy') ?>" class="btn btn-outline-primary">Read Privacy Policy</a>
            </div>
            
            <div class="card-body">
                <div class="acc-privacy">
                    <!-- Account Privacy Settings -->
                    <div class="data-privacy">
                        <h4 class="mb-2">Account Privacy <i class="bi bi-shield-shaded"></i></h4>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="acc-private" name="accountPrivacy" value="private" <?= $checked['accountPrivacy'] ?>>
                            <label class="custom-control-label privacy-status mb-2" for="acc-private">Hide Account Info</label>
                        </div>
                        <p>Will <b>Hide</b> <i class="bi bi-eye-slash-fill"></i> your account contact information and social media links on you profile page.</p>
                    </div>
                    <hr>
                    <!-- Account Activity Status -->
                    <div class="data-privacy">
                        <h4 class="mb-2">Activity Status <i class="bi bi-people-fill"></i></h4>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="accountActivityStatus" value="true" id="activity" <?= $checked['accountActivityStatus'] ?>>
                            <label class="custom-control-label privacy-status mb-2" for="activity">Show Activity
                                Status</label>
                        </div>
                        <p>Show others when your <b class="text-success">"online"</b> and writing and share great notes. <i class="bi bi-file-post"></i></p>
                    </div>
                    <hr>
                    <!-- Allow Followers Settngs -->
                    <div class="data-privacy">
                        <h4 class="mb-2"> Follower(s) <i class="bi bi-postage-fill"></i></h4>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="followers" name="allowFollowers" value="true" <?= $checked['allowFollowers'] ?>>
                            <label class="custom-control-label privacy-status mb-2" for="followers">Allow
                                Followers</label>
                        </div>
                        <p>Allow other Users to <b class="text-primary">"Follow"</b> your account an get notifications post &amp; share new notes. <i class="text-primary"><b>Note:</b> To follow other users you must allow others to follow your account. </i></p>
                    </div>
                    <hr>
                    <!-- Profile Visibility Settings -->
                    <div class="data-privacy">
                        <h4 class="mb-2"> Your Profile  <i class="bi bi-file-post"></i></h4>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="public" name="profileVisibility" class="custom-control-input" value="public" <?= $checked['profileVisibility']['public'] ?>>
                            <label class="custom-control-label" for="public"> <b>Public:</b> Visible to Everyone.</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="friend" name="profileVisibility" class="custom-control-input" value="friends" <?= $checked['profileVisibility']['friends'] ?>>
                            <label class="custom-control-label" for="friend"> <b>Followers</b> Only visible to users following you.</label>
                        </div>
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="private" name="profileVisibility" class="custom-control-input" value="private" <?= $checked['profileVisibility']['private'] ?>>
                            <label class="custom-control-label" for="private"> <b>Only Me</b> Visible only to you.</label>
                        </div>
                        <p>Change the visablility of your Profile to where only you, your friends, or anyone can visit your profile.</p>
                    </div>
                    <hr>
                    <div class="data-privacy">
                        <h4 class="mb-2">Privacy Help</h4>
                        <a href="#"><i class="bi bi-chat-dots"></i> Support</a>
                    </div>
                </div>
            </div>

            <footer class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary mr-auto">
                    <i class="bi bi-x-circle"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary mr-2" data-km="submit">
                    <i class="bi bi-floppy" id="new-note-save"></i>
                    Save Settings
                </button>
            </footer>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>