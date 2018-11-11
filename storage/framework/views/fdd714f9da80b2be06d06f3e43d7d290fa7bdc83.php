<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>">
                    <i class="fa fa-wrench"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.app_dashboard'); ?></span>
                </a>
            </li>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.user-management.title'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                <li class="<?php echo e($request->segment(2) == 'permissions' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.permissions.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('global.permissions.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                <li class="<?php echo e($request->segment(2) == 'roles' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.roles.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('global.roles.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                <li class="<?php echo e($request->segment(2) == 'users' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.users.index')); ?>">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('global.users.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'courses' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.courses.index')); ?>">
                    <i class="fa fa-gears"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.courses.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lesson_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'lessons' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.lessons.index')); ?>">
                    <i class="fa fa-gears"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.lessons.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('question_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'questions' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.questions.index')); ?>">
                    <i class="fa fa-question"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.questions.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('questions_option_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'questions_options' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.questions_options.index')); ?>">
                    <i class="fa fa-gears"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.questions-options.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('test_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'tests' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.tests.index')); ?>">
                    <i class="fa fa-gears"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.tests.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            

            

            

            <li class="<?php echo e($request->segment(1) == 'change_password' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('auth.change_password')); ?>">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.app_logout'); ?></span>
                </a>
            </li>
        </ul>
    </section>
</aside>
<?php echo Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

<button type="submit"><?php echo app('translator')->getFromJson('global.logout'); ?></button>
<?php echo Form::close(); ?>

