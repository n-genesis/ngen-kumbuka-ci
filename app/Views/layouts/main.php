<!doctype html>
<html lang="en">

<!-- head tag include -->
<?= $this->include('partials/head') ?>

<body class="Kumbuka-layout">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    
    <!-- Render Most View Content through controller -->
    <?= $this->renderSection('main'); ?>




    <!-- jQuery Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <!-- Include page specific scripts --> 
    <?= $this->renderSection('js') ?>
    

    <!-- Quill.js Library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Select2 JS Library-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Picker jQuery Library -->
    <script src="https://cdn.jsdelivr.net/npm/select-picker@0.3.2/dist/picker.min.js"></script>

    <!-- Flextree Javascript-->
    <script src="<?= base_url('assets/js/flex-tree.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/tree.js'); ?>"></script>

    <!-- Table Treeview JavaScript -->
    <script src="<?= base_url('assets/js/table-treeview.js'); ?>"></script>

    <!-- SweetAlert JavaScript -->
    <script src="<?= base_url('assets/js/sweetalert.js'); ?>"></script>

    <!-- Chart Custom JavaScript -->
    <script src="<?= base_url('assets/js/chart-custom.js'); ?>"></script>

    <!-- slider JavaScript -->
    <script src="<?= base_url('assets/js/slider.js'); ?>"></script>

    <!-- app JavaScript -->
    <script src="<?= base_url('assets/js/app.js'); ?>"></script>

    <!-- Kumbuka Script -->
    <script src="<?= base_url('assets/js/kumbuka-script.js'); ?>"></script>

    <!-- Inlcude inline scritps -->
    <?= $this->renderSection('scripts') ?>
</body>

</html>