

<?php $__env->startSection('content'); ?>
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	<div class="main">
		<div class="row">
		<a href="<?php echo e(route('cabinet')); ?>">Назад</a>
			<div class="row--small">
			<form method="POST" action="<?php echo e(route('change_content')); ?>">
									<h2>Форма редактирования мастер-класса</h2>
						<label><?php echo e($mc->name_MC); ?></label>
					<div class="form-group">
                    <input type="hidden" name="id_MC" value="<?php echo e($mc->id_MC); ?>">
						<label>Описание мастер-класса</label>
						<textarea name='description_MC' required><?php echo $mc->description_MC ?></textarea><?php $__errorArgs = ['description_MC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
						<label>Стоимость</label>
						<input type="number" min=0 name="cost_MC" value='<?php echo e($mc->cost_MC); ?>'>
						<?php $__errorArgs = ['cost_MC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
						<button class="btn" type='submit'>Отправить</button>
					</div>
					<?php echo e(csrf_field()); ?>

				</form>
			</div>
		</div>
	</div>
	<div class="row row--nogutter">
		<div class="line"></div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Last\resources\views/change-form.blade.php ENDPATH**/ ?>