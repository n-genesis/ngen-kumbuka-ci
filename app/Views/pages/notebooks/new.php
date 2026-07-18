<!-- app/Views/pages/notes/index.php -->
<?= $this->extend('layouts/backend'); ?>


<?= $this->section('backend'); ?>

<!-- Notebooks -->
<div class="col-lg-12 col-sm-12">

    <div class="card card-block card-stretch">
 <form id="notebook-form" action="<?= base_url('notebooks/create') ?>" method="post" class="needs-validation" data-km="form" novalidate>

    <?= csrf_field() ?>       
            <!-- Card Header -->
            <header class="card-header d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                <h3 class="m-0 flex-fill">New Notebook</h3>
                <div class="d-flex justify-content-between align-items-sm-center">
                    <a href="<?= site_url('/notebooks') ?>"
                        class="btn btn-outline-secondary mb-2 mr-4 mb-sm-0 mr-sm-2"><i class="bi bi-backspace"></i> Back</a>
                </div>
            </header>

            <!-- Card Body -->
            <div class="card-body">



                <div class="row">

                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" value="<?= old('name') ?>" required>
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="status">Status:</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="">Choose a Category</option>
                            <?php foreach ($data['status'] as $value => $label): ?>
                                <!-- Check if this option matches what was previously submitted -->
                                <option value="<?= $value ?>" <?= old('categories') === $value ? 'selected' : '' ?>>
                                    <?= $label ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="metadata">Metadata:</label>
                        <input type="text" class="form-control" name="metadata" id="metadata" value="<?= old('metadata') ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="7" style="line-height: 22px;" required><?= old('description') ?></textarea>
                    </div>
                   
                </div>

            </div>

            <!-- Footer -->
            <footer class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?= site_url('notebooks') ?>" class="btn btn-primary"><i class="bi bi-box-arrow-left"></i> Cancel</a>
                <button type="submit" class="btn btn-outline-primary" data-km="submit"><i class="bi bi-floppy"></i> Save</button>
            </footer>
 </form>
    </div>


</div>


<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('notebook-image-input');
        const imageForm = document.getElementById('notebook-form');
        const previewImage = document.getElementById('notebook-image-preview');
        if (fileInput !== null && imageForm !== null) {
            fileInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
                // imageForm.submit();
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