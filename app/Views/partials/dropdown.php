<div class="dropdown-menu dropdown-menu-right w-100 border-0 py-2" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item mb-2" href="<?= site_url(['users/profile', 'username' => $username]) ?>">
        <i class="bi bi-person-circle font-size-20 mr-1"></i>
        <span class="mt-2">
            <?= lang('Menus.myProfile') ?>
        </span>
    </a>
    <a class="dropdown-item mb-2" href="<?= site_url('account') ?>">
        <i class="bi bi-file-person font-size-20 mr-1"></i>
        <span>
            <?= lang('Menus.editProfile') ?>
        </span>
    </a>
    <a class="dropdown-item mb-2" href="<?= site_url('account/settings') ?>">
        <i class="bi bi-person-gear font-size-20 mr-1"></i>
        <span>
            <?= lang('Menus.accntSettings') ?>
        </span>
    </a>
    <a class="dropdown-item mb-3" href="<?= site_url('account/privacy') ?>">
        <i class="bi bi-person-lock font-size-20 mr-1"></i>
        <span>
            <?= lang('Menus.prvySettings') ?>
        </span>
    </a>
    <hr class="my-2">
    <a class="dropdown-item" href="<?= site_url('logout') ?>">
        <i class="bi bi-box-arrow-right font-size-20 mr-1"></i>
        <span>
            <?= lang('Menus.logout') ?>
        </span>
    </a>
</div>