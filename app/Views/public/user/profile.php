<!-- app/Views/public/user/profile.php -->
<?= $this->extend('layouts/backend'); ?>

<?= $this->section('backend'); ?>

<!-- User Profile Container -->
<div class="container-fluid">

   <div class="row">
      <div class="col-lg-12">
         <div class="card car-transparent">
            <div class="card-body p-0">
               <div class="profile-image position-relative">
                  <img src="<?= base_url('uploads/profile.jpg') ?>" class="img-fluid rounded w-100" alt="">
                  <!-- User Avatar Image -->
                  <div class="position-absolute" style="bottom: 10px; left: 10px;">
                     <img class="avatar-100 rounded" src="<?= base_url($user->avatar) ?>" alt="#" data-original-title=""
                        title="">
                  </div>
               </div>
               <div class="profile-overly">
                  <h3><?= $user->full_name ?></h3>
                  <span>Administrator</span>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- About Me and Followers -->
   <div class="row">
      <!-- About Me Section -->
      <div class="col-lg-10 col-md-8 col-sm-12">
         <div class="card card-block card-stretch card-height">
            <div class="card-body">
               <h4 class="mb-3">About Me</h4>
               <p class="mb-0 text-ellipsis short-4">
                  <?= esc($user->bio) ?>
               </p>
            </div>
         </div>
      </div>

      <!-- Followers Count -->
      <div class="col-lg-2 col-md-4 col-sm-12">
         <div class="card card-block card-stretch">
            <div class="card-body text-center">
               <h2 class="mb-2 mt-3"><?= count($user->followers) ?>+</h2>
               <h4>Followers</h4>
               <?php if ($user->id !== auth()->id() && auth()->loggedIn()): ?>   
                  <?php if ($followerModel->isFollowing(auth()->id(), $user->id)): ?>
                     <form action="<?= base_url('follow/toggle/' . $user->id) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="followed_id" value="<?= $user->id ?>">
                        <button type="submit" class="btn btn-outline-primary mt-3">Unfollow </button>
                     </form>
                  <?php else: ?>
                     <form action="<?= base_url('follow/toggle/' . $user->id) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="followed_id" value="<?= $user->id ?>">
                        <button type="submit" class="btn btn-outline-primary mt-3">Follow <i
                              class="bi bi-person-plus-fill"></i></button>
                     </form>
                  <?php endif; ?>
               <?php endif; ?>
            </div>
         </div>
      </div>

   </div>

   <!-- Social Links and Contact Information -->
   <div class="row">
      <!-- Social Links -->
      <div class="col-lg-4 col-md-5">
         <!-- Social Links Card -->
         <div class="card card-block">
            <div class="card-header">
               <div class="header-title">
                  <h4 class="card-title">Social Networks</h4>
               </div>
            </div>
            <div class="card-body">
               <ul class="list-inline p-0 m-0">
                  <li class="d-flex align-items-center mb-3">
                     <div class="profile-icon iq-icon-box rounded-small bg-info-light text-center">
                        <i class="bi bi-facebook"></i>
                     </div>
                     <div class="pl-3">
                        <h5>Facebook</h5>
                        <p class="mb-0"><a href="#" target="_blank">Link to Social Network Profile</a></p>
                     </div>
                  </li>
                  <li class="d-flex align-items-center mb-3">
                     <div class="profile-icon iq-icon-box rounded-small bg-info-light text-center">
                        <i class="bi bi-twitter"></i>
                     </div>
                     <div class="pl-3">
                        <h5>Twitter</h5>
                        <p class="mb-0"><a href="#" target="_blank">Link to Social Network Profile</a></p>
                     </div>
                  </li>
                  <li class="d-flex align-items-center mb-3">
                     <div class="profile-icon iq-icon-box rounded-small bg-warning-light text-center">
                        <i class="bi bi-instagram"></i>
                     </div>
                     <div class="pl-3">
                        <h5>Instagram</h5>
                        <p class="mb-0"><a href="#" target="_blank">Link to Social Network Profile</a></p>
                     </div>
                  </li>
                  <li class="d-flex align-items-center mb-3">
                     <div class="profile-icon iq-icon-box rounded-small bg-warning-light text-center">
                        <i class="bi bi-snapchat"></i>
                     </div>
                     <div class="pl-3">
                        <h5>Snapchat</h5>
                        <p class="mb-0"><a href="#" target="_blank">Link to Social Network Profile</a></p>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <!-- Contact Information -->
         <div class="card card-block">
            <div class="card-header">
               <div class="header-title">
                  <h4 class="card-title">Contact Information</h4>
               </div>
            </div>
            <div class="card-body">
               <ul class="list-inline p-0 m-0 iq-contact-rest">
                  <li class="mb-3 d-flex">
                     <i class="bi bi-geo-alt"></i>
                     <p class="mb-0 ml-2 font-size-16 line-height">505 West Brickyard Rd, CA , USA</p>
                  </li>
                  <li class="mb-3 d-flex">
                     <i class="bi bi-telephone"></i>
                     <p class="mb-0 ml-2 font-size-16 line-height"><?= $user->phone ?></p>
                  </li>
                  <li class="mb-3 d-flex">
                     <i class="bi bi-envelope"></i>
                     <p class="mb-0 ml-2 font-size-16 line-height"><?= $user->email ?></p>
                  </li>
                  <li class="mb-3 d-flex">
                     <i class="bi bi-link-45deg"></i>
                     <a href="javascript:void(0);">
                        <p class="mb-0 ml-2 font-size-16 line-height"> http://www.yourwebsite.com </p>
                     </a>
                  </li>
               </ul>
            </div>
         </div>

      </div>

      <!-- User Notes Section -->
      <div class="col-lg-8 col-md-6">

         <div class="card card-block card-stretch card-height">
            <div class="card-header">
               <div class="header-title">
                  <h4 class="card-title">User Notes</h4>
               </div>
            </div>

            <div class="card-body">
               <!-- User Notes Cell  -->
               <div class="notes-container">
                  <div class="row">
                     <?= view_cell('UserNoteCell', ['userId' => $user->id]) ?>
                  </div>
               </div>

            </div>

            <div class="card-footer text-right">
               <a href="javascript:void();" class="btn btn-primary">View All Notes</a>
            </div>
         </div>

      </div>

   </div>

</div>

<?= $this->endSection(); ?>