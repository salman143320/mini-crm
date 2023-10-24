

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Add Employee')); ?></div>

                <div class="card-body">
                <?php echo Form::open(array('url' => 'employee')); ?>

                
                <?php echo e(Form::text('fname', '',['class' => 'form-control','placeholder'=>'First Name'])); ?>

                <br>
                <?php echo e(Form::text('lname', '',['class' => 'form-control','placeholder'=>'Last Name'])); ?>

                <br>
                <?php echo e(Form::select('company', array('L' => 'Large', 'S' => 'Small'))); ?>

                <br>
                <?php echo e(Form::email('email', '',['class' => 'form-control','placeholder'=>'Company Email'])); ?>

                <br>
                <?php echo e(Form::text('phone', '',['class' => 'form-control','placeholder'=>'Phone'])); ?>

                <br>
                <?php echo e(Form::submit('Save',['class' => 'btn btn-success'])); ?>

                <?php echo Form::close(); ?>




                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\minicrm\resources\views/add-employee.blade.php ENDPATH**/ ?>