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
                  <img src="/uploads/profile.jpg" class="img-fluid rounded w-100" alt="">
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
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                  scrambled it to make a type specimen book.
               </p>
            </div>
         </div>
      </div>

      <!-- Followers Count -->
      <div class="col-lg-2 col-md-4 col-sm-12">
         <div class="card card-block card-stretch card-height">
            <div class="card-body text-center">
               <h2 class="mb-2 mt-3">424+</h2>
               <h4>Followers</h4>
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
                     <span><i class="mr-3">
                           <svg width="20" class="svg-icon" id="up-01" xmlns="http://www.w3.org/2000/svg" fill="none"
                              viewbox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                              </path>
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                           </svg>
                        </i></span>
                     <p class="mb-0 font-size-16 line-height">505 West Brickyard Rd, CA , USA</p>
                  </li>
                  <li class="mb-3 d-flex">
                     <span><i class="mr-3">
                           <svg width="20" class="svg-icon" id="up-02" xmlns="http://www.w3.org/2000/svg" fill="none"
                              viewbox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                              </path>
                           </svg>
                        </i></span>
                     <p class="mb-0 font-size-16 line-height">+91 01234 56789</p>
                  </li>
                  <li class="mb-3 d-flex">
                     <span><i class="mr-3">
                           <svg width="20" class="svg-icon" id="up-03" xmlns="http://www.w3.org/2000/svg" fill="none"
                              viewbox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76">
                              </path>
                           </svg>
                        </i></span>
                     <p class="mb-0 font-size-16 line-height">john@property.com</p>
                  </li>
                  <li class="mb-3 d-flex">
                     <a href="javascript:void(0);" class="d-flex">
                        <i class="mr-3">
                           <svg width="20" class="svg-icon" id="up-04" xmlns="http://www.w3.org/2000/svg" fill="none"
                              viewbox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                              </path>
                           </svg>
                        </i>
                        <p class="mb-0 font-size-16 line-height">http://www.yourwebsite.com </p>
                     </a>
                  </li>
                  <li class="d-flex">
                     <span><i class="mr-3">
                           <svg width="20" class="svg-icon" id="up-05" xmlns="http://www.w3.org/2000/svg" fill="none"
                              viewbox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                              </path>
                           </svg>
                        </i></span>
                     <p class="mb-0 font-size-16 line-height">9486 Roberts St.
                        Monroe Township.</p>
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

            </div>

            <div class="card-footer text-right">
               <a href="javascript:void();" class="btn btn-primary">View All Notes</a>
            </div>
         </div>

      </div>

   </div>

</div>

<?= $this->endSection(); ?>