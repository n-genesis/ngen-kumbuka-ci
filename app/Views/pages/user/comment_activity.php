<!-- app/Views/pages/user/comment_activity.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>
<div class="col-lg-12">
    
    <div class="row">
      
      <!-- Left Column: User Comments Group List (4 out of 12 columns) -->
      <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-white border-bottom-0 pt-3 pb-2">
            <h6 class="font-weight-bold text-dark mb-0">All Comments (3)</h6>
          </div>
          
          <!-- Scrollable Group List Container -->
          <div class="list-group list-group-flush" style="max-height: 480px; overflow-y: auto;">
            
            <!-- Comment item 1 -->
            <div class="list-group-item bg-transparent border-bottom px-3 py-3">
              <div class="d-flex w-100 justify-content-between mb-1">
                <span class="font-weight-bold small text-dark">Jordan_K</span>
                <small class="text-muted">5m ago</small>
              </div>
              <p class="mb-0 text-secondary small">Stunning view! What time did you head out?</p>
            </div>

            <!-- Comment item 2 -->
            <div class="list-group-item bg-transparent border-bottom px-3 py-3">
              <div class="d-flex w-100 justify-content-between mb-1">
                <span class="font-weight-bold small text-dark">Sarah_M</span>
                <small class="text-muted">1h ago</small>
              </div>
              <p class="mb-0 text-secondary small">The colors in this shot are incredible. Miss running along this route!</p>
            </div>

            <!-- Comment item 3 -->
            <div class="list-group-item bg-transparent border-0 px-3 py-3">
              <div class="d-flex w-100 justify-content-between mb-1">
                <span class="font-weight-bold small text-dark">Devon_R</span>
                <small class="text-muted">2h ago</small>
              </div>
              <p class="mb-0 text-secondary small">Is this shot on a phone or a mirrorless camera?</p>
            </div>

          </div>
        </div>
      </div>

      <!-- Right Column: Note Post (8 out of 12 columns) -->
      <div class="col-md-8">
        <div class="card border-0 shadow-sm p-4">
          
          <!-- Header: User Info -->
          <div class="card-header bg-white border-0 p-0 d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
              <img src="https://placehold.co/200" class="avatar-80 rounded-circle mr-3" alt="Avatar">
              <div>
                <p class="mb-0 text-dark font-weight-bold">Alex Rivera</p>
                <p class="mb-0 text-muted small">12 minutes ago</p>
              </div>
            </div>
            <button class="btn btn-sm text-muted p-0" type="button">
              <i class="fas fa-ellipsis-h"></i>
            </button>
          </div>

          <!-- Note Body Text -->
          <div class="card-body p-0 mb-3">
            <p class="card-text text-dark">
              Caught a beautiful sunrise during the morning run. Simple moments like this make waking up early completely worth it.
            </p>
          </div>

          <!-- Note Single Static Image -->
          <img src="https://placehold.co/200x100" class="img-fluid rounded mb-3" alt="Post feature image">

          <!-- Post Actions Bar -->
          <div class="d-flex align-items-center justify-content-between text-muted pb-3 mb-3 border-bottom" style="font-size: 0.9rem;">
            <div class="d-flex">
              <span class="mr-3"><i class="far fa-heart mr-1"></i> 14 Likes</span>
              <span><i class="far fa-comment mr-1"></i> 3 Comments</span>
            </div>
            <span><i class="far fa-bookmark"></i></span>
          </div>

          <!-- Inline Comment Input Form -->
          <form class="d-flex align-items-center">
            <input type="text" class="form-control border-0 bg-light p-3" placeholder="Add a comment..." aria-label="Comment Box" style="border-radius: 20px;">
            <button class="btn btn-link text-primary font-weight-bold p-0 ml-3" type="submit">
              Post
            </button>
          </form>
          
        </div>
      </div>

    </div>

</div>

<?= $this->endSection(); ?>