<!-- User Avatar and Dropdown -->
<div id="sidebar-dropdown" class="sidebar-caption dropdown">
    <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between" id="dropdownMenuButton"
        data-toggle="<?= (auth()->loggedIn() ? 'dropdown' : '') ?>" aria-haspopup="true" aria-expanded="false">
        <img src="<?= base_url($userAvatar) ?>" class="img-fluid rounded avatar-50 mr-3" alt="user">
        <div class="caption">
            <h6 class="mb-0 line-height"><?= esc($userFullName) ?></h6>
        </div>
        <i class="bi bi-chevron-down"></i>
    </a>
    <!-- SHOW IF USER IS SIGHNED IN -->
    <?php if (auth()->loggedIn()): ?>
    <div class="dropdown-menu w-100 border-0 my-2" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item mb-2" href="<?= site_url(['users/profile','username' => $username]) ?>">
            <i class="bi bi-person-circle font-size-20 mr-1"></i>
            <span class="mt-2"><?= lang('Menus.myProfile') ?></span>
        </a>
        <a class="dropdown-item mb-2" href="<?= site_url('account') ?>">
            <i class="bi bi-file-person font-size-20 mr-1"></i>
            <span><?= lang('Menus.editProfile') ?></span>
        </a>
        <a class="dropdown-item mb-2" href="<?= site_url('account/settings') ?>">
            <i class="bi bi-person-gear font-size-20 mr-1"></i>
            <span><?= lang('Menus.accntSettings') ?></span>
        </a>
        <a class="dropdown-item mb-3" href="<?= site_url('account/privacy') ?>">
            <i class="bi bi-person-lock font-size-20 mr-1"></i>
            <span><?= lang('Menus.prvySettings') ?></span>
        </a>
        <hr class="my-2">
        <a class="dropdown-item" href="<?= site_url('logout') ?>">
            <i class="bi bi-box-arrow-right font-size-20 mr-1"></i>
            <span><?= lang('Menus.logout') ?></span>
        </a>
    </div>
    <?php endif ?>
    
</div>