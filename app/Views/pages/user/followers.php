<!-- app/Views/pages/user/followers.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<div class="col-lg-12">

    <div class="card">
        <header class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Followers (Kool Kidz)</h4>
            </div>
        </header>

        <section class="card-body">

            <ul class="list-group">

                <li class="list-group-item d-flex align-items-center">
                    <!-- Profile Image -->
                    <img src="<?= base_url('uploads/user-icon.png') ?>" class="avatar-70 rounded-small mr-3"
                        alt="User Image">
                    <!-- Information Column -->
                    <div class="d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 font-weight-bold">@username</h6>
                            <button class="btn btn-outline-primary">Follow</button>
                        </div>
                        <small class="text-muted">user.name@localhost.com</small>
                        <p class="mb-0 text-secondary">
                            Passionate developer and coffee enthusiast. Building cool things with Bootstrap!
                        </p>
                    </div>
                </li>

            </ul>

        </section>

        <!-- Card Footer & Pagination -->
        <footer class="card-footer">

        </footer>
    </div>

</div>
<?= $this->endSection(); ?>