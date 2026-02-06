<!-- app/Views/pages/account/privacy.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<!-- User Privacy Settings -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Privacy Setting</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="acc-privacy">
                <div class="data-privacy">
                    <h4 class="mb-2">Account Privacy</h4>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="acc-private">
                        <label class="custom-control-label privacy-status mb-2" for="acc-private">Private
                            Account</label>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <hr>
                <div class="data-privacy">
                    <h4 class="mb-2">Activity Status</h4>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="activety" checked="">
                        <label class="custom-control-label privacy-status mb-2" for="activety">Show Activity
                            Status</label>
                    </div>
                    <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout.</p>
                </div>
                <hr>
                <div class="data-privacy">
                    <h4 class="mb-2"> Follower(s) </h4>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="story" checked="">
                        <label class="custom-control-label privacy-status mb-2" for="story">Allow
                            Followers</label>
                    </div>
                    <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout.</p>
                </div>
                <hr>
                <div class="data-privacy">
                    <h4 class="mb-2"> Your Profile </h4>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="public" name="customRadio1" class="custom-control-input" checked="">
                        <label class="custom-control-label" for="public"> Public </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="friend" name="customRadio1" class="custom-control-input">
                        <label class="custom-control-label" for="friend"> Friend </label>
                    </div>
                    <div class="custom-control custom-radio mb-2">
                        <input type="radio" id="onlyme" name="customRadio1" class="custom-control-input">
                        <label class="custom-control-label" for="onlyme"> Only Me </label>
                    </div>
                    <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout.</p>
                </div>
                <hr>
                <div class="data-privacy">
                    <h4 class="mb-2"> Login Notification </h4>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="enable" name="customRadio2" class="custom-control-input">
                        <label class="custom-control-label" for="enable"> Enable </label>
                    </div>
                    <div class="custom-control custom-radio mb-2">
                        <input type="radio" id="disable" name="customRadio2" class="custom-control-input" checked="">
                        <label class="custom-control-label" for="disable"> Disable </label>
                    </div>
                    <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout.</p>
                </div>
                <hr>
                <div class="data-privacy">
                    <h4 class="mb-2">Privacy Help</h4>
                    <a href="#"><i class="bi bi-chat-dots"></i> Support</a>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex align-items-center text-right justify-content-end">
            <button type="submit" class="btn btn-primary mr-2">Save</button>
            <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-box-arrow-left"></i> Cancel
            </a>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>