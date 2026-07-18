<!-- app/Views/pages/notes/show.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('styles') ?>

<?= $this->endSection(); ?>

<?= $this->section('backend'); ?>

<div class="col-8">
    <div class="card card-block card-stretch">

        <!-- Card Header: User Info -->
        <div class="card-header bg-white d-flex align-items-center border-bottom-0 py-3">
            <a href="<?= site_url('users/profile/' . $note->author_username) ?>">
                <img src="<?= base_url($note->author_avatar) ?>" class="rounded-circle avatar-80 mr-1"
                    alt="User Avatar">
            </a>
            <div>
                <h3 class="mb-0 font-light">
                    <a href="<?= site_url('users/profile/' . $note->author_username) ?>"><?= $note->author_first_name ?>
                        <?= $note->author_last_name ?></a>
                </h3>
                <p class="mb-0 text-muted"><?= $note->created_at ?></p>
            </div>
            <button class="btn btn-link text-muted ml-auto p-0" type="button">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </div>

        <?php if (count($noteImages) > 0): ?>
            <!-- Image Carousel -->
            <div id="noteCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach ($noteImages as $index => $image): ?>
                        <li data-target="#noteCarousel" data-slide-to="<?= $index ?>"
                            class="<?= ($index == 0) ? 'active' : '' ?>"></li>
                    <?php endforeach ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($noteImages as $index => $image): ?>
                        <div class="carousel-item <?= ($index == 0) ? 'active' : '' ?>">
                            <img src="<?= base_url($image->file_path) ?>" class="d-block w-100" alt="First slide">
                        </div>
                    <?php endforeach ?>
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
        <?php endif ?>

        <!-- Card Body: Note Content -->
        <div class="card-body">
            <h1 class="card-title"><?= $note->title ?></h1>
            <p class="card-text"><?= $note->body ?></p>
            <div class="d-flex justify-content-between align-items-center text-muted pt-2 border-top">
                <span><i class="far fa-heart mr-1"></i> <?= $note->share_history ?> Share(s)</span>
                <span><i class="far fa-comment mr-1"></i> 1 Comment(s)</span>
            </div>
        </div>

        <!-- Card Footer: Comment Section -->
        <div class="card-footer p-3">

            <!-- Input Form -->
            <div class="mb-4 pb-2 border-bottom">
                <form class="input-group">
                    <input type="text" class="form-control" placeholder="Write a comment..."
                        aria-label="Comment text">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>

            <!-- Existing Comments List -->
            <div class="comments-list mb-3" style="overflow-y: auto;">

                <!-- Single Comment -->
                <div class="d-flex align-items-center mb-2 pb-2">
                    <!-- User Avatar Image -->
                    <img src="https://placehold.net/400x400.png" class="rounded-circle avatar-50 mr-2" alt="User">
                    <!-- User Comment -->
                    <div class="comment-content">
                        <span class="font-weight-bold mr-2 text-dark">That Guy:</span>
                        <span class="text-secondary">Lorem ipsum dolor sit amet consectetur adipiscing elit. Sit amet
                            consectetur adipiscing elit quisque faucibus ex. Adipiscing elit quisque faucibus ex sapien
                            vitae pellentesque. Lorem ipsum dolor sit amet consectetur adipiscing elit. Sit amet
                            consectetur adipiscing elit quisque faucibus ex.</span>
                    </div>
                </div>

            </div>

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
        <div class="card-header bg-white d-flex align-items-center border-bottom-0">
            <h2 class="mb-0 font-light">About Post</h2>
        </div>
        <!-- Card Body: Note Metadata -->
        <div class="card-body pt-0">
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