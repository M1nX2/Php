

<?php $__env->startSection('content'); ?>
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	
	<div class="main">
	
		<div class="row">
		<a href="<?php echo e(route('cabinet')); ?>">Назад</a>
			<div class="row--small">
			<form method="POST" action="<?php echo e(route('add_content')); ?>">
									<h2>Форма добавления мастер-класса</h2>
									<?php if(isset($message)): ?>
									<p><span style="color:red"><?php echo e($message); ?></p>
									<?php endif; ?>
					<div class="form-group">
						<label>Вид творчества</label>
						<select name='id_category'>
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value='<?php echo e($category->id_category); ?>'> <?php echo e($category->name_category); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="form-group">
						<label>Название</label>
						<input type="text" name="name_MC"  required><?php $__errorArgs = ['name_MC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
						<label>Описание мастер-класса</label>
						<textarea name='description_MC' required><?php echo e(old('description_MC')); ?></textarea> <?php $__errorArgs = ['description_MC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
					<label>Дата</label>
					<input type="date" value="" min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>" name="date_MC" id="date_MC">
					<?php $__errorArgs = ['date_MC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span style="color:red"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>

				<div class="form-group">
					<label>Время</label>
					<select name='time_MC' value="<?php echo e(old('time_MC')); ?>" required id="time_MC">
						<option value=''>Выберите время</option>
					</select>
					<?php $__errorArgs = ['time_MC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span style="color:red"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
					<div class="form-group">
						<label>Количество человек в группе</label>
						<input type="number" min=0 value="<?php echo e(old('count_people_MC')); ?>" name="count_people_MC">
					</div><?php $__errorArgs = ['count_people_MC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					<div class="form-group">
						<label>Стоимость</label>
						<input type="number" min=0 name="cost_MC" value="<?php echo e(old('cost_MC')); ?>">
					</div><?php $__errorArgs = ['cost_MC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
	<script>
 // Функция для отправки AJAX-запроса на сервер
		function getAvailableTimes(date) {
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				// Обновляем список временных интервалов
				document.getElementById('time_MC').innerHTML = xhr.responseText;
			} else {
				console.log('Ошибка: ' + xhr.status);
			}
			}
		};
		xhr.open('GET', '/available-times/' + date, true);
		xhr.send();
		}

		// Обновляем список временных интервалов при изменении даты
		document.getElementById('date_MC').addEventListener('change', function() {
		var date = this.value;
		getAvailableTimes(date);
		});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Last\resources\views/form__master-class.blade.php ENDPATH**/ ?>