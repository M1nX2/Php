<!DOCTYPE html>
<html>
<head>
	<title>Cabinet</title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/styles.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/responsive.css')); ?>">
</head>
<body class="dp">
	<div class="header">
		<div class="row grid middle between">
			<div class="logo">
				<img src="<?php echo e(asset('image/logo.png')); ?>">
			</div>
			<div class="title">
				Клуб любителей творчества «ОчУмелые ручки»
			</div>
			<div class="auth">
			<?php if(isset($id_user)): ?>
				
				<a href="/cabinet">Личный кабинет</a>
				<a href="/exit">Выход</a>
				<?php else: ?>
				<a href="/enter">Вход</a>
				<?php endif; ?>
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
	<div class="main">
		<div class="row">
			<div class="hover"></div>
			<div class="title"></div>
			<div class="row--small grid between">
				<div class="content driver-page">
					<div class="driver-page-photo">
					<?php if(isset($leader)): ?><img src="<?php echo e(asset('image')); ?>/<?php echo e($leader->foto_leader); ?>"><?php endif; ?>
					</div>	
					<div class="driver-page-name">
					<?php if(isset($leader)): ?>
					<h3><?php echo e($leader->first_name_leader); ?> <?php echo e($leader->second_name_leader); ?> <?php echo e($leader->patronymic_leader); ?></h3>
					<?php else: ?> <h5><?php echo e($user->FIO_user); ?></h5>
					<?php endif; ?>
				</div>
					<div class="driver-page-text">
						<div class='my'>
						<div class="driver-page-my">Мои мастер-классы</div>
						<table class="driver-page-table">
							<tbody>
								<?php $__currentLoopData = $masterclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e(date('d.m.Y', strtotime($mc->date_MC))); ?> <?php echo e(date('H:i', strtotime($mc->time_MC))); ?></td>
									<td>
										<p><?php echo e($mc->name_MC); ?></p>
										<?php if(isset($leader)): ?>
										<p>Участники:</p>
										<?php $__currentLoopData = $part; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($parts->id_MC==$mc->id_MC): ?>
										<p>
											 <?php echo e($parts->FIO_user); ?><br>
										 	email: <?php echo e($parts->email_user); ?> <br>
										 	tel: <?php echo e($parts->telephone_user); ?>

										</p>
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									
									</td>
									<?php if(isset($leader)): ?>
									<td><a href="/change/<?php echo e($mc->id_MC); ?>">Редактировать мастер-класс</a></td>
									<?php endif; ?>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
</div>
					<div class="driver-page-btn-wrapper">
					<?php if(isset($leader)): ?>
						<div class="driver-page-btn btn">
						<a href="/add">Добавить мастер-класс</a>
						</div>
		<?php endif; ?>
					</div>
				</div>
				<ul class="menu">
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="/category/<?php echo e($category->id_category); ?>"><?php echo e($category->name_category); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
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
</html><?php /**PATH C:\OSPanel\domains\MC\resources\views/cabinet.blade.php ENDPATH**/ ?>