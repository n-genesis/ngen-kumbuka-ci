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
        
        <div class="container-fluid note-details">

            <div class="desktop-header">
                <!-- Top Left Nav -->
                <div class="card card-block topnav-left">
                    <div class="card-body d-flex align-items-center">
                        <div class="d-flex justify-content-between">
                            <h4 class="text-capitalize">Admin Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- Top Right Nav -->
                <?= $this->include('partials/topnav_right') ?>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    Here Add Your HTML Content.....
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Wrapper End-->
 
<!-- Include footer tag -->
<?= $this->include('partials/footer') ?>

<!-- END Main -->
<?= $this->endSection(); ?>

