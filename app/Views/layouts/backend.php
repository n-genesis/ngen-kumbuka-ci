<?= $this->extend('layouts/main'); ?>



<!-- Head stylesheets -->
<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/vender/toasty/bootstrap-toasty.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('csrf') ?>
<?= csrf_meta()."\n\n" ?>
<?= $this->endSection() ?>


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
                            <h4><?= $pageHeader ?></h4>
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
                    <?= $this->include('blocks/breadcrumbs', $breadcrumbLinks) ?>
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

<!-- Additional  JS Scripts -->
<?= $this->section('js') ?>

<!-- Bootstrap 4 Toast Plugin -->
<script src="<?= base_url('assets/vender/toasty/bootstrap-toasty.js'); ?>"></script>


<!-- Kumbuka Tour Script -->
<script src="<?= base_url('assets/js/kumbuka-tour.js'); ?>"></script>


<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<!-- SSE Operations -->
<script>
    // Use base_url() to point to the CI4 controller
    const eventSource = new EventSource('<?= base_url("notifications/stream") ?>');

    // Get SSE response/ Skip error checking for now
    eventSource.onmessage = function (event) {
        const data = JSON.parse(event.data);
        const ele = document.getElementById('km-notice-' + data.id);
        if(ele === null){
        const title = data.source_type.charAt(0).toUpperCase() + data.source_type.slice(1) + ' notification';
        $.BToasty({
            title: title,
            customID: 'km-notice-' + data.id,
            body: '<p>' + data.message + '</p>' +
                '<button class="btn btn-outline-primary btn-sm" data-km="dismiss" data-dismiss="toast">Dismiss</button>',
            autoHide: false,

        });
        markAsReadAndNotify(data.id,'<?= base_url("ajax/read") ?>')// Bind Event to dismiss notification and set is_read = 1 
        ///$.BToasty(title, data.message, null, "top_right", false, 5000);
        }

    };

    // Add an event listener for the 'beforeunload' event
    window.addEventListener('beforeunload', function (event) {
        // Close the SSE connection
        if (eventSource) {
            eventSource.close();
        }
    });
</script>
<?= $this->endSection() ?>