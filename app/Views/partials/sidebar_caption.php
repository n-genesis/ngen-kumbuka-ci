<div class="sidebar-caption dropdown">
    <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between" id="dropdownMenuButton"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?= base_url('assets/images/user/1.jpg') ?>" class="img-fluid rounded avatar-50 mr-3" alt="user">
        <div class="caption">
            <h6 class="mb-0 line-height">Andrew Nite</h6>
        </div>
        <i class="bi bi-chevron-down"></i>
    </a>
    <div class="dropdown-menu w-100 border-0 my-2" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item mb-2" href="../app/user-profile.html">
            <i class="bi bi-person-circle font-size-20 mr-1"></i>
            <span class="mt-2">My Profile</span>
        </a>
        <a class="dropdown-item mb-2" href="../app/user-profile-edit.html">
            <i class="bi bi-file-person font-size-20 mr-1"></i>
            <span>Edit Profile</span>
        </a>
        <a class="dropdown-item mb-2" href="../app/user-account-setting.html">
            <i class="bi bi-person-gear font-size-20 mr-1"></i>
            <span>Account Settings</span>
        </a>
        <a class="dropdown-item mb-3" href="../app/user-privacy-setting.html">
            <i class="bi bi-person-lock font-size-20 mr-1"></i>
            <span>Privacy Settings</span>
        </a>
        <hr class="my-2">
        <a class="dropdown-item" href="<?= site_url('logout') ?>">
            <i class="bi bi-box-arrow-right font-size-20 mr-1"></i>
            <span>Logout</span>
        </a>
    </div>
</div>