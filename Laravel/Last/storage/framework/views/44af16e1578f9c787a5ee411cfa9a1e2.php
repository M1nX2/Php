

<?php $__env->startSection('content'); ?>
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
				<?php if(isset($content)): ?>
				<div class="content">
				<?php else: ?> 
				<div class="content" style="position:relative;visibility:hidden; ">
				<?php endif; ?>
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
						<?php if(strtotime($mc->date_MC) > time()): ?>
						<div class="driver grid">
							<div class="driver-left grid">
								<div class="driver-photo">
									
					<img src="<?php echo e(asset('image')); ?>/<?php echo e($mc->foto_leader); ?>" width=100px>
								</div>
								<div class="driver-text">
									<div class="driver-name"><?php echo e($mc->first_name_leader); ?> <?php echo e($mc->second_name_leader); ?> <?php echo e($mc->patronymic_leader); ?></div>
									<div class="driver-name"><?php echo e($mc->name_MC); ?> </div>
									<div class="driver-desc"><?php echo e($mc->description_MC); ?>

									</div>
									<?php if(isset($admin)&&$admin==1&&isset($zapis)): ?>
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
								</div>
							</div>
							<div class="driver-right">
							<?php if((isset($id_user))): ?>	
							<?php if($admin==0): ?>	
							<?php 
							$check=false;					
							?>	
							<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    							<?php if($record['id_MC'] == $mc->id_MC): ?>
									<?php 
									$check=true;
									break;
									?>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php if(!$check): ?>
								<button class=""><a href='/confirmation/<?php echo e($mc->id_MC); ?>'>Записаться</a></button>
								<?php else: ?>
								<form style="display:inline-block;" action="<?php echo e(route('unsubscribe', ['id' => $mc->id_MC])); ?>" method="POST">
									<?php echo csrf_field(); ?>
									<?php echo method_field('DELETE'); ?>
									<button type="submit"><a>Отписаться</a></button>
								</form>
								<?php endif; ?>
							<?php endif; ?>
							<?php endif; ?>
						
								<div class="driver-time"><?php echo e(date('d.m.Y', strtotime($mc->date_MC))); ?> <?php echo e(date('H:i', strtotime($mc->date_MC))); ?></div>
							</div>	
						</div>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div>
				</div>
			</div>

			<?php endif; ?>
		</div>	
	</div>
<?php $__env->stopSection(); ?>			
<?php echo $__env->make('menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Last\resources\views/category.blade.php ENDPATH**/ ?>