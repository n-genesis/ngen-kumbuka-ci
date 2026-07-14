<!-- app/Views/pages/notes/index.php -->
<?= $this->extend('layouts/backend'); ?>


<?= $this->section('backend'); ?>

<!-- User Notes -->
<div class="col-lg-12">
    <div class="card card-block card-stretch vh-100">

        <header class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0"><?= $pageHeader ?></h3>
            <?php if($userId == auth()->id()): ?>
                <a href="<?= site_url('notebooks/new') ?>" class="btn btn-primary"><i class="bi bi-plus-square"></i> New</a>
            <?php endif; ?>
        </header>

        <div class="card-body">
            <div class="row">
                <?php if ($userNotebooks): ?>
                    <?php foreach ($userNotebooks as $notebook): ?>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card border-secondary border h-100">
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-sm-row justify-content-between mb-2">
                                        <a href="<?= site_url('notebooks/'.$notebook->id.'/edit') ?>" class="no-underline">
                                            <img src="<?= ($notebook->notebookImage ? base_url($notebook->notebookImage) : 'https://placehold.net/400x400.png')  ?>" class="img-thumbnail avatar-100 rounded mb-md-0 mb-2" alt="Notebook image">
                                        </a>
                                        <p class="card-text">
                                            <span class="badge badge-primary"><?= $notebook->created_at ?></span></small>
                                        </p>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="font-weight-light"><a href="<?= site_url('notebooks/'.$notebook->id.'/edit') ?>"><?= esc($notebook->name) ?></a></h3>
                                    <p class="card-text"><?= esc($notebook->description) ?></p>
                                    </div>
                                    
                                </div>
                                <!-- Notebook options -->
                                <footer class="card-footer d-flex justify-content-between">
                                    <a href="<?= site_url('notebooks/'.$notebook->id.'/edit') ?>" class="btn btn-outline-primary mr-2"><i class="bi bi-pencil-square m-0"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="bi bi-trash m-0"></i></a>
                                </footer>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php elseif($userId == auth()->id()): ?>
                    <div class="col-12">
                        <h1 class="text-center mb-2">Create a Notebook</h1>
                        <p class="text-center mb-4">You have not created any notebooks yet. Click the button below to create your
                            first notebook.</p>
                        <div class="text-center">
                            <a href="<?= site_url('notebooks/new') ?>" class="btn btn-success">Create Notebook</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-12">
                        <h1 class="text-center mb-2">No Notebooks Found</h1>
                        <p class="text-center mb-4">This user has not created any notebooks yet. Come back later and maybe they'll have some to share!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>

<?= $this->endSection() ?>