<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ПР2В3</title>
<link href="style1.css" rel="stylesheet">
<style>
	form{
	display:inline-block;
	margin:50px,auto,50px,auto;
}
.log{
	padding-left:5px;
	margin: 5px 0;
	width:155px;
	border:1px solid #75c9f3;
	height:25px;
}

form p{
	display:inline-block;
	vertical-align:middle;

}
form{
	border: 1px solid blue;
	padding:5px;
	margin:20px 0px;
}
.forms{
	float:right;
}
</style>
</head>
<body>
	<div class="forms">
	
		<form class="f1" method="GET" action="">
			<p>
				Номер рейса<input type="text" name="delete" class="log"><br>
			</p>
			<input type="submit" value="Удалить" name="delb" class="but1 bluebut">
	</form>
	<br>
	<form class="f1" method="GET" action="">
			<p>
				Старый номер рейса<input type="text" name="oldn" class="log"><br>
				Новый номер рейса<input type="text" name="newn" class="log"><br>
			</p>
			<input type="submit" value="Изменить" name="upb" class="but1 bluebut">
	</form>
	<br>
	<form class="f1" method="GET" action="">
			<p>
				Номер рейса <input type="text" name="num" class="log"><br>
				Самолёт код <input type="text" name="skod" class="log"><br>
				Самолёт серия <input type="text" name="sser" class="log"><br>
				Самолёт номер <input type="text" name="snum" class="log"><br>
				Авиакомпания код <input type="text" name="akod" class="log"><br>
				Авиакомпания название <input type="text" name="aname" class="log"><br>
				Пассажир Код <input type="text" name="pkod" class="log"><br>
				Пассажир ФИО <input type="text" name="pfio" class="log"><br>
				Пассажир паспорт <input type="text" name="ppas" class="log"><br>
				Место номер <input type="text" name="mnum" class="log"><br>
				Место класс <input type="text" name="mclass" class="log"><br>
				Маршрут код <input type="text" name="markod" class="log"><br>
				Отправление код <input type="text" name="okod" class="log"><br>
				Отправление название <input type="text" name="oname" class="log"><br>
				Прибытие код <input type="text" name="prkod" class="log"><br>
				Прибытие название <input type="text" name="prname" class="log"><br>
			</p>
			<input type="submit" value="Добавить" name="addb" class="but1 bluebut">
		</form>
</div>
	<?php

	$f=simplexml_load_file('data.xml');
	//var_dump($f->children());
	if(isset($_GET['delete']))
	{
		$n=$_GET['delete'];
		for($i=0;$i<count($f->children());$i++)
		{
			if($f->children()[$i]['number']==(int)$n){unset($f->children()[$i]);$i--;}
		}
	}
	else if (isset($_GET['newn'])&&isset($_GET['oldn']))
	{
		$n=$_GET['oldn'];
		for($i=0;$i<count($f->children());$i++)
		{
			if($f->children()[$i]['number']==(int)$n){$f->children()[$i]['number']=$_GET['newn'];}
		}
	}
	else if (isset($_GET['addb']))
	{
		$f->addChild('flight',"Рейс");
		$reis=$f->children()[count($f->children())-1];
		//var_dump($f->children()[count($f->children())-1]);
		$reis->addAttribute('number',$_GET['num']);
		$reis->addChild('airplane');
		$samolet=$reis->children()[count($reis->children())-1];
		$samolet->addAttribute('number',$_GET['snum']);
		$samolet->addAttribute('kod',$_GET['skod']);
		$samolet->addAttribute('series',$_GET['sser']);
		$samolet->addChild('airlane');
		$avia=$samolet->children()[count($samolet->children())-1];
		$avia->addAttribute('kod',$_GET['akod']);
		$avia->addAttribute('name',$_GET['aname']);
		$avia->addChild('client');
		$pas=$avia->children()[count($avia->children())-1];
		$pas->addAttribute('kod',$_GET['pkod']);
		$pas->addAttribute('FIO',$_GET['pfio']);
		$pas->addAttribute('pasport',$_GET['ppas']);
		$pas->addChild('place');
		$mes=$pas->children()[count($pas->children())-1];
		$mes->addAttribute('number',$_GET['mnum']);
		$mes->addAttribute('class',$_GET['mclass']);

		$reis->addChild('route');
		$mar=$reis->children()[count($reis->children())-1];
		$mar->addAttribute('kod',$_GET['markod']);
		$mar->addChild('departure');
		$dep=$mar->children()[count($mar->children())-1];
		$dep->addAttribute('kod',$_GET['okod']);
		$dep->addAttribute('name',$_GET['oname']);
		$mar->addChild('arrival');
		$ar=$mar->children()[count($mar->children())-1];
		$ar->addAttribute('kod',$_GET['prkod']);
		$ar->addAttribute('name',$_GET['prname']);
	}
	foreach($f->children() as $child1)
	{
		echo"<h1>"."Рейс".' '.$child1['number']."</h1>";
		echo"<ul>";
		foreach($child1->children() as $child2)
		{
			if($child2->getName()=='airplane')
			{
			echo '<li>Самолёт '.' '.$child2['series'].' '.$child2['number']."</li>";
			echo"<ul>";
			foreach($child2->children() as $child3)
			{
				echo"<li>Авиакомпания ".$child3['name']."</li>";
				echo"<ul>";
				foreach($child3->children() as $child4)
				{
					echo"<li>Пассажир: ".$child4['FIO'].", паспорт:".$child4['pasport']."</li>";
					echo"<ul>";
					foreach($child4->children() as $child5)
					{
						echo"<li>Место номер ".$child5['number'].', класс: '.$child5['class']."</li>";
					}
					echo"</ul>";
				}
				echo"</ul>";
			}
			echo"</ul>";
			}
			else if($child2->getName()=='route')
			{
			echo '<li>Маршрут '.$child2['kod']."</li>";
			echo"<ul>";
			foreach($child2->children() as $child3)
			{
				if($child3->getName()=='departure')
				{
					echo '<li>Отправка '.$child3['kod'].', '.$child3['name']."</li>";
				}
				else if($child3->getName()=='arrival')
				{
					echo '<li>Прибытие '.$child3['kod'].', '.$child3['name']."</li>";
				}
			}
			echo"</ul>";
			}
			//var_dump($child2->attributes());
		}
		echo"</ul>";
	}
	$f->asXml('data.xml');
	?>
</body>
</html>