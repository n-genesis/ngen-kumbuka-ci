<!-- ADMIN Backend User List -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">User List</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="">
                <div class="row justify-content-between">
                    <div class="col-sm-6 col-md-6">
                        <div id="user_list_datatable_info" class="dataTables_filter">
                            <form class="mr-3 position-relative">
                                <div class="form-group mb-0">
                                    <input type="search" class="form-control" id="exampleInputSearch"
                                        placeholder="Search" aria-controls="user-list-table">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="user-list-files d-flex">
                            <a class="bg-primary" href="javascript:void();">
                                Print
                            </a>
                            <a class="bg-primary" href="javascript:void();">
                                Excel
                            </a>
                            <a class="bg-primary" href="javascript:void();">
                                Pdf
                            </a>
                        </div>
                    </div>
                </div>
                <table id="user-list-table" class="table table-striped tbl-server-info mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead>
                        <tr class="ligth">
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Join Date</th>
                            <th style="min-width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><img class="rounded img-fluid avatar-40"
                                    src="../assets/images/user/01.jpg" alt="profile"></td>
                            <td>Anna Sthesia</td>
                            <td>annasthesia@gmail.com</td>
                            <td><span class="badge iq-bg-primary">Active</span></td>
                            <td>2019/12/01</td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><img class="rounded img-fluid avatar-40"
                                    src="../assets/images/user/02.jpg" alt="profile"></td>
                            <td>Brock Lee</td>
                            <td>brocklee@gmail.com</td>
                            <td><span class="badge iq-bg-primary">Active</span></td>
                            <td>2019/12/01</td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><img class="rounded img-fluid avatar-40"
                                    src="../assets/images/user/03.jpg" alt="profile"></td>
                            <td>Dan Druff</td>
                            <td>dandruff@gmail.com</td>
                            <td><span class="badge iq-bg-warning">Pending</span></td>
                            <td>2019/12/01</td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-between mt-3">
                <div id="user-list-page-info" class="col-md-6">
                    <span>Showing 1 to 5 of 5 entries</span>
                </div>
                <div class="col-md-6">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- User List Content -->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Users</h5>
            <a href="<?= site_url('admin/users/create') ?>" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Add New User
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Groups</th>
                            <th>Status</th>
                            <th>Last Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="7" class="text-center">No users found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $user->id ?></td>
                                    <td><?= esc($user->username) ?></td>
                                    <td><?= esc($user->email) ?></td>
                                    <td>
                                        <?php foreach ($user->getGroups() as $group): ?>
                                            <span class="badge bg-secondary"><?= esc($group) ?></span>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php if ($user->active): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= $user->last_active ? date('Y-m-d H:i', strtotime($user->last_active)) : 'Never' ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?= site_url('admin/users/edit/' . $user->id) ?>" class="btn btn-primary"
                                                data-bs-toggle="tooltip" title="Edit User">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <?php if ($user->id !== auth()->id()): ?>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete(<?= $user->id ?>)" data-bs-toggle="tooltip"
                                                    title="Delete User">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" id="deleteUserBtn" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- END User List Content-->

<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    function confirmDelete(userId) {
        document.getElementById('deleteUserBtn').href = '<?= site_url('admin/users/delete/') ?>' + userId;
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
</script>
<?= $this->endSection() ?>