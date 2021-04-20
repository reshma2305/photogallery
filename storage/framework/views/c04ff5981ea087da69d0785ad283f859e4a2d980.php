<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo e(asset('images/admin_images/Photography-Llogo_white.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
     <!--  <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    </a>
<BR/>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(asset('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image)); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo e(ucwords(Auth::guard('admin')->user()->name)); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if(Session::get('page')=='dashboard'): ?>
            <?php $active="active" ;?>
          <?php else: ?>
            <?php $active=""; ?>
          <?php endif; ?>   
          <li class="nav-item">           
            <a href="<?php echo e(url('admin/dashboard')); ?>" class="nav-link <?php echo e($active); ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>            
          </li>
          <?php if(Session::get('page')=='settings' || Session::get('page')=='update-admin-details'): ?>
            <?php $active="active" ;?>
          <?php else: ?>
            <?php $active=""; ?>
          <?php endif; ?>     
          <li class="nav-item has-treeview menu-open">           
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if(Session::get('page')=='settings'): ?>
                <?php $active="active" ;?>
              <?php else: ?>
                <?php $active=""; ?>
              <?php endif; ?> 
              <li class="nav-item">
                <a href="<?php echo e(url('admin/settings')); ?>" class="nav-link <?php echo e($active); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Password</p>
                </a>
              </li>
              <?php if(Session::get('page')=='update-admin-details'): ?>
                <?php $active="active" ;?>
              <?php else: ?>
                <?php $active=""; ?>
              <?php endif; ?> 
              <li class="nav-item">
                <a href="<?php echo e(url('admin/update-admin-details')); ?>" class="nav-link <?php echo e($active); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Details</p>
                </a>
              </li>             
            </ul>
          </li>
    
             <!-- Catalogues -->
          <?php if(Session::get('page')=="event" || Session::get('page')=="album"): ?>
              <?php $active="active"; ?>
          <?php else: ?>
              <?php $active=""; ?>
          <?php endif; ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Catalogues
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if(Session::get('page')=="event"): ?>
              <?php $active="active"; ?>
              <?php else: ?>
                  <?php $active=""; ?>
              <?php endif; ?>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/events')); ?>" class="nav-link <?php echo e($active); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Events</p>
                </a>
              </li> 

              <?php if(Session::get('page')=="album"): ?>
              <?php $active="active"; ?>
              <?php else: ?>
                  <?php $active=""; ?>
              <?php endif; ?>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/albums')); ?>" class="nav-link <?php echo e($active); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Album</p>
                </a>
              </li>

              <?php if(Session::get('page')=="cms"): ?>
              <?php $active="active"; ?>
              <?php else: ?>
                  <?php $active=""; ?>
              <?php endif; ?>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/cms-pages')); ?>" class="nav-link <?php echo e($active); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CMS Pages</p>
                </a>
              </li> 

              <?php if(Session::get('page')=="enqurie"): ?>
              <?php $active="active"; ?>
              <?php else: ?>
                  <?php $active=""; ?>
              <?php endif; ?>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/enquries')); ?>" class="nav-link <?php echo e($active); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enquries</p>
                </a>
              </li>   

               <?php if(Session::get('page')=="services"): ?>
              <?php $active="active"; ?>
              <?php else: ?>
                  <?php $active=""; ?>
              <?php endif; ?>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/services')); ?>" class="nav-link <?php echo e($active); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Services</p>
                </a>
              </li>       
            </ul>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/layouts/admin_layout/admin_sidebar.blade.php ENDPATH**/ ?>