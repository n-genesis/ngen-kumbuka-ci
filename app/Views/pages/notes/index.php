<!-- app/Views/pages/notes/index.php -->
<?= $this->extend('layouts/backend'); ?>


<?= $this->section('backend'); ?>

<!-- User Notes -->
<div class="col-lg-12">
    <div class="card card-block card-stretch">
        <header class="card-header d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
            <h2 class="m-0 lean mb-2 mb-md-0">Posted Notes</h2>
            <div class="d-flex justify-content-between align-items-sm-center">
                <div class="form-group mb-0">
                    <select class="form-control" id="note-type" style="width:300px;">
                        <option selected="">All Notes</option>
                        <option>General Notes</option>
                        <option>Reminders</option>
                        <option>Essays</option>
                        <option>Daily Reflections</option>
                    </select>
                </div>
            </div>
        </header>
        <div class="card-body">
            <div class="row">
                <?php if ($userNotes): ?>
                    <!-- Notes Card Include -->
                    <?= $this->setData(['noteCardClass' => 'col-md-4'])->include('partials/note/note_card_v1'); ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>

<?= $this->endSection() ?>