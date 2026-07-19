<!-- app/Views/partials/note/note_card_v1.php -->
<?php if ($userNotes): ?>
    <?php foreach ($userNotes as $note): ?>
        <div class="<?= $noteCardClass != '' ? $noteCardClass : 'col-md-6 col-sm-12' ?>">
            <!-- Header with Semantic Tag and Dropdown -->
            <article class="card card-block card-stretch card-height border-1 card-bottom-border-primary note-detail" style="border:3px solid <?= $note->priority ?>;">
                <!-- Card Header -->
                <header class="card-header d-flex justify-content-between pb-1">
                    <!-- Icon Button -->
                    <div class="icon iq-icon-box-2 border-primary rounded">
                        <i class="<?= $note->btn_icon ?> mr-2 ml-2" style="vertical-align: baseline;"></i>
                    </div>
                    <!-- Card Shard & Dropdown -->
                    <div class="card-header-toolbar d-flex align-items-center">
                        <!-- Check if USer is logdin -->
                        <?php if (auth()->loggedIn()): ?>
                            <!-- Share Note Button -->
                            <?php if ($note->user_id != auth()->user()->id): ?>

                                <?php if (!$note->hasUserShared(auth()->user()->id)): ?>
                                    <form action="<?= site_url(['share/ajax']) ?>" method="post" data-km-form="ajax">
                                        <button type="submit" title="Share Note" class="btn btn-outline-white mr-2" data-km="button">
                                            <i class="bi bi-bookmark-heart mr-0"></i>
                                        </button>
                                        <input type="hidden" name="user_id" value="<?= $note->user_id ?>">
                                        <input type="hidden" name="note_id" value="<?= $note->id ?>">
                                    </form>
                                <?php else: ?>
                                    <form action="#" method="post" data-km-form="ajax">
                                        <button type="submit" title="You've shared this note" class="btn btn-outline-primary mr-2"
                                            data-km="button">
                                            <i class="bi bi-bookmark-heart-fill mr-0"></i>
                                        </button>
                                        <input type="hidden" name="user_id" value="<?= $note->user_id ?>">
                                        <input type="hidden" name="note_id" value="<?= $note->id ?>">
                                    </form>
                                <?php endif; ?>

                            <?php else: ?>
                                <!-- Dropdown Menu -->
                                <div class="dropdown">
                                    <span class="dropdown-toggle dropdown-bg" id="note-dropdownMenuButton4" data-toggle="dropdown"
                                        aria-expanded="false" role="button">
                                        <i class="bi bi-three-dots"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="note-dropdownMenuButton4" style="">
                                        <a href="<?= base_url("notes/edit/$note->id") ?>" class="dropdown-item edit-note1">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <button type="button" data-toggle="modal" data-target="#deleteModal" data-id="<?=$note->id?>"
                                            data-name="<?= $note->title ?>" class="dropdown-item edit-note1">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php endif; ?>
                    </div>

                </header>

                <!-- Card Body -->
                <section class="card-body rounded">
                    <!-- Link Logging or Account -->
                    <?php if (auth()->loggedIn() && $note->user_id == auth()->user()->id): ?>
                        <a href="<?= base_url("users/$note->user_id/notes/$note->slug") ?>" class="">
                        <?php else: ?>
                            <a href="<?= base_url("users/$note->user_id/notes/$note->slug") ?>" class="">
                            <?php endif; ?>
                            <!-- Note Sticker -->
                            <img src="https://api.dicebear.com/10.x/thumbs/svg?seed=<?= $note->sticker ?>" class="figure-img img-fluid rounded mb-3" alt="Note Sticker">
                            <h3 class="card-title mb-2">
                                <?= $note->title ?>
                            </h3>
                        </a>
                </section>

                <!-- Card Footer -->
                <footer class="card-footer">
                    <div class="d-flex align-items-center justify-content-between note-text note-text-<?= $note->priority ?>">
                        <a href="#" class="">
                            <i class="bi bi-people mr-2 font-size-20"></i>
                            <?= $note->share_history ?> share
                        </a>
                        <a href="#" class="">
                            <i class="bi bi-calendar mr-2 font-size-20"></i>
                            <time datetime="2024-05-20"><?= $note->created_at ?></time>
                        </a>
                    </div>
                </footer>

            </article>

        </div>
    <?php endforeach ?>
<?php else: ?>
    <div class="col-12 pt-4">
        <div class="text-center">
            <h1 class="mb-2">No Posts Yet</h1>
            <p class="mb-4"><?= $user->username ?> hasn't posted any notes yet. Make sure to check back later.</p>
        </div>
    </div>
<?php endif ?>


<!-- Reusable Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <strong id="deleteItemName">this item</strong>? This action cannot be
                undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <!-- The form triggers your backend delete action -->
                <form id="deleteForm" method="POST" action="" data-km="form">
                    <!-- This "spoofs" the POST request as a DELETE request -->
                    <input type="hidden" name="_method" value="DELETE">
                    <?= csrf_field() ?>
                    
                    <button type="submit" class="btn btn-danger" data-km="submit">Delete permanently</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Listen for the modal to start opening
        $('#deleteModal').on('show.bs.modal', function (event) {
            // Button that triggered the modal
            const button = $(event.relatedTarget);

            // Extract info from data-* attributes
            const itemId = button.data('id');
            const itemName = button.data('name');

            // Update the modal's content dynamically
            const modal = $(this);
            modal.find('#deleteItemName').text(itemName);

            // Set the dynamic form submission URL pointing to your backend endpoint
            modal.find('#deleteForm').attr('action', '/notes/delete/' + itemId);
        });
    });

</script>