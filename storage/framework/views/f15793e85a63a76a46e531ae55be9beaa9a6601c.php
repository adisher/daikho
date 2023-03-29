
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    
            <!-- ============================================================== -->
            <div class="card gredient-info-bg m-t-0 m-b-0">
                <div class="card-body">
                    <h4 class="card-title text-white">Welcome <?php echo e(ucfirst(Auth::user()->username)); ?></h4>
                    <h5 class="card-subtitle text-white op-5">Dashboard</h5>
                    <div class="row m-t-30 m-b-20">
                        <!-- col -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="temp d-flex align-items-center flex-row">
                                
                                <div class="m-l-10">
                                    <h3 class="m-b-0 text-white"><?php echo e(\Carbon\Carbon::now()->format('d-M-Y')); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-sm-12 col-lg-8">
                            <div class="row">
                                <!-- col -->
                                <div class="col-sm-12 col-md-4">
                                    <div class="info d-flex align-items-center">
                                        <div class="m-r-10">
                                            <i class="mdi mdi-account text-white display-5 op-5"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white m-b-0">0</h3>
                                            <span class="text-white op-5">Total Users</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                                <!-- col -->
                                <div class="col-sm-12 col-md-4">
                                    <div class="info d-flex align-items-center">
                                        <div class="m-r-10">
                                            <i class="mdi mdi-account-star text-white display-5 op-5"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white m-b-0">0</h3>
                                            <span class="text-white op-5">Active Users</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                                <!-- col -->
                                <div class="col-sm-12 col-md-4">
                                    <div class="info d-flex align-items-center">
                                        <div class="m-r-10">
                                            <i class="mdi mdi-account-off text-white display-5 op-5"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white m-b-0">0</h3>
                                            <span class="text-white op-5">Blacklisted Users</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deikho',Auth::user())): ?>
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">

                                    <a href="<?php echo e(route('deikho-report')); ?>" class="btn btn-lg btn-block font-medium btn-outline-primary block-default">Deikho Report</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <?php endif; ?>
                </div>
            </div>
          
                        <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mini_app/deikhodashboard/resources/views/home.blade.php ENDPATH**/ ?>