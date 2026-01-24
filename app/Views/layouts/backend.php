<?= $this->extend('layouts/main'); ?>

<?= $this->section('main'); ?>

<!-- Wrapper Start -->
<div class="wrapper">

    <!-- Navbar Mobile-->
    <?= $this->include('partials/iq_top_navbar') ?>
    <!-- END Navbar -->

    <!-- Main Sidebar -->
    <?= $this->include('partials/iq_sidebar') ?>
    <!-- END Main Sidebar-->

    <div class="content-page">

        <div class="container-fluid">

            <div class="desktop-header mb-3">
                <!-- Top Left Nav -->
                <div class="card card-block topnav-left mb-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="d-flex justify-content-between">
                            <h4 class="text-capitalize"><?= esc($pageHeader) ?></h4>
                        </div>
                    </div>
                </div>
                <!-- Top Right Nav -->
                <?= $this->include('partials/topnav_right') ?>
            </div>

        </div>

        <!-- Main Section -->
        <main class="container-fluid">

            <div id="backend-content" class="row">

            <!-- Breadcrumbs -->
                <div class="col-12 mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-primary mb-0">
                            <li class="breadcrumb-item"><a href="#" class="text-white">
                                <i class="bi bi-house-door-fill"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-white">Library</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>

                <!-- Alerts -->
                <div class="col-lg-12">
                    <?= $this->include('blocks/alerts') ?>
                </div>

                <!--Render Section backend -->
                <?= $this->renderSection('backend'); ?>
            </div>

        </main>
        <!-- Main end  -->

    </div>
</div>
<!-- Wrapper End-->

<!-- Include footer tag -->
<?= $this->include('partials/footer') ?>

<!-- END Main -->
<?= $this->endSection(); ?>