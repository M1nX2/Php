

<?php $__env->startSection('content'); ?>
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	<div class="main">
		<div class="row">
			<div class="row--small">
				<form method="POST" action="<?php echo e(route('reg')); ?>">
					<h2>Форма регистрации</h2>
					<div class="form-group">
						<label>ФИО</label>
						<input name="FIO" value="<?php echo e(old('FIO')); ?>" ><?php $__errorArgs = ['FIO'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input name="email_user" value="<?php echo e(old('email_user')); ?>"  > <?php $__errorArgs = ['email_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
					</div>
					<div class="form-group">
						<label>Пароль</label>
						<input type="password" name="password_user" value="<?php echo e(old('password')); ?>" > <?php $__errorArgs = ['password_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
					</div>
					<div class="form-group">
						<label>Номер телефона</label>
						<input type="tel" name="telephone_user" value="<?php echo e(old('tel')); ?>" > <?php $__errorArgs = ['telephone_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
					</div>
					<div class="form-group">
						<button class="btn">Зарегистрироваться</button>
						<?php echo e(csrf_field()); ?>

					</div>
				</form>
			</div>
		</div>	
	</div>
	<div class="row row--nogutter">
		<div class="line"></div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Last\resources\views/form__reg.blade.php ENDPATH**/ ?>