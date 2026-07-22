<!-- app/Views/quickpick/dashboard.php -->
<section id="quick-pick-dashboard" class="row">

    <div class="col-md-4 col-12">
        <?= view_cell('FollowerListCell', ['userId' => auth()->id()]) ?>
    </div>
    <div class="col-md-4 col-12">
        <div class="card border border-dark">
            <div class="card-header d-flex justify-content-between">
                <h1 class="lead mb-0">User Followers</h1>
            </div>
            <div class="card-body">
                <div class="p-4 p-md-5 text-center border rounded-3 text-muted">
                    <i class="bi bi-file-code display-1"></i>
                    <p class="mt-3 fs-5">No component loaded.</p>
                    <p class="small mb-0">Integrate dynamic content here.</p>
                </div>
            </div>
        </div>
    </div>
    <aside class="col-md-4 col-12">
        <div class="card border border-dark">
            <div class="card-header">
                <h1 class="lead mb-0">Kumuka News</h1>
            </div>
            <div class="card-body">
                <div class="p-4 p-md-5 text-center border rounded-3 text-muted">
                    <i class="bi bi-file-code display-1"></i>
                    <p class="mt-3 fs-5">No component loaded.</p>
                    <p class="small mb-0">Integrate dynamic content here.</p>
                </div>
            </div>
        </div>
    </aside>

</section>