
<?php $__env->startSection('content'); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Event</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	 <?php if($errors->any()): ?>
        <div class="alert alert-danger" style="margin-top: 10px">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if(Session::has('success_message')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    <?php echo e(Session::get('success_message')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        <?php endif; ?>
      	<form name="eventForm" id="eventForm" <?php if(empty($page['id'])): ?> action="<?php echo e(url('admin/add-edit-pages')); ?>" <?php else: ?> action="<?php echo e(url('admin/add-edit-pages/'.$page['id'])); ?>" <?php endif; ?> method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
	        <div class="card card-default">
	          <div class="card-header">
	            <h3 class="card-title"><?php echo e($title); ?></h3>

	            <div class="card-tools">
	              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
	            </div>
	          </div>
	          <!-- /.card-header -->
	          <div class="card-body">
	            <div class="row">           	              	
	              <div class="col-md-6">
	              	<div class="form-group">
	                    <label for="brand_name">Title</label>
	                    <input type="text" class="form-control" name="page_name" id="page_name" <?php if(!empty($page['title'])): ?> value="<?php echo e($page['title']); ?>" <?php else: ?> value="<?php echo e(old('page_name')); ?>" <?php endif; ?> placeholder="Enter Page name">
	                </div>
                  <div class="form-group">
                      <label for="brand_name">CMS Page URL</label>
                      <input type="text" class="form-control" name="url" id="url" <?php if(!empty($page['title'])): ?> value="<?php echo e($page['url']); ?>" <?php else: ?> value="<?php echo e(old('url')); ?>" <?php endif; ?> placeholder="Enter Page name">
                  </div>   	               
	              </div>	
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="brand_name">Description</label>
                     <textarea name="description" id="description" class="textarea" style="width: 700px; height: 100px"><?php echo e($page['description']); ?></textarea>
                  </div>
                  <div class="form-group">
                      <label for="brand_name">Status</label>
                       <input type="checkbox" name="status" id="status" value="1">
                  </div>                   
                </div>


               
	            </div>	            
	          </div>
	          <div class="card-footer">
	            <button type="submit" class="btn btn-primary">Submit</button>
	          </div>
	        </div>
    	</form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/admin/cms_pages/add_edit_pages.blade.php ENDPATH**/ ?>