<?php $__env->startSection('sidebar'); ?>
    <p class="lead"><?php echo e($lesson->course->title); ?></p>

    <div class="list-group">
        <?php $__currentLoopData = $lesson->course->publishedLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('lessons.show', [$list_lesson->course_id, $list_lesson->slug])); ?>" class="list-group-item"
                <?php if($list_lesson->id == $lesson->id): ?> style="font-weight: bold" <?php endif; ?>><?php echo e($loop->iteration); ?>. <?php echo e($list_lesson->title); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <h2><?php echo e($lesson->title); ?></h2>

    <?php if($purchased_course || $lesson->free_lesson == 1): ?>
        <?php echo $lesson->full_text; ?>


        <?php if($test_exists): ?>
            <hr />
            <h3>Test: <?php echo e($lesson->test->title); ?></h3>
            <?php if(!is_null($test_result)): ?>
                <div class="alert alert-info">Your test score: <?php echo e($test_result->test_result); ?></div>
            <?php else: ?>
            <form action="<?php echo e(route('lessons.test', [$lesson->slug])); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <?php $__currentLoopData = $lesson->test->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <b><?php echo e($loop->iteration); ?>. <?php echo e($question->question); ?></b>
                    <br />
                    <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="radio" name="questions[<?php echo e($question->id); ?>]" value="<?php echo e($option->id); ?>" /> <?php echo e($option->option_text); ?><br />
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <br />
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <input type="submit" value=" Submit results " />
            </form>
            <?php endif; ?>
            <hr />
        <?php endif; ?>
    <?php else: ?>
        Please <a href="<?php echo e(route('courses.show', [$lesson->course->slug])); ?>">go back</a> and buy the course.
    <?php endif; ?>

    <?php if($previous_lesson): ?>
        <p><a href="<?php echo e(route('lessons.show', [$previous_lesson->course_id, $previous_lesson->slug])); ?>"><< <?php echo e($previous_lesson->title); ?></a></p>
    <?php endif; ?>
    <?php if($next_lesson): ?>
        <p><a href="<?php echo e(route('lessons.show', [$next_lesson->course_id, $next_lesson->slug])); ?>"><?php echo e($next_lesson->title); ?> >></a></p>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>