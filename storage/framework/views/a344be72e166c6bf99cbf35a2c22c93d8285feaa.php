<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div id="wrapper">

<?php echo $__env->make('partials.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <?php if(isset($siteTitle)): ?>
                <h3 class="page-title">
                    <?php echo e($siteTitle); ?>

                </h3>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">

                    <?php if(Session::has('message')): ?>
                        <div class="note note-info">
                            <p><?php echo e(Session::get('message')); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($errors->count() > 0): ?>
                        <div class="note note-danger">
                            <ul class="list-unstyled">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
            </div>
        </section>
    </div>
</div>

<?php echo Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

<button type="submit">Logout</button>
<?php echo Form::close(); ?>


<?php echo $__env->make('partials.javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>