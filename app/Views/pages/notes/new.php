<!-- app/Views/pages/notes/new.php -->
<?= $this->extend('layouts/backend'); ?>


<?= $this->section('backend'); ?>

<div class="col-lg-12">
    <div class="card card-block card-stretch">
        <!-- Note Form -->
        <form action="<?= base_url('note') ?>" method="post">

            <div class="card-body write-card pb-4">
                <div class="row">
                    <div class="col-md-8">

                            <?= csrf_field() ?>
                            <div class="form-row">
                                <!-- Note Title -->
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="label-control">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Note Title" value=""
                                        data-change="input" data-custom-target="#note-title">
                                </div>
                                <!-- URL Friendly Title -->
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="label-control">Custom URL</label>
                                    <input type="text" class="form-control" name="slug" placeholder="URL Friendly Title"
                                        value="" data-change="input" data-custom-target="#note-title">
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
                                    <?= form_dropdown('priority', $priority, null,[
                                        'class'=> 'form-control',
                                        'data-change'=> 'select',
                                        'data-custom-target'=> 'color',
                                    ]); ?>
                                </div>

                                <!-- Note Content-->
                                <div class="form-group col-md-12">
                                    <label class="label-control">Body</label>
                                    <div id="editor" data-custom-target="#note-description"></div>
                                    <input type="hidden" id="quill_wysiwyg" name="body">
                                </div>
                                <!-- Note Date
                                <div class="form-group col-md-6">
                                    <label class="label-control">Reminder Date</label>
                                    <input type="date" class="form-control" name="reminder_date" value="1988-03-28"
                                        data-change="input" data-custom-target="#note-reminder-date">
                                </div>
                                -->
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
                        <div class="card card-block card-stretch card-bottom-border-info note-detail basic-drop-shadow" id="update-note">
                            <div class="card-header d-flex justify-content-between pb-1">
                                <div class="icon iq-icon-box-2 icon-border-info rounded" id="note-icon">
                                    <!-- Note Types Buttons -->
                                        <?php
                                        foreach ($noteTypeDropDown as $type) {
                                            // List Note Type Buttons
                                            if (strcasecmp($selectedType, $type->name) == 0) {
                                                echo "<i class=\"$type->btn_icon ml-1 mr-1\"></i>";
                                            }
                                        }
                                        ?>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle dropdown-bg" id="dropdownMenuButton4"
                                            data-toggle="dropdown" aria-expanded="false" role="button">
                                            <i class="bi bi-three-dots"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4"
                                            style="">
                                            <a href="#" class="dropdown-item new-note1" data-toggle="modal"
                                                data-custom-target="#new-note1">
                                                <i class="bi bi-file-earmark-post mr-3"></i>View
                                            </a>
                                            <a class="dropdown-item" href="#"><i class="bi bi-trash mr-3"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body rounded">
                                <h4 class="card-title text-ellipsis short-1" id="note-title">Example
                                    Note</h4>
                                <p class="mb-3 text-ellipsis short-6" id="note-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-between note-text note-text-info">
                                    <a href="#" class=""><i class="bi bi-people mr-2 font-size-20"></i>
                                        Only Me</a>
                                    <a href="#" class=""><i class="bi bi-calendar mr-2 font-size-20"></i><span
                                            id="note-reminder-date">34th Feb 2026</span></a>
                                </div>
                            </div>
                        </div>
                    </aside>

                </div>
            </div>
            
            <footer class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary mr-auto">
                    <i class="bi bi-box-arrow-left"></i> Cancel
                </a>
                <button type="reset" class="btn btn-outline-primary mr-2" data-reset="note-reset">
                    <i class="bi bi-rewind" id="new-note-reset"></i>
                    Reset
                </button>
                <button type="submit" class="btn btn-primary mr-2">
                    <i class="bi bi-save2" id="new-note-save"></i>
                    Save
                </button>
            </footer>

        </form>
        <!-- END FORM -->
    </div>
</div>

<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>
<script>
    // Quill (Open source) WYSIWYG Editor
    var quill = new Quill('#editor', {
        theme: 'snow',
    });
    // Get a reference to your hidden input or textarea
    var hiddenInput = document.getElementById('quill_wysiwyg');

    const placeholderText = document.getElementById('note-description').textContent;
    // Update Note Display on Quill text-change
    quill.on('text-change', (delta, oldDelta, source) => {
        const content = document.querySelector('#editor .ql-editor').innerHTML;
        // Set the input's value to the editor's full HTML content
        hiddenInput.value = content;
        // Trimming the text removes the default '\n' and any user-typed spaces
        const isEmpty = text.trim().length === 0;
        const target = $('#note-description');
        const defaultValue = placeholderText;
        if (!isEmpty) {
            $(target).html(text);
        } else {
            $(target).html(placeholderText);
        }
    });
</script>
<?= $this->endSection() ?>