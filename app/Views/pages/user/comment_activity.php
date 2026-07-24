<!-- app/Views/pages/user/comment_activity.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>
<div class="col-12 mb-3">

  <!-- Header Block stacked on mobile, row on desktop -->
  <header class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <h4 class="d mb-1">Comment Moderation</h4>
    <p class="text-muted mb-0">Review, filter, and manage interactions across your note posts.</p>
  </header>

  <div class="row">

    <!-- Left Column: Navigation Sidebar Filters (3 out of 12 columns) -->
    <div class="col-md-3 mb-4">
      <div class="card border border-dark rounded-0">
        <div class="list-group list-group-flush" id="commentTabs" role="tablist">

          <!-- Filter Option 1: Comments Received -->
          <a class="list-group-item list-group-item-action d-flex align-items-center rounded-0" id="received-tab"
            data-toggle="tab" href="#received-comments" role="tab">
            <i class="bi bi-chat-square-text"></i>
            <div class="flex-grow-1">
              <p class="mb-0">On My Notes</p>
              <p class="mb-0">Comments by others</p>
            </div>
            <span class="badge badge-pill badge-primary">2</span>
          </a>

          <!-- Filter Option 2: Comments Sent -->
          <a class="list-group-item list-group-item-action d-flex align-items-center" id="sent-tab" data-toggle="tab"
            href="#sent-comments" role="tab">
            <i class="bi bi-send mr-3 text-muted"></i>
            <div class="flex-grow-1">
              <p class="mb-0">My Activity</p>
              <p class="text-muted mb-0">Posted by you</p>
            </div>
          </a>

        </div>
      </div>
    </div>

    <!-- Right Column: Contextual Dynamic List Views (9 out of 12 columns) -->
    <div class="col-md-9">
      <div class="tab-content" id="commentTabsContent">

        <!-- PANEL A: Comments received on user's own note posts -->
        <div class="tab-pane fade show active" id="received-comments" role="tabpanel">
          <div class="card border border-dark rounded-0">
            <div class="card-header py-3 border-bottom-0 d-flex justify-content-between">
              <h4 class="mb-0">Comments Received</h4>
              <h4><span id="comment-count"><?= $commentCount ?></span></h4>
            </div>

            <div class="list-group list-group-flush">

              <!-- Comment item 1 -->
              <?php foreach ($comments as $comment): ?>
                <div class="list-group-item list-comment d-flex justify-content-between align-items-start p-4">
                <div class="flex-grow-1 mr-3 text-truncate">
                  <div class="d-flex align-items-center mb-2">
                    <img src="<?= base_url($comment->author_avatar) ?>" class="rounded-circle avatar-80 mr-2" alt="User Avatar">
                    <span class="text-dark mr-2"><?= $comment->author_username ?></span>
                    <span class="text-muted mr-2"><?= $comment->created_at ?></span>
                    <span class="text-muted mr-2">&bull;</span>
                    <span class="text-primary text-truncate">On Note: <?= $comment->note_title ?></span>
                  </div>
                  <p class="mb-0 text-secondary text-truncate"><?= $comment->body ?></p>
                </div>

                <!-- Isolated Action Wrapper -->
                <div class="ml-2">
                  <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-url="<?= base_url("account/activity/comment/delete/$comment->id") ?>"
                    data-target="#deleteConfirmModal" data-comment-id="<?= $comment->id ?>" title="Delete comment">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </div>
              <?php endforeach ?>
                
            </div>
          </div>
        </div>

        <!-- PANEL B: Personally posted comments (History) -->
        <div class="tab-pane fade" id="sent-comments" role="tabpanel">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom-0">
              <h6 class="mb-0">Your Comments History</h6>
            </div>
            <div class="list-group list-group-flush">

              <!-- Comment Row 3 -->
              <div class="list-group-item d-flex justify-content-between align-items-start p-4">
                <div class="flex-grow-1 mr-3 text-truncate">
                  <div class="d-flex align-items-center mb-1">
                    <span class="font-weight-bold text-dark small mr-2">You</span>
                    <small class="text-muted">1 day ago</small>
                    <span class="mx-2 text-muted small">&bull;</span>
                    <small class="text-muted text-truncate">On Marcus's Note</small>
                  </div>
                  <p class="mb-0 text-secondary small text-truncate">Incredible breakdown! Thanks for writing out
                    these instructions so clearly.</p>
                </div>
                <div class="ml-2">
                  <button type="button" class="btn btn-outline-danger btn-sm rounded-circle" data-toggle="modal"
                    data-target="#deleteConfirmModal" data-comment-id="3" title="Delete comment">
                    <i class="bi bi-trash-alt"></i>
                  </button>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <!-- Reusable Bootstrap Dismissal Modal -->
  <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content border-0 shadow">
        <div class="modal-body text-center p-4">
          <i class="fas fa-exclamation-circle text-danger display-4 mb-3"></i>
          <h5 class="font-weight-bold mb-2">Delete Comment?</h5>
          <p class="text-muted small mb-4">This action cannot be undone. The comment will be permanently removed.</p>
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-light rounded-pill px-4 mr-2" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger rounded-pill px-4" id="confirmDeleteBtn">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    
  let selectedBtn, deleteUrl = null;

    $('#deleteConfirmModal').on('show.bs.modal', function (event) {
      selectedBtn = event.relatedTarget;
      deleteUrl = selectedBtn.dataset.url;
    });

    $('#confirmDeleteBtn').on('click', async (event) => {
        const csrfToken = document.getElementById('csrf-meta').getAttribute('content');
    
        selectedBtn.disabled = true; // Block double-clicks instantly

        try {
          // Simple Fetch Configuration using standard DELETE verb headers
          const response = await fetch(deleteUrl, {
            method: 'DELETE',
            headers: {
              'X-Requested-With': 'XMLHttpRequest', // Tells CI4 this is an AJAX call
              'X-CSRF-TOKEN': csrfToken           // Passes CSRF verification checks seamlessly
            }
          });

          // Read the JSON response from CodeIgniter
          const result = await response.json();

          // Always update the secure meta-token with the fresh hash sent by the server
          if (result.token) {
            document.getElementById('csrf-meta').setAttribute('content', result.token);
          }

          if (response.ok && result.status === 'success') {
            let cc = document.getElementById('comment-count');
            cc.innerHTML = (cc.innerText - 1);
            // Simple UI update: Remove the comment block container seamlessly
            let comEle = selectedBtn.closest('.list-comment');
            comEle.style.backgroundColor = '#ffe8e8';
            setTimeout(() => {
              comEle.remove();
            }, 1000)
          } else {
            alert(result.message || 'Server rejected deletion request.');
            selectedBtn.disabled = false;
          }

        } catch (error) {
          console.error('Fetch execution crash:', error);
          alert('Network communication error. Deletion cancelled.');
          selectedBtn.disabled = false;
        }

      // Hide the active confirmation modal programmatically
      $('#deleteConfirmModal').modal('hide');
    });

  });

</script>

<?= $this->endSection(); ?>