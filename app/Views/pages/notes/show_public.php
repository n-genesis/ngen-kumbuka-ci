<!-- app/Views/pages/notes/show.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('styles') ?>

<?= $this->endSection(); ?>

<?= $this->section('backend'); ?>

<div class="col-8">
    <div class="card card-block card-stretch">

        <!-- Card Header: User Info -->
        <div class="card-header bg-white d-flex align-items-center border-bottom-0 py-3">
            <img src="<?= base_url($note->author_avatar) ?>" class="rounded-circle avatar-80 mr-1" alt="User Avatar">
            <div>
                <h3 class="mb-0 font-light"><?= $note->author_first_name ?> <?= $note->author_last_name ?></h3>
                <p class="mb-0 text-muted"><?= $note->created_at ?></p>
            </div>
            <button class="btn btn-link text-muted ml-auto p-0" type="button">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </div>

        <!-- Image Carousel -->
        <div id="noteCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#noteCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#noteCarousel" data-slide-to="1"></li>
                <li data-target="#noteCarousel" data-slide-to="2"></li>
                <li data-target="#noteCarousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('uploads/gallery/blog-post-1.webp') ?>" class="d-block w-100" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('uploads/gallery/blog-post-2.webp') ?>" class="d-block w-100" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('uploads/gallery/blog-post-3.webp') ?>" class="d-block w-100" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('uploads/gallery/blog-post-4.webp') ?>" class="d-block w-100" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#noteCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#noteCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Card Body: Note Content -->
        <div class="card-body">
            <h1 class="card-title"><?= $note->title ?></h1>
            <p class="card-text"><?= $note->body ?></p>
            <div class="d-flex justify-content-between align-items-center text-muted pt-2 border-top">
                <span><i class="far fa-heart mr-1"></i> 24 Likes</span>
                <span><i class="far fa-comment mr-1"></i> 2 Comments</span>
            </div>
        </div>

        <!-- Card Footer: Comment Section -->
        <div class="card-footer p-3">

            <!-- Existing Comments List -->
            <div class="comments-list mb-3" style="overflow-y: auto;">
                <div class="d-flex mb-2 pb-2 border-bottom">
                    <img src="https://placehold.co/600x600" class="rounded-circle avatar-50 mr-2" alt="User">
                    <div>
                        <span class="font-weight-bold mr-2 text-dark">John Smith</span>
                        <span class="text-secondary">Looks incredible! Where exactly is
                            this?</span>
                    </div>
                </div>
            </div>

            <!-- Input Form -->
            <form class="input-group">
                <input type="text" class="form-control border-right-0" placeholder="Write a comment..."
                    aria-label="Comment text">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary bg-white border-left-0 text-primary" type="submit">
                        Post Comment
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<aside class="col-4">
    <article class="card card-block card-stretch">
        <div class="card-body">
            <img src="https://api.dicebear.com/10.x/miniavs/svg?seed=72xdgcro" class="img-thumbnail">
        </div>
    </article>

    <div class="card card-block card-stretch">
        <!-- Card Header: Note Details -->
        <div class="card-header bg-white d-flex align-items-center border-bottom-0 py-3">
            <h2 class="mb-0 font-light">Note Details</h2>
        </div>

        <!-- Card Body: Note Metadata -->
        <div class="card-body">
            <p class="text-muted">
                A little about this note
            </p>
            <ul class="list-group">
                <li class="list-group-item"><strong>Author:</strong> <?= $note->author_username ?></li>
                <li class="list-group-item"><strong>Posted At:</strong> <?= $note->created_at ?></li>
                <li class="list-group-item"><strong>Priority:</strong> <?= ucfirst($note->priority) ?></li>
                <li class="list-group-item"><strong>Status:</strong> <?= ucfirst($note->status) ?></li>
                <li class="list-group-item"><strong>Type:</strong> <?= ucfirst($note->type_name) ?></li>
                <li class="list-group-item"><strong>Shares:</strong> <?= $note->share_history ?> share(s)</li>
            </ul>
        </div>

    </div>
</aside>

<?= $this->endSection(); ?>

<!-- Additional  JS Scripts -->
<?= $this->section('js') ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>


<?= $this->endSection() ?>