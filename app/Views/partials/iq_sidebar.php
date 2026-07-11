<!-- Main Sidebar -->
<aside id="iq-sidebar" class="iq-sidebar sidebar-default">
    <!-- Kumbuka LOGO-->
    <div id="kumbuk-logo-n-title" class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="<?= base_url('home') ?>" class="header-logo">
            <img id="sidebar-avatar" src="<?= base_url('assets/images/logo.png') ?>"
                class="img-fluid rounded-normal light-logo" alt="logo">
            <h4 class="logo-title ml-3"><?= esc($appName) ?></h4>
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="bi bi-x-lg wrapper-menu"></i>
        </div>
    </div>

    <!-- User Options -->
    <?= $this->include('partials/sidebar_caption') ?>
    <!-- END User Options -->

    <div class="data-scrollbar" data-scroll="1">

        <!-- SHOW IF USER IS SIGHNED IN -->
        <?php if (auth()->loggedIn()): ?>
            

            <!-- SEARCH BAR -->
            <div class="iq-search-bar device-search mb-3">
                <form class="searchbox" action="<?= base_url('search') ?>" method="post">
                    <?= csrf_field() ?>
                    <a class="search-link" href="#" onclick="this.closest('form').submit(); return false;"><i
                            class="bi bi-search"></i></a>
                    <input type="text" class="text search-input" placeholder="Search">
                </form>
            </div>

            <!-- Add Notes Dropdown -->
            <div class="sidebar-btn dropdown mb-3">
                <a href="#" id="dropdownMenuButton01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="btn btn-primary pr-5 position-relative iq-user-toggle d-flex align-items-center justify-content-between"
                    style="height: 40px;">
                    <span class="btn-title">
                        <i class="bi bi-plus-square"></i> <?= lang('Menus.addNewNote') ?>
                    </span>
                    <span class="note-add-btn" style="height: 40px;">
                        <i class="bi bi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu w-100 border-0 py-3" aria-labelledby="dropdownMenuButton01">
                    <a class="dropdown-item mb-2" href="<?= site_url('note/new?type=general') ?>">
                        <span><i class="bi bi-journal-plus"></i> <?= lang('Menus.blankNote') ?></span>
                    </a>
                    <a class="dropdown-item mb-2" href="<?= site_url('note/new?type=reminder') ?>">
                        <span><i class="bi bi-check2-square"></i> <?= lang('Menus.reminder') ?></span>
                    </a>
                    <a class="dropdown-item mb-2" href="<?= site_url('note/new?type=essay') ?>">
                        <span><i class="bi bi-journal-bookmark"></i> <?= lang('Menus.essayNote') ?></span>
                    </a>
                    <a class="dropdown-item" href="<?= site_url('note/new?type=reflection') ?>">
                        <span><i class="bi bi-calendar2-heart"></i> <?= lang('Menus.dailyReflct') ?></span>
                    </a>
                </div>
            </div>

            <!-- Menu Options -->
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">

                    <!-- ADMINISTRATOR Options -->
                    <?php if (auth()->user()->inGroup('admin')): ?>
                        <li class="">
                            <a href="#otherpage" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                <i class="bi bi-person-vcard"></i>
                                <span><?= lang('Menus.admin') ?></span>
                                <i class="bi bi-chevron-right iq-arrow-right arrow-active"></i>
                                <i class="bi bi-chevron-down iq-arrow-right arrow-hover"></i>
                            </a>
                            <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="">
                                    <a href="<?= site_url('admin/dashboard') ?>" class="svg-icon">
                                        <i class="bi bi-layout-text-window-reverse"></i>
                                        <span class="">Dashboard</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#user" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                        <i class="bi bi-person"></i>
                                        <span>User Details</span>
                                        <i class="bi bi-chevron-right iq-arrow-right arrow-active"></i>
                                        <i class="bi bi-chevron-down iq-arrow-right arrow-hover"></i>
                                    </a>
                                    <ul id="user" class="iq-submenu collapse" data-parent="#otherpage">
                                        <li class="">
                                            <a href="<?= site_url('admin/users') ?>" class="svg-icon">
                                                <i class="bi bi-people-fill"></i>
                                                <span class="">User Management</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?= site_url('admin/users/create') ?>" class="svg-icon">
                                                <i class="bi bi-person-plus"></i>
                                                <span class="">User Add</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="<?= site_url('admin/settings') ?>" class="svg-icon">
                                        <i class="bi bi-gear"></i>
                                        <span class="">Site Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif ?>
                    
                    <!-- Dashboard/Home -->
                     <li>
                        <a href="<?= base_url('home') ?>" class="svg-icon">
                            <i class="bi bi-layout-wtf"></i>
                            <span><?= lang('Menus.HomePage') ?></span>
                        </a>
                        <ul id="index" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        </ul>
                     </li>

                    <!-- Home/Dashboard (QuickPick
                    <li>
                        <a href="#homestop" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                            <i class="bi bi-layout-wtf"></i>
                            <span><?= lang('Menus.HomePage') ?></span>
                            <i class="bi bi-chevron-right iq-arrow-right arrow-active"></i>
                            <i class="bi bi-chevron-down iq-arrow-right arrow-hover"></i>
                        </a>
                        <ul id="homestop" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="">
                                <a href="<?= site_url('gameboard_v1') ?>" class="svg-icon">
                                    <i class="bi bi-layout-text-window-reverse"></i>
                                    <span class="">Gameboard</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    -->
                    <!-- User Notes/Dashboard -->
                    <li>
                        <a href="<?= site_url('note') ?>" class="svg-icon">
                            <i class="bi bi-journal-text"></i>
                            <span><?= lang('Menus.yourNotes') ?></span>
                        </a>
                        <ul id="index" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        </ul>
                    </li>

                    <!-- Notebooks/ User notebooks list -->
                    <li class="">
                        <a href="#notebooks" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                            <i class="bi bi-folder"></i>
                            <span><?= lang('Menus.noteBooks') ?></span>
                            <i class="bi bi-chevron-right iq-arrow-right arrow-active"></i>
                            <i class="bi bi-chevron-down iq-arrow-right arrow-hover"></i>
                        </a>
                        <ul id="notebooks" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="">
                                <a href="page-project-plans.html" class="svg-icon">
                                    <i class="bi bi-folder"></i>
                                    <span>Project Plans</span>
                                </a>
                            </li>
                            <!-- Reminder -->
                            <li class="">
                                <a href="#" class="svg-icon">
                                    <i class="bi bi-clock"></i>
                                    <span><?= lang('Menus.reminder') ?></span>
                                </a>
                            </li>
                            <!--Trash Bin -->
                            <li class="">
                                <a href="#" class="svg-icon">
                                    <i class="bi bi-trash3"></i>
                                    <span><?= lang('Menus.trash') ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#feed" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                            <i class="bi bi-broadcast"></i>
                            <span><?= lang('Menus.followActivity') ?></span>
                            <i class="bi bi-chevron-right iq-arrow-right arrow-active"></i>
                            <i class="bi bi-chevron-down iq-arrow-right arrow-hover"></i>
                        </a>
                        <ul id="feed" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <!-- Activity -->
                            <li class="">
                                <a href="<?= base_url('account/activity') ?>" class="svg-icon">
                                    <i class="bi bi-graph-up"></i>
                                    <span><?= lang('Menus.userActivity') ?></span>
                                </a>
                            </li>
                            <!-- Feed -->
                            <li class="">
                                <a href="<?= base_url('account/feed') ?>" class="svg-icon">
                                    <i class="bi bi-rss"></i>
                                    <span><?= lang('Menus.userFeed') ?></span>
                                </a>
                            </li>
                            <!-- Followers -->
                            <li class="">
                                <a href="<?= base_url('account/followers') ?>" class="svg-icon">
                                    <i class="bi bi-share-fill"></i>
                                    <span><?= lang('Menus.userFollowers') ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
        
            <!-- Show Admin Badge if User is in Admin Group -->
            <?php if(auth()->user()->inGroup('admin')): ?>
                <div class="m-2 px-3 d-flex align-items-center justify-content-between">
                    <button type="button" class="btn btn-block btn-outline-success">
                        Administrator <span class="badge badge-danger"><i class="bi bi-key-fill m-0"></i></span>
                    </button>
                </div>
            <?php endif; ?>

        <?php endif ?>

        <!-- Sidebar Bottom -->
        <div id="sidebar-bottom" class="position-relative sidebar-bottom">
            <div class="card rounded shadow-none">
                <div class="card-body">
                    <div class="sidebarbottom-content">
                        <!-- Registration Link -->
                        <?php if (auth()->loggedIn() && !auth()->user()->inGroup('admin')): ?>
                            <div id="request-form">
                            <div class="image">
                                <img src="<?= base_url('assets/images/kuma-moderator.webp') ?>" class="img-fluid"
                                    alt="Sign up and start sharing notes.">
                            </div>
                            
                            <p class="mb-0"><?= lang('Menus.iqSideBarBusAccount') ?></p>
                            <a href="#" class="btn bg-primary mt-3"><?= lang('Menus.iqSideupgradeButton') ?></a>
                            </div>
                        <?php elseif (setting('Auth.allowRegistration') && !auth()->user()->inGroup('admin')): ?>
                            <div class="image">
                                <img src="<?= base_url('assets/images/layouts/kuma-login.png') ?>" class="img-fluid"
                                    alt="Want to get an upgrade?">
                            </div>
                            <a href="<?= url_to('register') ?>" class="btn bg-primary mt-3 mb-1">
                                <?= lang('Auth.needAccountLinkText') ?>
                            </a>
                            <p class="mb-0"><?= lang('Auth.needAccountText') ?></p>
                        <?php else: ?>
                            <div class="image">
                                <img src="<?= base_url('assets/images/layouts/kuma-sos-help.png') ?>" class="img-fluid"
                                    alt="Oh no, SOS Help!">
                            </div>
                            <p class="mb-1 mt-3"><?= lang('Landing.cardThreeBody') ?></p>
                            <a href="<?= site_url('support') ?>" class="btn bg-primary mt-3"><?= lang('Landing.cardThreeLink') ?></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3"></div>
    </div>
</aside>