<!-- Main Sidebar -->
<aside class="iq-sidebar sidebar-default">
    <!-- Kumbuka LOGO-->
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="<?= $dashboardLink ?>" class="header-logo">
            <img src="<?= base_url('assets/images/logo.png') ?>" class="img-fluid rounded-normal light-logo" alt="logo">
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

        <!-- SEARCH BAR -->
        <div class="iq-search-bar device-search mb-3">
            <form action="#" class="searchbox">
                <a class="search-link" href="#"><i class="bi bi-search"></i></a>
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
                <a class="dropdown-item mb-2" href="<?= site_url('notes') ?>">
                    <span><i class="bi bi-journal-plus"></i> <?= lang('Menus.blankNote') ?></span>
                </a>
                <a class="dropdown-item mb-2" href="<?= site_url(['notes', 'todo']) ?>">
                    <span><i class="bi bi-check2-square"></i> <?= lang('Menus.todoNote') ?></span>
                </a>
                <a class="dropdown-item mb-2" href="<?= site_url(['notes', 'essay']) ?>">
                    <span><i class="bi bi-journal-bookmark"></i> <?= lang('Menus.essayNote') ?></span>
                </a>
                <a class="dropdown-item" href="<?= site_url(['notes', 'daily']) ?>">
                    <span><i class="bi bi-calendar2-heart"></i> <?= lang('Menus.dailyReflct') ?></span>
                </a>
            </div>
        </div>

        <!-- Menu Options -->
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <!-- ADMIN Options -->
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
                            <a href="#user" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                <i class="bi bi-person"></i>
                                <span>User Details</span>
                                <i class="bi bi-chevron-right iq-arrow-right arrow-active"></i>
                                <i class="bi bi-chevron-down iq-arrow-right arrow-hover"></i>
                            </a>
                            <ul id="user" class="iq-submenu collapse" data-parent="#otherpage">
                                <li class="">
                                    <a href="#" class="svg-icon">
                                        <i class="bi bi-person-circle"></i>
                                        <span class="">User Profile</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" class="svg-icon">
                                        <i class="bi bi-person-plus"></i>
                                        <span class="">User Add</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" class="svg-icon">
                                        <i class="bi bi-clipboard2"></i>
                                        <span class="">User List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php endif ?>
                <!-- User Notes/Dashboard -->
                <li class="active">
                    <a href="/" class="svg-icon">
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
                        <li class="">
                            <a href="page-routinenotes.html" class="svg-icon">
                                <i class="bi bi-folder"></i>
                                <span>Routine Notes</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="page-planning.html" class="svg-icon">
                                <i class="bi bi-folder"></i>
                                <span>Planning</span>
                            </a>
                        </li>
                    </ul>
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
        </nav>
        <!-- Sidebar Bottom -->
        <div id="sidebar-bottom" class="position-relative sidebar-bottom">
            <div class="card rounded shadow-none">
                <div class="card-body">
                    <div class="sidebarbottom-content">
                        <div class="image">
                            <img src="<?= base_url('assets/images/layouts/side-bkg.png') ?>" class="img-fluid" alt="side-bkg">
                        </div>
                        <p class="mb-0"><?= lang('Menus.iqSideBarBusAccount') ?></p>
                        <button type="button" class="btn bg-primary mt-3"><?= lang('Menus.iqSideupgradeButton') ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3"></div>
    </div>
</aside>