<!-- app/Views/partials/iq_top_navbar.php (Mobile View Navbar) -->
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="bi bi-list wrapper-menu"></i>
                <a href="<?= base_url('home') ?>" class="header-logo">
                    <img src="<?= base_url('assets/images/logo.png') ?>" class="img-fluid rounded-normal light-logo" alt="logo">
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
                                        <a href="#" class="search-link" onclick="this.closest('form').submit(); return false;"><i class="bi bi-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Messages -->
                         <li class="nav-item nav-icon dropdown mail-content">
                            <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="h1-dropdownMenuButton004"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-envelope"></i>
                                <span class="badge badge-success count-mail rounded-circle">1</span>
                                <span class="bg-success"></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="h1-dropdownMenuButton004">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="px-3 pt-0 pb-0">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="<?= base_url('assets/images/user/i1.jpg') ?>" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">That Guy</h5>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="btn btn-block btn-primary position-relative text-center" href="#"
                                            role="button">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Notifications -->
                        <li class="nav-item nav-icon dropdown mail-content">
                            <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="h1-dropdownMenuButton2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-bell"></i>
                                <span class="badge badge-danger count-mail mail rounded-circle">1</span>
                                <span class="bg-danger"></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="h1-dropdownMenuButton2">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="px-3 pt-0 pb-0">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="<?= base_url('assets/images/user/i1.jpg') ?>" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">That Girl</h5>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="btn btn-block btn-primary position-relative text-center" href="#"
                                            role="button">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- User Avatar & Options -->
                        <li class="caption-content">
                            <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between mt-1"
                                id="h-dropdownMenuButton001" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="<?= base_url($userAvatar) ?>" class="img-fluid rounded avatar-50" alt="user">
                            </a>
                            <?php if (auth()->loggedIn()): ?>
                            <div class="dropdown-menu dropdown-menu-right w-100 border-0 py-2" aria-labelledby="h-dropdownMenuButton001">
                                <a class="dropdown-item mb-2" href="<?= site_url(['user/profile','username' => $username]) ?>">
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
                            <?php endif ?>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>