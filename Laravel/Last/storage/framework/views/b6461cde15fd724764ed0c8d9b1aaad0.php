

<?php $__env->startSection('content'); ?>
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	<div class="main">
		<div class="row">
			<form method="POST" action="<?php echo e(route('confirmation_content',['id'=>$mc->id_MC])); ?>">
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
						<p><?php echo e(date('H:i', strtotime($mc->date_MC))); ?></p>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Last\resources\views/confirmation.blade.php ENDPATH**/ ?>