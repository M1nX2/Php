<!DOCTYPE html>
<html>
<head>
	<title>Form entry</title>
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
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <p>Логин <input name="login"> <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                <p>Пароль <input type="text" name="password"> <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>   <span style="color:red"> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    <p><button type="submit">Войти</button>
                <?php echo e(csrf_field()); ?>

            </form>
            <form method="POST" action="<?php echo e(route('registration')); ?>">
            <p><button type="submit">Зарегистрироваться</button>
                <?php echo e(csrf_field()); ?>

            <p style="color:red;"><?php echo e($err); ?></p>
            <p style="color:green;"><?php echo e($access); ?></p>
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
</html><?php /**PATH C:\OpenServer\domains\Last\resources\views/enter.blade.php ENDPATH**/ ?>