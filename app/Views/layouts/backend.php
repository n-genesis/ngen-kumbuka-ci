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

            <div class="desktop-header">
                <!-- Top Left Nav -->
                <div class="card card-block topnav-left">
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