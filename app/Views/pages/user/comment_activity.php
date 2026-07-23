<!-- app/Views/pages/user/comment_activity.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>
<div class="col-lg-12">

  <div class="row d-flex">

    <!-- Left Column: User Comments Group List (4 out of 12 columns) -->
    <aside class="col-md-4 mb-md-0 mb-sm-4" style="">

      <div class="card border rounded-0">
        <!-- Comment Card Header -->
        <div class="card-header border-bottom-0 pt-3 pb-2">
          <h4 class="mb-0">All Comments (<?= $commentCount ?>)</h4>
        </div>

        <!-- Scrollable Group List Container -->
        <div class="list-group list-group-flush" style="max-height:100vh; overflow-y: auto;">

          <!-- Comment item 1 -->
          <?php foreach ($comments as $comment): ?>
            <div class="list-group-item border-bottom rounded-0 list-group-item-" role="button">
              <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1"><?= $comment->author_username ?></h5>
                <small><?= $comment->created_at ?></small>
                <button class="btn btn-sm btn-danger" type="button">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
              <p class="mb-1 text-ellipsis short-4"><?= $comment->body ?></p>
              <small><?= "$comment->author_first_name $comment->author_last_name" ?></small>
            </div>
          <?php endforeach ?>

        </div>
      </div>
    </aside>

    <!-- Right Column: Note Post (8 out of 12 columns) -->
    <section id="note-post" class="col-md-8">

      <div class="card border rounded-0">

        <!-- Card Header -->
        <header
          class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center border-bottom pb-2 mb-2">
          <h4 class="mb-0">I can Fell It! Note Title Here And What Note</h4>
          <div class="d-flex align-items-center">
            <button class="btn btn-outline-primary mr-2" type="button">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
            <button class="btn btn-danger" type="button">
              <i class="bi bi-trash"></i> Delete
            </button>
          </div>
        </header>

        <!-- Note Body Text -->
        <div class="card-body p-4 mb-2">
          <!-- Note Single Static Image -->
          <img src="https://placehold.co/1200x800" class="img-fluid rounded mb-2" alt="Post feature image">
<p class="card-text text-dark">
Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
</p>
<h3>Another Title</h3>
<p class="card-text text-dark">
Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
</p>
<h3>Getting Deep</h3>
<p class="card-text text-dark">
Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>

          <p class="card-text text-dark">
            Caught a beautiful sunrise during the morning run. Simple moments like this make waking up early completely
            worth it.
          </p>
          <!-- Note Single Static Image -->
          <img src="https://placehold.co/1200x800" class="img-fluid rounded mb-2" alt="Post feature image">
        </div>

      </div>

    </section>
  </div>
</div>

<?= $this->endSection(); ?>