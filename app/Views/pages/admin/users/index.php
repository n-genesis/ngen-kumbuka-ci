<!-- app/Views/pages/admin/users/edit.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">User List</h4>
            </div>
            <a href="<?= site_url('admin/users/create') ?>" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Add New User
            </a>
        </div>
        <div class="card-body">
            <div class="">
                <div class="row justify-content-between">
                    <div class="col-sm-6 col-md-6">
                        <div id="user_list_datatable_info" class="dataTables_filter">
                            <!--  Search Form  -->
                            <form class="mr-3 position-relative" action="<?= base_url('admin/users') ?>" method="get">
                                <div class="form-row d-flex align-items-center">
                                    <div class="col">
                                        <input type="text" class="form-control" name="search" value="<?= esc($search ?? '') ?>">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-outline-primary" type="submit">
                                            <i class="bi bi-search"></i>Search </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="user-list-files d-flex">
                            <a class="btn btn-success" href="<?= site_url('admin/users') . '?' . http_build_query([
                                 'active' => 'true',
                                 'search' => $search ?? ''
                                 ]) ?>">
                                <i class="bi bi-person-fill-check"></i> Active Users
                            </a>
                            <a class="btn btn-secondary" href="<?= site_url('admin/users') . '?' . http_build_query([
                                 'active' => 'false',
                                 'search' => $search ?? ''
                                 ]) ?>">
                                <i class="bi bi-person-x-fill"></i> InActive Users
                            </a>
                        </div>
                    </div>
                </div>
                <!-- User List Table -->
                <table id="user-list-table" class="table table-striped tbl-server-info mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <!-- Table Header -->
                    <thead>
                        <tr>
                            <th>Profile</th>
                            <th>username</th>
                            <th>Email</th>
                            <th>Groups</th>
                            <th>Status</th>
                            <th>Last Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="7" class="text-center">No users found.</td>
                            </tr>
                        <?php else: ?>
                            <!-- User Row -->
                            <?php foreach ($users as $user): ?>
                                <!-- User form -->
                                <form action="<?= base_url('admin/users/delete/' . $user->id) ?>" data-km="form" data-km-username="<?= esc($user->username) ?>" method="post">

                                <!-- CSRF Protection is mandatory for destructive actions -->
                                <?= csrf_field() ?>
                                <!-- This "spoofs" the POST request as a DELETE request -->
                                <input type="hidden" name="_method" value="DELETE">

                                <tr class="user_row <?= !isset($user->status) ? '' : 'table-danger' ?> ">
                                    <!-- Profile Image -->
                                    <td class="text-center">
                                        <a href="<?= site_url(['users/profile','username' => $user->username]) ?>" title="View <?= esc($user->username) ?>'s Profile">
                                            <img class="rounded img-fluid avatar-40"
                                                src="<?= base_url($user->avatar) ?>" alt="profile image">
                                        </a>
                                    </td>
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
                                        <!-- Formated in User Entity class -->
                                        <?= $user->user_last_active ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?= site_url('admin/users/edit/' . $user->id) ?>" class="btn btn-primary"
                                                data-bs-toggle="tooltip" title="Edit User">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <?php if ($user->id !== auth()->id()): ?>
                                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" title="Delete User">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                </form>
                            <?php endforeach; ?>


                        <?php endif; ?>

                    </tbody>

                </table>
            </div>
        </div>

        <!-- Card Footer & Pagination -->
        <div class="card-footer text-muted">
            <!-- Pagination -->
            <?= $pager->links() ?>
        </div>
        
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <b>(<span id="modalUsername" class="text-danger"></span>)</b>? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalBtn" data-dismiss="modal">Cancel</button>
                <buttom type="button" id="deleteUserBtn" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- END User List Content-->

<?= $this->endSection(); ?>

<!-- Show delete confirmation modal script -->
<?= $this->section('scripts') ?>
<script>
const deleteForms = document.querySelectorAll('form[data-km="form"]');
deleteForms.forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault();// Prevent form submission
        $('#deleteModal').modal({// Show the modal
            backdrop: 'static',
            keyboard: false
        });
        const username = form.dataset.kmUsername;// Get form
        document.getElementById('modalUsername').textContent = username;
        $('#deleteModal').on('click','#deleteUserBtn', function(event) {
            const deleteUserBtn = document.getElementById('deleteUserBtn');
            deleteUserBtn.innerHTML = 'Loading...';
            document.getElementById('closeModalBtn').disabled = true;// Disable close button
            deleteUserBtn.disabled = true;// Confirm button
            form.submit();// Submit form
        })
    });
});
</script>
<?= $this->endSection() ?>