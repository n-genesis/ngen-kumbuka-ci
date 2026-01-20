<?php $this->setVar('appTitle', lang(line: 'Errors.pageNotFound')); ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('main'); ?>

<div class="wrapper">
      <div class="container">
         <div class="row no-gutters height-self-center">
            <div class="col-sm-12 text-center align-self-center">
               <div class="iq-error position-relative">
                     <img src="<?= base_url('assets/images/error/404.png') ?>" class="img-fluid iq-error-img" alt="">
                     <h2 class="mb-0 mt-4"><?= lang('Errors.whoops') ?></h2>
                     <p><?= lang('Errors.weHitASnag') ?></p>
                     <a class="btn btn-primary d-inline-flex align-items-center mt-3" href="<?= site_url('login') ?>"><i class="ri-home-4-line"></i><?= lang('Errors.backToLogin') ?></a>
               </div>
            </div>
         </div>
   </div>
      </div>

<!-- END Main -->
<?= $this->endSection(); ?>