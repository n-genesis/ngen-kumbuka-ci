<!-- Follower List Cell -->
<div class="card border border-info">
    <div class="card-header d-flex justify-content-between">
        <h1 class="lead mb-0">Following Users</h1>
    </div>
    <div class="card-body">
        <p class="card-text text-muted">This will be a list of Followers the User currently has. the overflow is set to
            scroll. Right now
            it's going to be a simple list with the User's avatar piture and name with a link to their profile.</p>
        <div class="list-group">
            <?php if (!empty($followers)): ?>
                <?php foreach ($followers as $follower): ?>
                    <a href="<?= site_url('users/profile/' . $follower->username) ?>"
                        class="list-group-item list-group-item-action d-flex align-items-center">
                        <img class="avatar-40 rounded mr-3" src="<?= $follower->avatar ? base_url($follower->avatar) : '' ?>" class="rounded-circle mr-3"
                            style="width:40px; height:40px;" alt="Avatar">
                        <div class="flex-column">
                            <span class="font-weight-bold">@<?= esc($follower->username) ?></span>
                            <p class="small text-muted mb-0">Follower since <?= $follower->created_at ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert bg-white alert-info" role="alert">
            <div class="iq-alert-text">Once a User accepts your Follower request they will appear here</div>
        </div>
            <?php endif; ?>
        </div>
        <p class="mb-1 mt-2">To see a list of Following Users, checkout the "Following" page.</p>
        <a href="<?= base_url('account/followers') ?>" class="btn-block btn btn-info">View All Following</a>
    </div>
</div>