

<?php $__env->startSection('title', 'Marketing URLs'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Urls</div>

                    <div class="card-body">
                        <a href="<?php echo e(route('marketing-urls.create')); ?>" class="btn btn-primary my-2">Create Url</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Slug</th>
                                    <th>Callback ID</th>
                                    <th>Source ID</th>
                                    <th>Free Signups</th>
                                    <th>Callbacks</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($url->slug); ?></td>
                                        <td><?php echo e($url->callback_id); ?></td>
                                        <td><?php echo e($url->source_id); ?></td>
                                        <td><?php echo e($url->freeSignup? 'Yes' : 'No'); ?></td>
                                        <td><?php echo e($url->callbacks? 'Yes' : 'No'); ?></td>
                                        <td><?php echo e($url->visible ? 'Active' : 'Inactive'); ?></td>
                                        <td>
                                            
                                            <a href="<?php echo e(route('marketing-urls.edit', $url)); ?>" class="btn btn-sm btn-secondary">Edit</a>
                                            <form action="<?php echo e(route('marketing-urls.destroy', $url)); ?>" method="POST" style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ideation\deikhodashboard28323\deikhodashboard\resources\views/marketing-urls/index.blade.php ENDPATH**/ ?>