

<?php $__env->startSection('content'); ?>
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	<div class="main">
		<div class="row">
			<div class="row--small">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <p>Логин <input name="login"> <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                <p>Пароль <input type="password" name="password"> <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    <p><button type="submit">Войти</button>
                <?php echo e(csrf_field()); ?>

            </form>
            <form method="POST" action="<?php echo e(route('registration')); ?>">
            <p><button type="submit">Зарегистрироваться</button>
                <?php echo e(csrf_field()); ?>

            <p style="color:red;"><?php echo e($err); ?></p>
            <p style="color:green;"><?php echo e($access); ?></p>
            </form>
			</div>
		</div>	
	</div>
	<div class="row row--nogutter">
		<div class="line"></div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Last\resources\views/enter.blade.php ENDPATH**/ ?>