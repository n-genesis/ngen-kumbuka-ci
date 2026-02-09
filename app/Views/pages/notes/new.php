<!-- app/Views/pages/notes/new.php -->
<?= $this->extend('layouts/backend'); ?>


<?= $this->section('backend'); ?>

<div class="col-lg-12">
    <div class="card card-block card-stretch">
        <div class="card-body write-card pb-4">
            <div class="row">
                <div class="col-md-8">
                    <!-- New Note From -->
                    <form action="">
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
                                <label class="label-control">Note Type Icon (<?= $selectedType ?>)</label>
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
                                            'content' => "<i class=\"$type->btn_icon ml-1 mr-1\"></i>",
                                        ]);
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- Notebook -->
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="notebookId">Notebook (folder)</label>
                                <select class="form-control" name="notebook_id" id="notebookId">
                                    <option value="">Folder Name 001</option>
                                    <option value="">Folder Name 002</option>
                                    <option value="">Folder Name 003</option>
                                    <option value="">Folder Name 004</option>
                                    <option value="">Folder Name 005</option>
                                </select>
                            </div>
                            <!-- Note Priority -->
                            <div class="form-group col-md-4 col-sm-12">
                                <label class="label-control">Priority</label>
                                <select name="priority" id="" class="form-control" data-change="select"
                                    data-custom-target="color">
                                    <option value="primary">Default (Primary)</option>
                                    <option value="success">Very High (Success)</option>
                                    <option value="secondary">Very Low (Secondary)</option>
                                    <option value="info" selected="">Low (Information)</option>
                                    <option value="warning">Medium (Warning)</option>
                                    <option value="danger">High (Danger)</option>
                                </select>
                            </div>

                            <!-- Note Content-->
                            <div class="form-group col-md-12">
                                <label class="label-control">Body</label>
                                <div id="editor" data-custom-target="#note-description"></div>
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
                                <select class="form-control" name="type_id" id="noteStatus">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="Archive">Archive</option>
                                </select>
                            </div>

                            <!-- Allow Comments -->
                            <div class="form-group col-md-6">
                                <label for="allowComments" class="label-control">Allow Comments</label>
                                <select class="form-control" name="allow_comments" id="allowComments">
                                    <option value="yes">Yes (Allow Comments)</option>
                                    <option value="no">No! (DO NOT Allow Comments)</option>
                                </select>
                            </div>

                        </div>
                    </form>
                </div>

                <!-- Example Note Element/Display -->
                <aside class="col-md-4" id="default">
                    <div class="card card-block card-stretch card-bottom-border-info note-detail basic-drop-shadow" id="update-note">
                        <div class="card-header d-flex justify-content-between pb-1">
                            <div class="icon iq-icon-box-2 icon-border-info rounded" id="note-icon">
                                <svg width="23" class="svg-icon" id="iq-main-01" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
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
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary mr-auto">
                <i class="bi bi-box-arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary mr-2">
                <i class="bi bi-save2" id="new-note-save"></i>
                Save
            </button>
            <button type="reset" class="btn btn-outline-primary mr-2" data-reset="note-reset">
                <i class="bi bi-rewind" id="new-note-reset"></i>
                Reset
            </button>
            
        </div>
    </div>
</div>

<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>
<script>
    // Quill (Open source) WYSIWYG Editor
    var quill = new Quill('#editor', {
        theme: 'snow',
    });

    const placeholderText = document.getElementById('note-description').textContent;
    // Update Note Display on Quill text-change
    quill.on('text-change', (delta, oldDelta, source) => {
        const text = quill.getText();
        // Trimming the text removes the default '\n' and any user-typed spaces
        const isEmpty = text.trim().length === 0;
        const target = $('#note-description');
        const defaultValue = placeholderText;
        if (!isEmpty) {
            $(target).html(text);
        } else {
            $(target).html(placeholderText);
        }
        if (source == 'api') {
            console.log('An API call triggered this change.');
        } else if (source == 'user') {
            console.log('A user action triggered this change.');
        }
    });
</script>
<?= $this->endSection() ?>