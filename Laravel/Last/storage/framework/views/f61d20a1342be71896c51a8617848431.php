<!DOCTYPE html>
<html>
<head>
	<title>Form master class</title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/styles.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/responsive.css')); ?>">
</head>
<body>
	<div class="header">
		<div class="row grid middle between">
			<div class="logo">
			<img src="<?php echo e(asset('image/logo.png')); ?>">
			</div>
			<div class="title">
				Клуб любителей творчества «ОчУмелые ручки»
			</div>
		</div>
	</div>
	<div class="row row--nogutter">
		<div class="menu-burger">
			<div class="burger">
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>	
	</div>
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	<div class="main">
		<div class="row">
			<div class="row--small">
			<form method="POST" action="<?php echo e(route('add_content')); ?>">
									<h2>Форма добавления мастер-класса</h2>
									<?php if(isset($message)): ?>
									<p><?php echo e($message); ?></p>
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
						<input type="text" name="name_MC" required>
					</div>
					<div class="form-group">
						<label>Описание мастер-класса</label>
						<textarea name='description_MC' value="<?php echo e(old('description_MC')); ?>" required></textarea>
					</div>
					<div class="form-group">
						<label>Дата</label>
						<input type="date" value="<?php echo e(old('date')); ?>" name="date_MC">
					</div>
					<div class="form-group">
						<label>Время</label>
						<select name='time_MC' value="<?php echo e(old('time_MC')); ?>" required>
							<option value='9:00:00'> 9:00</option>
							<option value='11:00:00'> 11:00</option>
							<option value='13:00:00'> 13:00</option>
							<option value='15:00:00'> 15:00</option>
						</select>
					</div>
					<div class="form-group">
						<label>Количество человек в группе</label>
						<input type="number" min=0 value="<?php echo e(old('number')); ?>" name="count_people_MC">
					</div>
					<div class="form-group">
						<label>Стоимость</label>
						<input type="number" min=0 name="cost_MC" value="<?php echo e(old('cost_MC')); ?>">
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
	<div class="footer">
		<div class="row">
			<div class="row--small grid between">
				<div class="address">Наш адрес: ВДНХ, 120в</div>
				<div class="tel">Тел: 89123456765</div>
				<div class="copy">(с) Copyright, 2017</div>
			</div>
		</div>
	</div>
</body>
</html><?php /**PATH C:\OpenServer\domains\Last\resources\views/form__master-class.blade.php ENDPATH**/ ?>