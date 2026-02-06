<!-- app/Views/pages/account/settings.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<!-- Username & Email -->
<div class="col-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between">

            <div class="header-title">
                <h4 class="card-title">User Credentials</h4>
            </div>
        </div>

        <div class="card-body">
            <div class="acc-edit">
                <!-- Username & Email FORM-->
                <form>
                    <div class="form-group">
                        <label for="uname">Username:</label>
                        <input type="text" class="form-control" id="uname" value="<?= old('username',$user->username) ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?= old('email', $user->email) ?>">
                    </div>
                </form>
            </div>
        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>

<!-- User Password -->
<div class="col-6">
    <div class="card">

        <div class="card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Password</h4>
            </div>
        </div>

        <div class="card-body">
            <!-- CHange Password FORM-->
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

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary mr-2">Save</button>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>