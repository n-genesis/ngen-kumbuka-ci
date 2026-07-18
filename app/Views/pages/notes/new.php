<!-- app/Views/pages/notes/new.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/vendor/CustomEditor/css/CustomEditor.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('backend'); ?>

<div class="col-lg-12">
    <div class="card card-block card-stretch">
        <!-- Note Form -->
        <form action="<?= base_url('notes') ?>" method="post">

            <div class="card-body write-card pb-4">
                <div class="row">
                    <div class="col-md-8">

                        <?= csrf_field() ?>
                        <div class="form-row">
                            <!-- Note Title -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="label-control">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Note Title" value="<?= old(key: 'title') ?>"
                                    data-change="input" data-custom-target="#note-title">
                            </div>
                            <!-- URL Friendly Title -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="label-control">Custom URL</label>
                                <input type="text" class="form-control" name="slug" placeholder="URL Friendly Title"
                                    value="<?= old(key: 'slug') ?>" data-change="input" data-custom-target="#note-title">
                            </div>
                            <!-- Note Icons -->
                            <div class="form-group col-md-4 col-sm-12">
                                <label class="label-control">Note Type</label>
                                <div id="icon-button">
                                    <!-- Note Types Buttons -->
                                    <?php
                                    foreach ($noteTypeDropDown as $type) {
                                        // List Note Type Buttons
                                        echo form_button([
                                            'name' => 'type_id',
                                            'value' => $type->id,
                                            'type' => 'button',
                                            'class' => 'btn btn-outline-primary ' . (strcasecmp($selectedType, $type->name) == 0 ? 'active' : '') . ' ml-1',
                                            'data-change' => 'click',
                                            'data-custom-target' => '#note-icon',
                                            'data-type' => $type->name,
                                            'content' => "<i class=\"$type->btn_icon ml-1 mr-1\"></i>",
                                        ]);
                                    }
                                    ?>
                                </div>
                                <input type="hidden" id="type-id" name="type_id" value="<?= $selectTypeId ?>">
                            </div>
                            <!-- Notebook -->
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="notebookId">Notebook (folder)</label>
                                <select class="form-control" name="notebook_id" id="notebookId">
                                    <option value="1">Folder Name 001</option>
                                    <option value="">Folder Name 002</option>
                                    <option value="">Folder Name 003</option>
                                    <option value="">Folder Name 004</option>
                                    <option value="">Folder Name 005</option>
                                </select>
                            </div>
                            <!-- Note Priority -->
                            <div class="form-group col-md-4 col-sm-12">
                                <label class="label-control">Priority</label>
                                <?= form_dropdown('priority', $priority, null, [
                                    'class' => 'form-control',
                                    'data-change' => 'select',
                                    'data-custom-target' => 'color',
                                ]); ?>
                            </div>

                            <!-- Note Content -->
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">Body</label>
                                <textarea id="kumbukaEditor" name="body" rows="3" data-change="input" data-custom-target="#note-description" ><?= old(key: 'body') ?></textarea>
                            </textarea>

                            </div>
                            <!-- Note Status (Visability) -->
                            <div class="form-group col-md-6">
                                <label for="noteStatus" class="label-control">Status (Visability)</label>
                                <select class="form-control" name="status" id="noteStatus">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="Archive">Archive</option>
                                </select>
                            </div>

                            <!-- Allow Comments -->
                            <div class="form-group col-md-6">
                                <label for="allowComments" class="label-control">Allow Comments</label>
                                <select class="form-control" name="allow_comments" id="allowComments">
                                    <option value="1">Yes (Allow Comments)</option>
                                    <option value="0">No! (DO NOT Allow Comments)</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <!-- Example Note Element/Display -->
                    <aside class="col-md-4" id="default">
                        <article class="card">
                            <header class="card-header">
                                <h1 class="lead">Create a Sticker</h1>
                            </header>
                            <div class="card-body">
                                <img src="https://placehold.co/400" class="img-thumbnail"/>
                            </div>
                        </article>
                    </aside>

                </div>
            </div>

            <footer class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?= site_url('notes') ?>" class="btn btn-secondary mr-auto">
                    <i class="bi bi-x-octagon"></i> Cancel
                </a>
                <button type="reset" class="btn btn-outline-primary mr-2" data-reset="note-reset">
                    <i class="bi bi-arrow-clockwise" id="new-note-reset"></i>
                    Clear
                </button>
                <button type="submit" class="btn btn-primary mr-2">
                    <i class="bi bi-envelope-arrow-up" id="new-note-save"></i>
                    Post Note
                </button>
            </footer>

        </form>
        <!-- END FORM -->
    </div>
</div>

<?= $this->endSection(); ?>

<!-- Additional  JS Scripts -->
<?= $this->section('js') ?>
<script src="<?= base_url('assets/vendor/CustomEditor/js/CustomEditor.js') ?>"></script>
<script src="<?= base_url('assets/vendor/CustomEditor/js/lang/en.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function () {
        // Generate a sticker
        $('#kumbukaEditor').customEditor({
            language: 'en',
            height: '250px',
            toolbar: [
                ['bold', 'italic', 'underline'],
                ['fontname', 'fontsize'],
                ['forecolor','backcolor', 'removeFormat'],
                ['insertImage', 'insertLink', 'video'],
                ['undo', 'redo','codeView']
            ],
            onChange: function (content) {

            }
        });
    });
</script>

<?= $this->endSection() ?>