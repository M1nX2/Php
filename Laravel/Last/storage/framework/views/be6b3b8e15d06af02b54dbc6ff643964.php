<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
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
			<div class="title"><?php if(isset($content)): ?><?php echo e($content->name_category); ?>

				<?php else: ?> Выберите категорию
				<?php if(isset($message)): ?>
				<p><?php echo e($message); ?></p>
				<?php endif; ?>
				<?php endif; ?></div>
				
			<div class="row--small grid between">
				<div class="content">
				<?php if(isset($content)): ?>
					<img src="<?php echo e(asset('image')); ?>/<?php echo e($content->foto_category); ?>">
					<p><?php echo e($content->description1); ?></p>
					<p><?php echo e($content->description2); ?></p>
					<p><?php echo e($content->description3); ?></p>
					<p><?php echo e($content->description4); ?></p>
					<?php endif; ?>
				</div>
				<ul class="menu">
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="/category/<?php echo e($category->id_category); ?>"><?php echo e($category->name_category); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<div class="row shedule">
			<?php if(isset($content)): ?>
				<div class="row--small">
					<h2>Расписание</h2>
					<div class="drivers">
						<?php $__currentLoopData = $masterclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="driver grid">
							<div class="driver-left grid">
								<div class="driver-photo">
									
					<img src="<?php echo e(asset('image')); ?>/<?php echo e($mc->foto_leader); ?>">
								</div>
								<div class="driver-text">
									<div class="driver-name"><?php echo e($mc->first_name_leader); ?> <?php echo e($mc->second_name_leader); ?> <?php echo e($mc->patronymic_leader); ?></div>
									<div class="driver-name"><?php echo e($mc->name_MC); ?> </div>
									<div class="driver-desc"><?php echo e($mc->description_MC); ?>

									</div>
								</div>
							</div>
							<div class="driver-right">
							<?php if($admin==0): ?>
								<button class="driver-btn"><a href='/confirmation/<?php echo e($mc->id_MC); ?>'>записаться</a></button>
							<?php endif; ?>
								<div class="driver-time"><?php echo e(date('d.m.Y', strtotime($mc->date_MC))); ?> <?php echo e(date('H:i', strtotime($mc->time_MC))); ?></div>
							</div>	
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div>
				</div>
			</div>

			<?php endif; ?>
		</div>	
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
</html><?php /**PATH C:\OSPanel\domains\MC\resources\views/category.blade.php ENDPATH**/ ?>