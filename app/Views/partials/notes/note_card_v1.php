<?php foreach ($userNotes as $note): ?>
    <div class="col-lg-6 col-md-6">
        <!-- Header with Semantic Tag and Dropdown -->
        <article class="card card-block card-stretch card-height card-bottom-border-<?= $note->priority ?> note-detail">
            <!-- Card Header -->
            <header class="card-header d-flex justify-content-between pb-1">
                <!-- Icon Button -->
                <div class="icon iq-icon-box-2 icon-border-<?= $note->priority ?> rounded">
                    <i class="<?= $note->btn_icon ?> mr-2 ml-2" style="vertical-align: baseline;"></i>
                </div>
                <!-- Card Shard & Dropdown -->
                <div class="card-header-toolbar d-flex align-items-center">
                    <!-- Share Note Button -->
                    <?php if ($user->id != auth()->user()->id): ?>
                        <form action="<?= site_url(['share/ajax']) ?>" method="post" data-km-form="ajax">
                            <input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>" id="<?= csrf_token(); ?>">
                            <button type="submit" title="Share Note" class="btn btn-outline-white mr-2" data-km="button">
                                <i class="bi bi-bookmark-heart mr-0"></i>
                            </button>
                            <input type="hidden" name="user_id" value="<?= $user->id ?>">
                            <input type="hidden" name="note_id" value="<?= $note->id ?>">
                        </form>
                    <?php else: ?>
                        <!-- Dropdown Menu -->
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="note-dropdownMenuButton4" data-toggle="dropdown"
                                aria-expanded="false" role="button">
                                <i class="bi bi-three-dots"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="note-dropdownMenuButton4" style="">
                                <a href="#" class="dropdown-item new-note1" data-toggle="modal" data-target="#new-note1"><i
                                        class="bi bi-file-earmark-post mr-3"></i>View</a>
                                <a href="#" class="dropdown-item edit-note1" data-toggle="modal" data-target="#edit-note1"><i
                                        class="bi bi-pencil-square mr-3"></i>Edit</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".card" href="#"><i
                                        class="bi bi-trash mr-3"></i>Delete</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </header>

            <!-- Card Body -->
            <section class="card-body rounded">
                <!-- Link -->
                <a href="#" class="">
                    <figure class="figure mb-0">
                        <!-- Note Image -->
                        <img src="<?= base_url('uploads/default-image.jpg') ?>" class="figure-img img-fluid rounded mb-3"
                            alt="Descriptive image text">

                        <figcaption class="media flex-wrap align-items-top figure-caption">
                            <h3 class="card-title mb-2">
                                <?= $note->title ?>
                            </h3>
                            <p class="card-description short mb-3">
                                <?= esc($note->body) ?>
                            </p>
                            <!--
                            <a href="#" class="btn btn-primary mt-2 ml-auto"><i class="bi bi-pencil-square"></i> View</a>
                            -->
                        </figcaption>
                    </figure>
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