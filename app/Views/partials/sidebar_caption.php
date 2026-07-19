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
    <?= view('partials/dropdown') ?>
    <?php endif ?>
    
</div>