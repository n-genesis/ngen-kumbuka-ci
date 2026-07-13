<!-- app/Views/pages/notes/index.php -->
<?= $this->extend('layouts/backend'); ?>


<?= $this->section('backend'); ?>

<!-- Notebooks -->
<div class="col-lg-8">

    <div class="card card-block card-stretch">

        <form id="notebook-info" action="<?= base_url('notebooks/' . $notebook->id) ?>" method="post" class="needs-validation" data-km="form" novalidate>
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <!-- Card Header -->
            <header class="card-header d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                <img class="avatar-70 rounded mr-3" src="<?= base_url($notebook->author_avatar) ?>" alt="#"
                    data-original-title="" title="">
                <h3 class="m-0 flex-fill"><?= esc($notebook->name) ?></h3>
                <div class="d-flex justify-content-between align-items-sm-center">
                    <a href="<?= site_url('users/' . $userId . '/notebooks') ?>"
                        class="btn btn-outline-secondary mb-2 mr-4 mb-sm-0 mr-sm-2"><i class="bi bi-backspace"></i>
                        Back</a>
                    <a href="<?= site_url('notebooks/create') ?>" class="btn btn-danger mb-2 mb-sm-0 mr-sm-2"><i
                            class="bi bi-trash"></i> Delete</a>
                </div>
            </header>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" value="<?= old('name', $notebook->name) ?>" required>
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="notebook_parent">Notebook Binder(Parent):</label>
                        <select class="form-control" id="notebook_parent">
                            <option selected="">The Greatest One</option>
                            <option>Good for Nothing</option>
                            <option>Rock-n-roll to Space and Science</option>
                            <option>The Now and Millennium</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="metadata">Metadata:</label>
                        <input type="text" class="form-control" name="metadata" id="metadata" value="<?= old('metadata', $notebook->metadata) ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="7" style="line-height: 22px;" required><?= $notebook->description ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?= site_url('users/'.$userId.'/notebooks') ?>" class="btn btn-primary"><i class="bi bi-box-arrow-left"></i> Cancel</a>
                <button type="submit" class="btn btn-outline-primary" data-km="submit"><i class="bi bi-floppy"></i> Save</button>
            </footer>

        </form>

    </div>

</div>


<!-- Notebook Thumbnail -->
<aside class="col-lg-4">
    <div class="card">
        <header class="card-header">
            <h1 class="lead">Notebook Picture</h1>
        </header>
        <div class="card-body d-flex justify-content-center">
            <form id="notebook-images">
                <!-- User Avatar Image -->
                <div class="form-group row align-items-center">
                    <div class="col-md-12">
                        <div class="profile-img-edit">
                            <div class="crm-profile-img-edit">
                                <label for="image-select" role="button">
                                    <img src="https://placehold.co/200x200"
                                        class="crm-profile-pic img-thumbnail img-fluid rounded" alt="Responsive image">
                                </label>
                                <label class="crm-p-image bg-primary" style="left: 0px;" for="image-select">
                                    <i class="bi bi-image"></i>
                                    <input id="image-select" class="file-upload" name="notebook-image" type="file"
                                        accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</aside>
<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('avatarFile');
        const avatarForm = document.getElementById('user-avatar-form');
        if (fileInput !== null && avatarForm !== null) {
            console.log('Found')
            fileInput.addEventListener('change', function () {

                avatarForm.submit();
            });
        }

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {

                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });

    });
</script>
<?= $this->endSection() ?>