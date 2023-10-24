

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><?php echo e(__('Show Company')); ?></div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Sr No</th>
                            <th>Compny Name</th>
                            <th>Compny Email</th>
                            <th>Compny Logo</th>
                            <th>Compny Website</th>
                            <th>Action</th>
                        </tr>
                        <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($v->id); ?></td>
                            <td><?php echo e($v->name); ?></td>
                            <td><?php echo e($v->email); ?></td>
                            <td><?php echo e($v->logo); ?></td>
                            <td><?php echo e($v->website); ?></td>
                            <td><i class="fas fa-edit"></i> <i class="fas fa-trash"></i></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\minicrm\resources\views/edit-company.blade.php ENDPATH**/ ?>