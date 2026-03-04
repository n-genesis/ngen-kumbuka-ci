<!-- app/Views/pages/user/activity.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Recent Activity</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <!-- User Activity List -->
                <div class="list-group">
                    <?php foreach ($activities as $log): ?>
                        <div href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <p class="lead mb-1">Activity Type <abbr title="Action status this activity was recorded as."><?= esc($log->category) ?></abbr> 
                                <i class="bi <?= $log->severity === 'critical' ? 'text-danger bi-exclamation-triangle' : 'text-primary bi-info-circle' ?>">
                                    </i></p>
                                <small><?= \CodeIgniter\I18n\Time::parse($log->created_at)->humanize() ?></small>
                            </div>
                            <p class="bg-<?php echo ($log->severity === 'critical' ? 'danger' : ($log->severity === 'notice' ? 'secondary' : $log->severity)) ?>-light pl-3 pr-3 pt-2 pb-2 rounded mb-1">
                                <?= esc($log->description) ?>
                            </p>
                            <small><?= esc($log->ip_address) ?> • <?= esc($log->user_agent) ?></small>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Card Footer & Pagination -->
        <div class="card-footer">
            <?= $pager->links() ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>