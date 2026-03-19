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
        <form id="user-notification-form" action="<?= site_url('account/privacy/update') ?>" method="post">
            <?= csrf_field() ?>

            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Privacy Setting</h4>
                </div>
            </div>
            
            <div class="card-body">
                <div class="acc-privacy">
                    <!-- Account Privacy Settings -->
                    <div class="data-privacy">
                        <h4 class="mb-2">Account Privacy</h4>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="acc-private" name="accountPrivacy" value="private" <?= $checked['accountPrivacy'] ?>>
                            <label class="custom-control-label privacy-status mb-2" for="acc-private">Private
                                Account</label>
                        </div>
                        <p>Will <b>Hide</b>&#128737;&#65039;your account, notes, or shared notes. Your Profile will also be hidden. <i><b>Note: Your comments will still be been across the application.</b></i></p>
                    </div>
                    <hr>
                    <!-- Account Activity Status -->
                    <div class="data-privacy">
                        <h4 class="mb-2">Activity Status </h4>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="accountActivityStatus" value="true" id="activety" <?= $checked['accountActivityStatus'] ?>>
                            <label class="custom-control-label privacy-status mb-2" for="activety">Show Activity
                                Status</label>
                        </div>
                        <p>Show others when your <b class="text-success">"online"</b> and writing and share great notes. &#x1F6DC;</p>
                    </div>
                    <hr>
                    <!-- Allow Followers Settngs -->
                    <div class="data-privacy">
                        <h4 class="mb-2"> Follower(s) </h4>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="followers" name="allowFollowers" value="true" <?= $checked['allowFollowers'] ?>>
                            <label class="custom-control-label privacy-status mb-2" for="followers">Allow
                                Followers</label>
                        </div>
                        <p>Allow other User to <b class="text-primary">"Follow"</b> you can know when you share new notes &#128172;. <i><b>Note: You must allow followers to be able to follow other users.</b></i></p>
                    </div>
                    <hr>
                    <!-- Profile Visibility Settings -->
                    <div class="data-privacy">
                        <h4 class="mb-2"> Your Profile</h4>
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
                        <p>Change the visablility of your Profile</p>
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
                    <i class="bi bi-box-arrow-left"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary mr-2">
                    <i class="bi bi-save2" id="new-note-save"></i>
                    Save
                </button>
            </footer>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>