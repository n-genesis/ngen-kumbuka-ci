<!-- app/Views/partials/iq_top_navbar.php (Mobile View Navbar) -->
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="bi bi-list wrapper-menu" style="margin-right:12px !important;"></i>
                <a href="<?= base_url('home') ?>" class="header-logo">
                    <img src="<?= base_url('assets/images/logo.png') ?>" class="img-fluid rounded-normal light-logo"
                        alt="logo">
                    <h4 class="logo-title ml-3"><?= esc($appName) ?></h4>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-label="Toggle navigation">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <?php if (auth()->loggedIn()): ?>
                        <!-- SEARCH BAR -->
                        <li class="nav-item nav-icon search-content">
                            <a href="#" class="search-toggle rounded" id="h1-dropdownSearch" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-search"></i>
                            </a>
                            <div class="iq-search-bar iq-sub-dropdown dropdown-menu"
                                aria-labelledby="h1-dropdownSearch">
                                <form action="#" class="searchbox p-2">
                                    <?= csrf_field() ?>
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" class="text search-input font-size-12"
                                            placeholder="type here to search...">
                                        <a href="#" class="search-link"
                                            onclick="this.closest('form').submit(); return false;"><i
                                                class="bi bi-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Messages -->
                        <li class="nav-item nav-icon mail-content">
                            <a href="#">
                                <i class="bi bi-envelope"></i>
                            </a>
                        </li>
                        <!-- Notifications -->
                        <li class="nav-item nav-icon mail-content">
                            <a href="<?= site_url('notifications') ?>">
                                <i class="bi bi-bell"></i>
                                <span class="badge badge-pill badge-primary">1</span>
                            </a>
                        </li>
                        <?php endif ?>
                        <!-- User Avatar & Options -->
                        <li class="caption-content">
                            <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between mt-1"
                                id="h-dropdownMenuButton001" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="<?= base_url($userAvatar) ?>" class="img-fluid rounded avatar-50" alt="user">
                            </a>
                            <?php if (auth()->loggedIn()): ?>
                                <?= view('partials/dropdown') ?>
                            <?php endif ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>