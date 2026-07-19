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
                  <img src="<?= base_url($user->coverImage) ?>" class="img-fluid rounded w-100 profile-cover" alt="Cover Image">
                  <!-- User Avatar Image -->
                  <div class="position-absolute" style="bottom: 10px; left: 10px;">
                     <img class="avatar-70 rounded" src="<?= base_url($user->avatar) ?>" alt="#" data-original-title="" title="">
                  </div>
               </div>
               <div class="profile-overly">
                  <h3><?= $user->full_name ?></h3>
                  <span><?= $user->userGroup ?></span>
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
               <!-- Show if User is logged in or not viewing their own profile -->
               <?php if ($user->user_id != auth()->id() && auth()->loggedIn()): ?>
                  <!-- Show Follow/Unfollow Button based on the current follow status -->
                  <?php if ($followerModel->isFollowing(auth()->id(), $user->user_id)): ?>
                     <form action="<?= base_url('follow/toggle/' . $user->user_id) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="followed_id" value="<?= $user->user_id ?>">
                        <button type="submit" class="btn btn-success mt-3">Following <i class="bi bi-person-fill-check"></i></button>
                     </form>
                  <?php else: ?>
                     <form action="<?= base_url('follow/toggle/' . $user->user_id) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="followed_id" value="<?= $user->user_id ?>">
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
      <?php if($accountPrivacy != 'private'): ?>
      <div class="col-lg-4 col-sm-12">


         <?php if($user->hasSocialLinks): ?>
         <!-- Social Links Card -->
         <div class="card card-block">
            <div class="card-header">
               <div class="header-title">
                  <h4 class="card-title">Social Networks</h4>
               </div>
            </div>

            <div class="card-body">
               <ul class="list-inline p-0 m-0">
                  <?php foreach($user_links as $title => $link) : ?>
                     <?php if ($link !== ''): ?>
                     <li class="d-flex align-items-center mb-3">
                        <div class="profile-icon iq-icon-box rounded-small bg-info-light text-center">
                           <i class="bi bi-<?= $title?>"></i>
                        </div>
                        <div class="pl-3">
                           <h5><?= ucfirst($title) ?> </h5>
                           <p class="mb-0"><a href="<?= $link ?>" target="_blank">Link to Social Network Profile</a></p>
                        </div>
                     </li>
                     <?php endif ?>
                  <?php endforeach ?>
               </ul>
            </div>
         </div>
         <?php endif; ?>

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
                     <p class="mb-0 ml-2 font-size-16 line-height"><?= $user->address1 . '<br />' . ($user->address2 ? $user->address2.'<br />' : '') . $user->city . ' ' . $user->state . ' ' . $user->zip ?></p>
                  </li>
                  <li class="mb-3 d-flex">
                     <i class="bi bi-telephone"></i>
                     <p class="mb-0 ml-2 font-size-16 line-height"><?= $user->phone ?></p>
                  </li>
                  <li class="mb-3 d-flex">
                     <i class="bi bi-envelope"></i>
                     <p class="mb-0 ml-2 font-size-16 line-height"><?= $user->email ?></p>
                  </li>
                  <?php if($user_website): ?>
                  <li class="mb-3 d-flex">
                     <i class="bi bi-link-45deg"></i>
                     <a class="user-select-none" href="javascript:void(0);">
                        <p class="mb-0 ml-2 font-size-16 line-height"> <?= $user_website ?> </p>
                     </a>
                  </li>
                  <?php endif; ?>
               </ul>
            </div>
         </div>
         
      </div>
      <?php endif ?>

      <!-- User Notes Section -->
      <div class="<?= ($accountPrivacy == 'private' ? 'col-12' : 'col-lg-8' ) ?> col-sm-12">

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
                     <?= view_cell('UserNoteCell', ['userId' => $user->user_id, 'noteCardClass' => $accountPrivacy == 'private'  ? 'col-lg-4 col-md-4 col-sm-12': 'col-lg-6 col-md-6 col-sm-12']) ?>
                  </div>
               </div>

            </div>

            <div class="card-footer text-right">
               <a href="<?= base_url('notes') ?>" class="btn btn-primary">View All Notes</a>
            </div>
         </div>

      </div>

   </div>

</div>

<?= $this->endSection(); ?>