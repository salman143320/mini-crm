

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Add Company')); ?></div>

                <div class="card-body">
                <?php echo Form::open(array('url' => 'save-company')); ?>

                
                <?php echo e(Form::text('name', '',['class' => 'form-control','placeholder'=>'Company Name'])); ?>

                <br>
                <?php echo e(Form::email('email', '',['class' => 'form-control','placeholder'=>'Company Email'])); ?>

                <br>
                <?php echo e(Form::file('file',['class' => 'form-control','placeholder'=>'Company Logo'])); ?>

                <br>
                <?php echo e(Form::text('website', '',['class' => 'form-control','placeholder'=>'Company Website'])); ?>

                <br>
                <?php echo e(Form::submit('Save',['class' => 'btn btn-success'])); ?>

                <?php echo Form::close(); ?>




                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\minicrm\resources\views/add-company.blade.php ENDPATH**/ ?>