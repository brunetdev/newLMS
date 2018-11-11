<?php $__env->startSection('main'); ?>

    <?php if(!is_null($purchased_courses)): ?>
        <h3>My courses</h3>
        <div class="row">

        <?php $__currentLoopData = $purchased_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4><a href="<?php echo e(route('courses.show', [$course->slug])); ?>"><?php echo e($course->title); ?></a>
                        </h4>
                        <p><?php echo e($course->description); ?></p>
                    </div>
                    <div class="ratings">
                        <p>Progress: <?php echo e(Auth::user()->lessons()->where('course_id', $course->id)->count()); ?>

                            of <?php echo e($course->lessons->count()); ?> lessons</p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <hr />

    <?php endif; ?>

    <h3>All courses</h3>
    <div class="row">
    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <img src="http://placehold.it/320x150" alt="">
                <div class="caption">
                    <h4 class="pull-right">$<?php echo e($course->price); ?></h4>
                    <h4><a href="<?php echo e(route('courses.show', [$course->slug])); ?>"><?php echo e($course->title); ?></a>
                    </h4>
                    <p><?php echo e($course->description); ?></p>
                </div>
                <div class="ratings">
                    <p class="pull-right">Students: <?php echo e($course->students()->count()); ?></p>
                    <p>
                        <?php for($star = 1; $star <= 5; $star++): ?>
                            <?php if($course->rating >= $star): ?>
                                <span class="glyphicon glyphicon-star"></span>
                            <?php else: ?>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>