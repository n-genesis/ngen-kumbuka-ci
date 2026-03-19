<!-- app/Views/quickpick/dashboard.php -->
<section class="row">

    <div class="col-md-4 col-12">
        <?= view_cell('FollowerListCell', ['userId' => auth()->id()]) ?>
    </div>
    <div class="col-md-6 col-12">
        <div class="card border border-dark">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">User Followers</h4>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
    <aside class="col-md-2 col-12">
        <div class="card border border-dark">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <p class="card-text">Card body with text and what not.</p>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </aside>

</section>