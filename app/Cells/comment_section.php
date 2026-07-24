<!-- Comment Form -->
<div class="mb-4 pb-2 border-bottom">
    <form id="comment-form" class="input-group" method="post" action="<?= site_url('comments/store') ?>">
        <?= csrf_field() ?>
        <input type="hidden" name="entity_id" value="<?= $note_id ?>">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i
                        class="bi bi-chat-square-dots d-flex align-items-center"
                        style="margin-right:6px !important;"></i> (<span id="comment-count"><?= $numComments ?></span>)</span>
            </div>

            <input id="comment-input" type="text" class="form-control" name="body" placeholder="Write a comment..."
                aria-label="Comment text">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">
                    Post Comment
                </button>
            </div>
        </div>
    </form>
</div>
<!-- Comment List -->
<div id="comment-list" class="comments-list" style="overflow-y: auto;">
    <?php if ($comments): ?>
        <?php foreach ($comments as $comment): ?>
            <!-- Single Comment -->
            <div class="d-flex align-items-center pb-2">
                <!-- User Avatar Image -->
                <a href="<?= base_url("users/profile/$comment->author_username") ?>">
                    <img src="<?= base_url($comment->author_avatar) ?>" class="rounded-circle avatar-50 mr-2" alt="User">
                </a>
                <!-- User Comment -->
                <div class="comment-content">
                    <span class="font-weight-bold mr-2 text-dark"><?= "$comment->author_first_name $comment->author_last_name" ?>:</span>
                    <span class="text-secondary"><?= esc($comment->body) ?></span>
                </div>
            </div>
        <?php endforeach ?>
    <?php else: ?>
        <div id="no-comments" class="text-center">
            <h4>There are not comments yet</h4>
            <p>I have an idea. You can be the first to leave one.</p>
        </div>
    <?php endif ?>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('comment-form');
        if (!form) return;

        async function fetchComments() {
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = true;

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                const result = await response.json();

                // CRITICAL: Always update the token field instantly if it exists in the payload
                if (result && result.token) {
                    const csrfInput = form.querySelector('input[type="hidden"][name^="csrf_"]');
                    if (csrfInput) csrfInput.value = result.token;
                }

                if (response.ok && result.status === 'success') {
                    // Handle Success
                    const noCommentsMsg = document.getElementById('no-comments');
                    if (noCommentsMsg) noCommentsMsg.remove();

                    const commentList = document.getElementById('comment-list');

                    const newComment = document.createElement('div');
                    newComment.classList.add('d-flex', 'align-items-center', 'pb-2')

                    const img = document.createElement('img');
                    img.classList.add('rounded-circle', 'avatar-50', 'mr-2')
                    img.src = result.avatar;
                    newComment.append(img);

                    const comment = document.createElement('div');
                    comment.classList.add('comment-content');

                    const span = document.createElement('span');
                    span.classList.add('font-weight-bold', 'mr-2', 'text-dark');
                    span.innerText = result.fullname;

                    const spanTwo = document.createElement('span');
                    spanTwo.classList.add('text-secondary');
                    spanTwo.innerText = result.body;

                    comment.append(span, spanTwo);

                    newComment.append(comment);

                    commentList.insertAdjacentElement('afterbegin', newComment);

                    // New Comment count
                    document.getElementById('comment-count').innerHTML = result.commentCount;

                    form.querySelector('input[name="body"]').value = '';
                } else {
                    // Handle Failure (Validation error / Server error)
                    // The token has already updated above, so the form is ready for a retry
                    alert(result.message || 'An unexpected error occurred.');
                }
            } catch (error) {
                console.error('Submission Error:', error);
                alert('Network communication error. Please try again.');
            } finally {
                submitBtn.disabled = false;
            }
        }

        // On Form submit
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            fetchComments();
        });

        // On Enter input
        const commentInput = document.getElementById('comment-input');
        commentInput.addEventListener('click', (event) => {
            event.preventDefault();
            if (event.key === 'Enter') {
                fetchComments();
            }
        });

    });

</script>