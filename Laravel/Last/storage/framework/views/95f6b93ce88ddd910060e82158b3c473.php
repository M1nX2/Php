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
			<form method="POST" action="<?php echo e(route('confirmation_content')); ?>">
					<h2>Форма подтверждения записи на мастер-класса</h2>			
					<div class="form-group">
                    <input type="hidden" name="id_MC" value="<?php echo e($mc->id_MC); ?>">
                    <input type="hidden" name="id_user" value="<?php echo e($mc->id_user); ?>">
                    <p>Проверьте все данные</p>
                    <div class="form-group">
						<h4>Ваше ФИО</h4>
						<p><span><?php echo e($user->FIO_user); ?></span></p>
					</div>
                    <div class="form-group">
						<h4>Название мастер-класса</h4>
						<p><?php echo e($mc->name_MC); ?></p>
					</div>
                    <div class="form-group">
						<h4>Вид творчества</h4>
                        <p><?php echo e($mc->name_category); ?></p>
					</div>
					<div class="form-group">
						<h4>ФИО мастер</h4>
						<p><?php echo e($mc->first_name_leader); ?> <?php echo e($mc->second_name_leader); ?> <?php echo e($mc->patronymic_leader); ?></p>
					</div>
					<div class="form-group">
						<h4>Дата</h4>
						<p><?php echo e(date('d.m.Y', strtotime($mc->date_MC))); ?> </p>
					</div>
					<div class="form-group">
						<h4>Время</h4>
						<p><?php echo e(date('H:i', strtotime($mc->time_MC))); ?></p>
					</div>
					<div class="form-group">
						<button class="btn" type="submit">Подтвердить</button>
					</div>
					
					<?php echo e(csrf_field()); ?>

				</form>

		
				
			</div>
			<div class="row">
			<form method="POST" action="<?php echo e(route('cancel')); ?>">
                <div class="form-group">
				<input type="hidden" name="id_MC" value="<?php echo e($mc->id_MC); ?>">
                    <input type="hidden" name="id_user" value="<?php echo e($mc->id_user); ?>">
						<button class="btn" type="submit">Отмена</a></button>
					</div>
					<?php echo e(csrf_field()); ?>

					</form>
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
</html><?php /**PATH C:\OpenServer\domains\Last\resources\views/confirmation.blade.php ENDPATH**/ ?>