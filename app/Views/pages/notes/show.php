<!-- app/Views/pages/notes/show.php -->
<?= $this->extend('layouts/backend'); ?>


<?= $this->section('backend'); ?>

<h1>Show Note <?= $noteid ?></h1>


<div class="card border-0 mx-auto">
  
  <!-- Header: User Info -->
  <div class="card-header bg-white border-0 p-0 d-flex justify-content-between align-items-center mb-2">
    <div class="d-flex align-items-center">
      <img src="https://placeholder.com" class="rounded-circle mr-2" alt="Avatar">
      <div>
        <p class="mb-0 text-dark font-weight-bold small"></p>
        <p class="mb-0 text-muted" style="font-size: 0.75rem;">12 minutes ago</p>
      </div>
    </div>
    <button class="btn btn-sm text-muted p-0" type="button">
      <i class="fas fa-ellipsis-h"></i>
    </button>
  </div>

  <!-- Note Body Text -->
  <div class="card-body p-0 mb-3">
    <p class="card-text text-dark small">
      Caught a beautiful sunrise during the morning run. Simple moments like this make waking up early completely worth it.
    </p>
  </div>

  <!-- Note Single Static Image -->
  <img src="https://placeholder.com" class="img-fluid rounded mb-3" alt="Post feature image">

  <!-- Post Actions Bar -->
  <div class="d-flex align-items-center justify-content-between text-muted pb-2 mb-2 border-bottom" style="font-size: 0.85rem;">
    <div class="d-flex">
      <span class="mr-3"><i class="far fa-heart mr-1"></i> 14</span>
      <span><i class="far fa-comment mr-1"></i> 1</span>
    </div>
    <span><i class="far fa-bookmark"></i></span>
  </div>

  <!-- Comment Thread & Input Section -->
  <div class="p-0">
    
    <!-- Single Comment Row -->
    <div class="d-flex align-items-start mb-2" style="font-size: 0.85rem;">
      <span class="font-weight-bold text-dark mr-2">Jordan_K</span>
      <span class="text-secondary">Stunning view! What time did you head out?</span>
    </div>

    <!-- Inline Comment Input Form -->
    <form class="d-flex align-items-center pt-2">
      <input type="text" class="form-control form-control-sm border-0 p-0" placeholder="Add a comment..." aria-label="Comment Box">
      <button class="btn btn-sm btn-link text-primary font-weight-bold p-0 ml-2" type="submit" style="font-size: 0.85rem;">
        Post
      </button>
    </form>
    
  </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>