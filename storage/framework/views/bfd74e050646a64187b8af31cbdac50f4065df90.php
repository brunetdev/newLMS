<?php $__env->startSection('main'); ?>

    <h2><?php echo e($course->title); ?></h2>

    <?php if($purchased_course): ?>
        Rating: <?php echo e($course->rating); ?> / 5
        <br />
        <b>Rate the course:</b>
        <br />
        <form action="<?php echo e(route('courses.rating', [$course->id])); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <select name="rating">
                <option value="1">1 - Awful</option>
                <option value="2">2 - Not too good</option>
                <option value="3">3 - Average</option>
                <option value="4" selected>4 - Quite good</option>
                <option value="5">5 - Awesome!</option>
            </select>
            <input type="submit" value="Rate" />
        </form>
        <hr />
    <?php endif; ?>

    <p><?php echo e($course->description); ?></p>

    <p>
        <?php if(\Auth::check()): ?>
            <?php if($course->students()->where('user_id', \Auth::id())->count() == 0): ?>
            <form action="<?php echo e(route('courses.payment')); ?>" method="POST">
                <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />
                <input type="hidden" name="amount" value="<?php echo e($course->price * 100); ?>" />
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="<?php echo e(env('PUB_STRIPE_API_KEY')); ?>"
                    data-amount="<?php echo e($course->price * 100); ?>"
                    data-currency="usd"
                    data-name="Quick LMS"
                    data-label="Buy course ($<?php echo e($course->price); ?>)"
                    data-description="Course: <?php echo e($course->title); ?>"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-zip-code="false">
                </script>
                <?php echo e(csrf_field()); ?>

            </form>
            <?php endif; ?>
        <?php else: ?>
            <a href="<?php echo e(route('auth.register')); ?>?redirect_url=<?php echo e(route('courses.show', [$course->slug])); ?>"
               class="btn btn-primary">Buy course ($<?php echo e($course->price); ?>)</a>
        <?php endif; ?>
    </p>


    <?php $__currentLoopData = $course->publishedLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($lesson->free_lesson): ?>(FREE!)<?php endif; ?> <?php echo e($loop->iteration); ?>.
        <a href="<?php echo e(route('lessons.show', [$lesson->course_id, $lesson->slug])); ?>"><?php echo e($lesson->title); ?></a>
        <p><?php echo e($lesson->short_text); ?></p>
        <hr />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>