<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- chartist CSS -->
    <link href="<?php echo e(asset('assets/libs/chartist/dist/chartist.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')); ?>" rel="stylesheet">
    <!--c3 CSS -->
    <link href="<?php echo e(asset('assets/extra-libs/c3/c3.min.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('assets/dist/css/style.min.css')); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php echo $__env->yieldContent('head'); ?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <?php echo $__env->make('layouts.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="page-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <footer class="footer text-center">
            Deikho Dashboard 2023</a>.
     </footer>
    </div>

      <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- apps -->
    <script src="<?php echo e(asset('assets/dist/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dist/js/app.init.mini-sidebar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dist/js/app-style-switcher.js')); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/extra-libs/sparkline/sparkline.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('assets/dist/js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('assets/dist/js/sidebarmenu.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(asset('assets/dist/js/custom.min.js')); ?>"></script>
    <!--This page JavaScript -->
    <script src="<?php echo e(asset('assets/libs/chartist/dist/chartist.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/extra-libs/c3/d3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/extra-libs/c3/c3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/chart.js/dist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/gaugeJS/dist/gauge.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dist/js/pages/dashboards/dashboard8.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html><?php /**PATH D:\Ideation\deikhodashboard28323\deikhodashboard\resources\views/layouts/base.blade.php ENDPATH**/ ?>