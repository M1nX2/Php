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
	$f=new DOMDocument('1.0', 'utf-8');
	$s=join(' ',file('data.xml'));
	$f->load("data.xml");
	//var_dump($f->firstChild->childNodes[1]);
	if(isset($_GET['delete']))
	{
		$n=$_GET['delete'];
		for($i=0;$i<count($f->firstChild->childNodes);$i++)
		{
			$item=$f->firstChild->childNodes[$i];
			
			if($item->nodeType==1){
				//var_dump($item);
			//echo($f->firstChild->childNodes[$i]->getAttribute('number'));
			if($item->getAttribute('number')==(int)$n){$item->parentNode->removeChild($item);$i--;}
			}
		}
	}
	else if (isset($_GET['newn'])&&isset($_GET['oldn']))
	{
		$n=$_GET['oldn'];
		for($i=0;$i<count($f->firstChild->childNodes);$i++)
		{
			$item=$f->firstChild->childNodes[$i];
			
			if($item->nodeType==1){
				//var_dump($item);
			//echo($f->firstChild->childNodes[$i]->getAttribute('number'));
			if($item->getAttribute('number')==(int)$n){$item->setAttribute('number',$_GET['newn']);$i--;}
			}
		}
	}
	else if (isset($_GET['addb']))
	{
		$child = $f->createElement('flight','Рейс');
		$f->firstChild->appendChild($child);
		$reis=$f->firstChild->lastChild;
		//var_dump($f->childNodes[count($f->childNodes)-1]);
		$reis->setAttribute('number',$_GET['num']);
		$child = $f->createElement('airplane');

		$child = $f->createElement('airplane');
		$reis->appendChild($child);
		$samolet=$reis->lastChild;
		$samolet->setAttribute('nubmer',$_GET['snum']);
		$samolet->setAttribute('kod',$_GET['skod']);
		$samolet->setAttribute('series',$_GET['sser']);
		$child = $f->createElement('flight','Рейс');
		$child = $f->createElement('airlane');
		$samolet->appendChild($child);
		$avia=$samolet->lastChild;
		$avia->setAttribute('kod',$_GET['akod']);
		$avia->setAttribute('name',$_GET['aname']);
		$child = $f->createElement('client');
		$avia->appendChild($child);
		$pas=$avia->lastChild;
		$pas->setAttribute('kod',$_GET['pkod']);
		$pas->setAttribute('FIO',$_GET['pfio']);
		$pas->setAttribute('pasport',$_GET['ppas']);
		$child = $f->createElement('place');
		$pas->appendChild($child);
		$mes=$pas->lastChild;
		$mes->setAttribute('number',$_GET['mnum']);
		$mes->setAttribute('class',$_GET['mclass']);

		$child = $f->createElement('route');
		$reis->appendChild($child);
		$mar=$reis->lastChild;
		$mar->setAttribute('kod',$_GET['markod']);
		$child = $f->createElement('departure');
		$mar->appendChild($child);
		$dep=$mar->lastChild;
		$dep->setAttribute('kod',$_GET['okod']);
		$dep->setAttribute('name',$_GET['oname']);
		$child = $f->createElement('arrival');
		$mar->appendChild($child);
		$ar=$mar->lastChild;
		$ar->setAttribute('kod',$_GET['prkod']);
		$ar->setAttribute('name',$_GET['prname']);
	}
	
	$f->childNodes[0]->setAttribute('series','042');
	$d=$f;
	$f=$f->firstChild;
	//var_dump($f->nodeName);
	//var_dump($f->childNodes[3]);
	//echo($f->childNodes[3]==XML_TEXT_NODE);
	//echo($f->childNodes[1]->nodeType);
	//var_dump($f->childNodes[1]->getAttribute('number'));
	foreach($f->childNodes as $child1)
	{
		if($child1->nodeType==1){
		//var_dump($child1);
		//echo $child1->getAttribute('number');
		//echo $child1->number;
		//echo"aaa";
		echo"<h1>"."Рейс".' '.$child1->getAttribute('number')."</h1>";
		echo"<ul>";
		foreach($child1->childNodes as $child2)
		{
			if($child2->nodeType==1){
			//var_dump($child2);
			echo"<br><br>";
			if($child2->nodeName=='airplane')
			{
			echo '<li>Самолёт '.' '.$child2->getAttribute('series').' '.$child2->getAttribute('nubmer')."</li>";
			echo"<ul>";
			foreach($child2->childNodes as $child3)
			{
				if($child3->nodeType==1){
				echo"<li>Авиакомпания ".$child3->getAttribute('name')."</li>";
				echo"<ul>";
				foreach($child3->childNodes as $child4)
				{
					if($child4->nodeType==1){
					echo"<li>Пассажир: ".$child4->getAttribute('FIO').", паспорт:".$child4->getAttribute('pasport')."</li>";
					echo"<ul>";
					foreach($child4->childNodes as $child5)
					{
						if($child5->nodeType==1){
						echo"<li>Место номер ".$child5->getAttribute('number').', класс: '.$child5->getAttribute('class')."</li>";
					}
				}
					echo"</ul>";
				}
			}
				echo"</ul>";
			}
		}
			echo"</ul>";
			}
			else if($child2->nodeName=='route')
			{
			echo '<li>Маршрут '.$child2->getAttribute('kod')."</li>";
			echo"<ul>";
			foreach($child2->childNodes as $child3)
			{
				if($child3->nodeType==1){
				if($child3->nodeName=='departure')
				{
					echo '<li>Отправка '.$child3->getAttribute('kod').', '.$child3->getAttribute('name')."</li>";
				}
				else if($child3->nodeName=='arrival')
				{
					echo '<li>Прибытие '.$child3->getAttribute('kod').', '.$child3->getAttribute('name')."</li>";
				}
			}
			}
			echo"</ul>";
			}
			//var_dump($child2->attributes());
		}
	}
		echo"</ul>";
	}
}
	$d->save('data.xml');
	?>
</body>
</html>