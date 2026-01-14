<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= esc($appDesc); ?>" />
    <meta name="author" content="<?= esc($appAuthor); ?>" />
    <title><?= esc($pageTitle); ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/favicon.ico'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/backend-plugin.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/backend.css'); ?>">
    <!-- Select2 Css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Picker jQuery CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select-picker@0.3.2/dist/picker.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <?= $this->renderSection('javascripts') ?>
    <?= $this->renderSection('styles') ?>
</head>