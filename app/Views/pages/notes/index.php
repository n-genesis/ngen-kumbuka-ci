<!-- app/Views/pages/notes/index.php -->
<?= $this->extend('layouts/backend'); ?>


<?= $this->section('backend'); ?>

<!-- User Notes -->
<div class="col-lg-12">
    <div class="card card-block card-stretch">
        <div class="card-body custom-notes-space">
            <h3 class="">Your Notes</h3>
            <div class="iq-tab-content">
                <div class="d-flex flex-wrap align-items-top justify-content-between">
                    <ul class="d-flex nav nav-pills text-center note-tab mb-3" id="note-pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link home active show" data-toggle="pill" data-init="note" href="#note1"
                                role="tab" aria-selected="false">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link home" data-toggle="pill" data-init="shared-note" href="#note2" role="tab"
                                aria-selected="true">Shared Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link home" data-toggle="pill" data-init="pin-note" href="#note3" role="tab"
                                aria-selected="false">Pin Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link home" data-toggle="pill" data-init="fav-note" href="#note4" role="tab"
                                aria-selected="false">Favourite Notes</a>
                        </li>
                    </ul>
                    <!-- Form Options -->
                    <div class="media align-items-top iq-grid">
                        <div class="view-btn rounded body-bg btn-dropdown filter-btn mr-3">
                            <div class="dropdown">
                                <span class="dropdown-toggle cursor-pointer" id="dropdownMenuButton003"
                                    data-toggle="dropdown">
                                    <i class="bi bi-filter font-size-20"></i>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right border-none"
                                    aria-labelledby="dropdownMenuButton003">
                                    <div class="dropdown-item mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="mr-4"><i class="bi bi-journal mr-3"></i>Located
                                                In</h6>
                                            <div class="form-group mb-0">
                                                <select name="type" class="basic-select form-control dropdown-toggle"
                                                    data-style="py-0">
                                                    <option value="1">Project Plans</option>
                                                    <option value="2">Routine Notes</option>
                                                    <option value="3">Planning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-item mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="mr-4"><i class="bi bi-clipboard mr-3"></i>Contains</h6>
                                            <div class="form-group mb-0">
                                                <select name="type" class="basic-select form-control dropdown-toggle"
                                                    data-style="py-0">
                                                    <option value="1">Address</option>
                                                    <option value="2">Archive Files</option>
                                                    <option value="3">Code Blocks</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-item mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="mr-4"><i class="bi bi-calendar mr-3"></i>Created</h6>
                                            <div class="form-group mb-0">
                                                <select id="date-select" name="type"
                                                    class="basic-select form-control dropdown-toggle" data-style="py-0">
                                                    <option value="today">Today</option>
                                                    <option value="yest">Yesterday</option>
                                                    <option value="last-week">Last Week</option>
                                                    <option value="last-month">Last Month</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-grid-toggle cursor-pointer">
                            <span class="icon active i-grid rounded"><i class="bi bi-grid font-size-20"></i></span>
                            <span class="icon active i-list rounded"><i class="bi bi-list font-size-20"></i></span>
                            <span class="label label-list">List</span>
                        </div>
                    </div>
                </div>
                <div class="note-content tab-content">
                    <div id="note1" class="tab-pane fade active show">
                        <div class="icon active animate__animated animate__fadeIn i-grid">
                            <div class="row">
                                <?php if($userNotes): ?>
                                <?php foreach($userNotes as $note): ?>
                                <div class="col-lg-4 col-md-6">
                                    <div
                                        class="card card-block card-stretch card-height card-bottom-border-<?= $note->priority ?> note-detail">
                                        <div class="card-header d-flex justify-content-between pb-1">
                                            <div class="icon iq-icon-box-2 icon-border-<?= $note->priority ?> rounded">
                                                <i class="<?= $note->btn_icon ?> mr-2 ml-2" style="vertical-align: baseline;"></i>
                                            </div>
                                            <div class="card-header-toolbar d-flex align-items-center">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle dropdown-bg"
                                                        id="note-dropdownMenuButton4" data-toggle="dropdown"
                                                        aria-expanded="false" role="button">
                                                        <i class="bi bi-three-dots"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="note-dropdownMenuButton4" style="">
                                                        <a href="#" class="dropdown-item new-note1" data-toggle="modal"
                                                            data-target="#new-note1"><i
                                                                class="bi bi-file-earmark-post mr-3"></i>View</a>
                                                        <a href="#" class="dropdown-item edit-note1" data-toggle="modal"
                                                            data-target="#edit-note1"><i
                                                                class="bi bi-pencil-square mr-3"></i>Edit</a>
                                                        <a class="dropdown-item" data-extra-toggle="delete"
                                                            data-closest-elem=".card" href="#"><i
                                                                class="bi bi-trash mr-3"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body rounded">
                                            <div class="media flex-wrap align-items-top">
                                                <h4 class="card-title mr-3"><?= $note->title ?></h4>
                                                <span class="card-text card-text-<?= $note->priority ?>">
                                                    <i class="bi bi-clock mr-2"></i> 02:30 Am</span>
                                                <p class="mb-3 card-description short"><?= esc($note->body) ?></p>
                                                <a href="#" class="btn btn-primary mt-2 ml-auto"><i class="bi bi-pencil-square"></i> View</a>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div
                                                class="d-flex align-items-center justify-content-between note-text note-text-<?= $note->priority ?>">
                                                <a href="#" class=""><i class="bi bi-people mr-2 font-size-20"></i>03
                                                    share</a>
                                                <a href="#" class=""><i class="bi bi-calendar mr-2 font-size-20"></i><?= $note->created_at ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="icon active animate__animated animate__fadeIn i-list">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table  tbl-server-info">
                                            <thead>
                                                <tr class="ligth">
                                                    <th class="w-50" scope="col">Title</th>
                                                    <th scope="col">Permission</th>
                                                    <th scope="col">Created At</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h4 class="mb-2">Weekly Planner</h4>
                                                        <span>Virtual Digital Marketing Course every
                                                            week on Monday, Wednesday and
                                                            Saturday</span>
                                                    </td>
                                                    <td>
                                                        <i class="bi bi-people mr-2 font-size-20"></i>
                                                        03 share
                                                    </td>
                                                    <td>Dec 20</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="badge badge-success mr-3"
                                                                data-toggle="modal" data-target="#edit-note1"><i
                                                                    class="bi bi-pencil-square mr-0"></i></a>
                                                            <a href="#" class="badge badge-danger"
                                                                data-extra-toggle="delete" data-closest-elem="tr"><i
                                                                    class="bi bi-trash mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 class="mb-2">Birthday Celebration <i
                                                                class="bi bi-file-earmark-postmark ml-2 show-tab"
                                                                data-show-tab="[href='#note3']"></i>
                                                        </h4>
                                                        <span>You can easily share via message,
                                                            WhatsApp, emails etc.</span>
                                                    </td>
                                                    <td>
                                                        <i class="las la-lock mr-2 font-size-20"></i>
                                                        Only You
                                                    </td>
                                                    <td>Dec 20</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="badge badge-success mr-3"
                                                                data-toggle="modal" data-target="#edit-note1"><i
                                                                    class="bi bi-pencil-square mr-0"></i></a>
                                                            <a href="#" class="badge badge-danger"
                                                                data-extra-toggle="delete" data-closest-elem="tr"><i
                                                                    class="bi bi-trash mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 class="mb-2">Essay Outline <i
                                                                class="bi bi-bookmark ml-2 show-tab"
                                                                data-show-tab="[href='#note4']"></i>
                                                        </h4>
                                                        <span>Donec rutrum congue leo eget
                                                            malesuada.</span>
                                                    </td>
                                                    <td>
                                                        <i class="las la-lock mr-2 font-size-20"></i>
                                                        Only You
                                                    </td>
                                                    <td>Dec 20</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="badge badge-success mr-3"
                                                                data-toggle="modal" data-target="#edit-note1"><i
                                                                    class="bi bi-pencil-square mr-0"></i></a>
                                                            <a href="#" class="badge badge-danger"
                                                                data-extra-toggle="delete" data-closest-elem="tr"><i
                                                                    class="bi bi-trash mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 class="mb-2">Lecture Notes <i
                                                                class="bi bi-bookmark ml-2 show-tab"
                                                                data-show-tab="[href='#note4']"></i>
                                                        </h4>
                                                        <span>Chapter 1 notes, Chapter 2 Assignment,
                                                            Chapter 3 practical File.</span>
                                                    </td>
                                                    <td>
                                                        <i class="las la-lock mr-2 font-size-20"></i>
                                                        Only You
                                                    </td>
                                                    <td>Dec 20</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="badge badge-success mr-3"
                                                                data-toggle="modal" data-target="#edit-note1"><i
                                                                    class="bi bi-pencil-square mr-0"></i></a>
                                                            <a href="#" class="badge badge-danger"
                                                                data-extra-toggle="delete" data-closest-elem="tr"><i
                                                                    class="bi bi-trash mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 class="mb-2">Image Notes<i
                                                                class="bi bi-file-earmark-postmark ml-2"></i>
                                                        </h4>
                                                        <span>Kumbuka lets you do in
                                                            on-the-go!</span>
                                                    </td>
                                                    <td>
                                                        <i class="las la-lock mr-2 font-size-20"></i>
                                                        Only You
                                                    </td>
                                                    <td>Dec 20</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="badge badge-success mr-3"
                                                                data-toggle="modal" data-target="#edit-note1"><i
                                                                    class="bi bi-pencil-square mr-0"></i></a>
                                                            <a href="#" class="badge badge-danger"
                                                                data-extra-toggle="delete" data-closest-elem="tr"><i
                                                                    class="bi bi-trash mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 class="mb-2">Benefits of Kumbuka</h4>
                                                        <span>Take organized notes and share later
                                                            as meeting minutes or check-list</span>
                                                    </td>
                                                    <td>
                                                        <i class="bi bi-people mr-2 font-size-20"></i>
                                                        2 share
                                                    </td>
                                                    <td>Dec 20</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="badge badge-success mr-3"
                                                                data-toggle="modal" data-target="#edit-note1"><i
                                                                    class="bi bi-pencil-square mr-0"></i></a>
                                                            <a href="#" class="badge badge-danger"
                                                                data-extra-toggle="delete" data-closest-elem="tr"><i
                                                                    class="bi bi-trash mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 class="mb-2">Quick Summary <i
                                                                class="bi bi-file-earmark-postmark ml-2 show-tab"
                                                                data-show-tab="[href='#note3']"></i>
                                                        </h4>
                                                        <span>Need to write a summary note of the
                                                            subject you just finished</span>
                                                    </td>
                                                    <td>
                                                        <i class="las la-lock mr-2 font-size-20"></i>
                                                        Only You
                                                    </td>
                                                    <td>Dec 19</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="badge badge-success mr-3"
                                                                data-toggle="modal" data-target="#edit-note1"><i
                                                                    class="bi bi-pencil-square mr-0"></i></a>
                                                            <a href="#" class="badge badge-danger"
                                                                data-extra-toggle="delete" data-closest-elem="tr"><i
                                                                    class="bi bi-trash mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 class="mb-2">Address & Email</h4>
                                                        <span>Quickly note down the address and
                                                            email address on Kumbuka</span>
                                                    </td>
                                                    <td>
                                                        <i class="bi bi-people mr-2 font-size-20"></i>
                                                        04 share
                                                    </td>
                                                    <td>Dec 19</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="badge badge-success mr-3"
                                                                data-toggle="modal" data-target="#edit-note1"><i
                                                                    class="bi bi-pencil-square mr-0"></i></a>
                                                            <a href="#" class="badge badge-danger"
                                                                data-extra-toggle="delete" data-closest-elem="tr"><i
                                                                    class="bi bi-trash mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 class="mb-2">Kumbuka for Entrepreneurs
                                                            <i class="bi bi-bookmark ml-2 show-tab"
                                                                data-show-tab="[href='#note4']"></i>
                                                        </h4>
                                                        <span>With Kumbuka, you can easily share
                                                            via message, WhatsApp, emails
                                                            etc.</span>
                                                    </td>
                                                    <td>
                                                        <i class="las la-lock mr-2 font-size-20"></i>
                                                        Only You
                                                    </td>
                                                    <td>Dec 19</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="badge badge-success mr-3"
                                                                data-toggle="modal" data-target="#edit-note1"><i
                                                                    class="bi bi-pencil-square mr-0"></i></a>
                                                            <a href="#" class="badge badge-danger"
                                                                data-extra-toggle="delete" data-closest-elem="tr"><i
                                                                    class="bi bi-trash mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="note2" class="tab-pane fade">
                        
                    </div>
                    <div id="note3" class="tab-pane fade">
                        
                    </div>
                    <div id="note4" class="tab-pane fade">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>

<?= $this->endSection() ?>