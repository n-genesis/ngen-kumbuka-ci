<!-- app/Views/pages/notes/new.php -->
<?= $this->extend('layouts/backend'); ?>


<?= $this->section('backend'); ?>

<div class="col-lg-12">
    <div class="card card-block card-stretch pb-2">
        <div class="card-body write-card pb-4">
            <div class="row">
                <div class="col-md-8">
                    <!-- New Note From -->
                    <form action="">
                        <div class="form-row">
                            <!-- Note Icons -->
                            <div class="form-group col-md-8 col-sm-12">
                                <label class="label-control">Note Type Icon (<?= $selectedType ?>)</label>
                                <div id="icon-button">
                                    <button class="btn btn-outline-primary ml-1 active" type="button"
                                        data-change="click" data-custom-target="#note-icon">
                                        <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-primary ml-1" type="button" data-change="click"
                                        data-custom-target="#note-icon">
                                        <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-primary ml-1" type="button" data-change="click"
                                        data-custom-target="#note-icon">
                                        <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-primary ml-1" type="button" data-change="click"
                                        data-custom-target="#note-icon">
                                        <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-primary ml-1" type="button" data-change="click"
                                        data-custom-target="#note-icon">
                                        <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-primary ml-1" type="button" data-change="click"
                                        data-custom-target="#note-icon">
                                        <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-primary ml-1" type="button" data-change="click"
                                        data-custom-target="#note-icon">
                                        <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-primary ml-1" type="button" data-change="click"
                                        data-custom-target="#note-icon">
                                        <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Note Priority -->
                            <div class="form-group col-md-4 col-sm-12">
                                <label class="label-control">Priority</label>
                                <div>
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
                            </div>
                            <!-- Note Title -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="label-control">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Note Title" value=""
                                    data-change="input" data-custom-target="#note-title">
                            </div>
                            <!-- URL Friendly Title -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="label-control">Custom URL</label>
                                <input type="text" class="form-control" name="slug" placeholder="URL Friendly Title" value=""
                                    data-change="input" data-custom-target="#note-title">
                            </div>
                            <!-- Note Content-->
                            <div class="form-group col-md-12">
                                <label class="label-control">Body</label>
                                <div id="editor"></div>
                            </div>
                            <!-- Note Date
                            <div class="form-group col-md-6">
                                <label class="label-control">Reminder Date</label>
                                <input type="date" class="form-control" name="reminder_date" value="1988-03-28"
                                    data-change="input" data-custom-target="#note-reminder-date">
                            </div>
                            -->
                            <div class="form-group col-md-6">
                                <label for="noteStatus" class="label-control">Status (Visability)</label>
                                <select class="form-control" name="type_id" id="noteStatus">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="Archive">Archive</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="notebookId">Notebook (folder)</label>
                                <select class="form-control" name="notebook_id" id="notebookId">
                                    <option value="">Folder Name 001</option>
                                    <option value="">Folder Name 002</option>
                                    <option value="">Folder Name 003</option>
                                    <option value="">Folder Name 004</option>
                                    <option value="">Folder Name 005</option>
                                </select>
                            </div>
                            <!-- Allow Comments -->
                            <div class="form-group form-check">
                                <input type="checkbox" name="allow_comments" class="form-check-input" id="allowComment">
                                <label class="form-check-label" for="allowComment">Allow Comments</label>
                            </div>

                        </div>
                    </form>
                </div>

                <!-- Note Display -->
                <aside class="col-md-4" id="default">
                    <div class="card card-block card-stretch card-bottom-border-info note-detail" id="update-note">
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
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4" style="">
                                        <a href="#" class="dropdown-item new-note1" data-toggle="modal" data-custom-target="#new-note1">
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
                            <p class="mb-3 text-ellipsis short-6" id="note-description">Lorem Ipsum
                                is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled
                                it to make a type specimen book.</p>
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
        <div class="card-footer d-flex align-items-center justify-content-end">
            <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary mr-2">
                    <i class="bi bi-box-arrow-left"></i> Cancel
                </a>

            <button type="reset" class="btn btn-outline-primary mr-2" data-reset="note-reset">
                <i class="bi bi-rewind" id="new-note-reset"></i>
                Reset
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save2" id="new-note-save"></i>
                Save
            </button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>
<script>
    var quill = new Quill('#note-editor', {
        theme: 'snow',
    });
</script>
<?= $this->endSection() ?>