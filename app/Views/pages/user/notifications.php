<!-- app/Views/pages/user/followers.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<div class="col-lg-12">

    <div class="card">
        <header class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Notifications</h4>
            </div>
        </header>

        <section class="card-body p-0">
            <!-- Notification List -->

            <div class="list-group list-group-flush shadow-sm">

                <!-- Unread Notification -->
                <?php foreach ($notifications as $notification): ?>
                    <a href="#" class="list-group-item list-group-item-action <?= !$notification->is_read ? 'list-group-item-info' : '' ?>">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1 text-primary"><?= ucfirst($notification->source_type) ?> Notification</h5>
                            <small><?= $notification->created_at ?></small>
                        </div>
                        <p class="mb-1"><?= $notification->message ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                        <small>Donec id elit non mi porta.</small>
                            <?php if (!$notification->is_read): ?>
                                <span class="badge badge-primary badge-pill">New</span>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

        </section>

        <!-- Card Footer & Pagination -->
        <div class="card-footer">
            <?= $pager->links() ?>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>