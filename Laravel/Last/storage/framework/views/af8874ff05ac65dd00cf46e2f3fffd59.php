

<?php $__env->startSection('content'); ?>
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
					<?php elseif(isset($id_user)): ?> <h7><?php echo e($user->FIO_user); ?></h7>
					<?php endif; ?>
				</div>
					<div class="driver-page-text">
						<div class='my'>
						<div class="driver-page-my">Мои мастер-классы</div>
						<table class="driver-page-table">
							<tbody>
							<?php $__currentLoopData = $masterclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    							<?php if(strtotime($mc->date_MC) > time()): ?>
       							 <tr>
									<td><?php echo e(date('d.m.Y H:i', strtotime($mc->date_MC))); ?></td>
									<td>
										<p><?php echo e($mc->name_MC); ?></p>
										
										<?php if(isset($leader)): ?>
											<p>Участники:</p>
											<?php $__currentLoopData = $zapis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($row->id_MC==$mc->id_MC): ?>
													<p>
														<?php echo e($row->FIO_user); ?><br>
														email: <?php echo e($row->email_user); ?> <br>
														tel: <?php echo e($row->telephone_user); ?>

													</p>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									</td>
									<?php if(isset($leader)): ?>
										<td><a href="/change/<?php echo e($mc->id_MC); ?>">Редактировать мастер-класс</a></td>
									<?php endif; ?>
								</tr>
								<?php endif; ?>
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

			</div>

		</div>	
	</div>
	<div class="row row--nogutter">
		<div class="line"></div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Last\resources\views/cabinet.blade.php ENDPATH**/ ?>