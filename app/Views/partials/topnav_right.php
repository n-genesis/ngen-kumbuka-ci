<!-- Topnav Right -->
 <?php if (auth()->loggedIn()): ?>
<div class="card topnav-right mb-0">
    <div class="card-body card-content-right">
        <ul class="list-inline m-0 p-0 d-flex align-items-center justify-content-around">
            <!-- Messages -->
            <li class="nav-item nav-icon dropdown">
                <a href="#" class="text-dark search-toggle dropdown-toggle nav-icon-1" id="dropdownMenuButton1"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-envelope"></i>
                    <span class="badge badge-success count-mail mail rounded-circle">1</span>
                    <span class="bg-success"></span>
                </a>
                <!-- Dropdown Menu -->
                <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <div class="card shadow-none m-0">
                        <div class="card-body p-0 ">
                            <div class="p-3">
                                <a href="#" class="iq-sub-card">
                                    <div class="media align-items-center cust-card pb-3 border-bottom">
                                        <div class="">
                                            <img class="avatar-50 rounded-small" src="<?= base_url('assets/images/user/i1.jpg') ?>"
                                                alt="01">
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
                            <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- Notifications -->
            <li class="nav-item nav-icon dropdown pl-3">
                <a href="#" class="text-dark search-toggle dropdown-toggle nav-icon-1" id="dropdownMenuButton2"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-bell"></i>
                    <span class="badge badge-danger count-mail rounded-circle d-none" id="notif-badge">0</span>
                    <span class="bg-danger"></span>
                </a>
                <!-- Dropdown Menu -->
                <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <div class="card shadow-none m-0">
                        <div class="card-body p-0 ">
                            <div class="p-3">
                                <a href="#" class="iq-sub-card">
                                    <div class="media align-items-center cust-card pb-3 border-bottom">
                                        <div class="">
                                            <img class="avatar-50 rounded-small" src="<?= base_url('assets/images/user/i1.jpg') ?>"
                                                alt="01">
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
                            <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<?php endif ?>