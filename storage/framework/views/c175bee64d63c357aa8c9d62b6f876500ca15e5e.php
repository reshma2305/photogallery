
<form action="<?php echo e(route('email/send')); ?>" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">General Information</div>
                <div class="card-body">
                    <div class="form-group">
                
                    
                    <div id="person">
						 <select name="person" class="form-control">
                            <option value="">select</option>
                            <?php $__currentLoopData = App\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>        
                    </div>
                        
                    </div>
                    <input type="file" name="file[]">
                    <div class="form-group">
                        <textarea name="body" class="form-control"></textarea>
                    </div>
                    
            <br>
            <div class="form-group">
                <button class="btn btn-primary " type="submit">Submit</button>
            </div>
        </div>
      
    </div>
</form><?php /**PATH C:\xampp\htdocs\photographer\resources\views/email.blade.php ENDPATH**/ ?>