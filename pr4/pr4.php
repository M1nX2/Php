<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title>практика 4 в 2</title>
<style>
    .blue{
        color:blue;
    }
    .pink{
        color:pink;
    }
</style>
</head>
<body>
<h1>Дамп</h1>
<form action="" method="GET">
    <label>Код области: <input type="text" name="str"></label><br>
    <input type="submit" value="Подтведрить">
</form>
<?php 
//setlocale(LC_ALL, 'ru_RU');
//error_reporting(E_ALL);
$humans=[];
$str=file_get_contents("OLDBASE.TXT");
//$str=mb_convert_encoding($str, 'utf-8', 'Windows-1251');
//echo $str;
$humans=preg_replace('/[\n].*[^0-9A-Za-zА-Яа-яЁё\.\,\/\@].*[\n]/','\n',$humans);
$humans=preg_split('/[\n]/',$str,-1,PREG_SPLIT_NO_EMPTY);
//echo"<br>";
//print_r($humans);
$parametres=[[]];
$description=['Number','Name','Otch','Surname','Gender','City','Region','Email','Phone','Birthday','Post','Company','Weight','Height','Postal adress','Postal index','Country code'];
foreach($humans as $key=>$value)
{
    $tempstr=explode(',',$value);
    if(count($tempstr)<17)unset($parametres[$key]);
    for($j=0;$j<count($tempstr);$j++)
    {
        $parametres[$key][$description[$j]]=$tempstr[$j];
    }
}
//echo'До изменения';
//echo"<br>";
//print_r($parametres);

$minold=[[0],strtotime($parametres[0]['Birthday'])];
$maxold=[[0],strtotime($parametres[0]['Birthday'])];
$emailcount=[];
$errorphone=0;
$erroradress=0;
for($i=0;$i<count($parametres);$i++)
{
    if(strtotime($parametres[$i]['Birthday'])>$minold[1])
    {
        $minold=[[$i],strtotime($parametres[$i]['Birthday'])];
    }
    elseif(strtotime($parametres[$i]['Birthday'])==$minold[1]&$i!=0)
    {
        array_push($minold[0],$i);
    }
    if(strtotime($parametres[$i]['Birthday'])<$maxold[1])
    {
        $maxold=[[$i],strtotime($parametres[$i]['Birthday'])];
    }
    elseif(strtotime($parametres[$i]['Birthday'])==$maxold[1]&&$i!=0)
    {
        array_push($maxold[0],$i);
    }
    //echo(strtotime($parametres[$i]['Birthday'])." ");
    $tempphone=$parametres[$i]['Phone'];
    $parametres[$i]['Phone']=preg_replace('/[^0-9\-]+/u','',$parametres[$i]['Phone']);
    if($tempphone!=$parametres[$i]['Phone'])$errorphone++;
    //
    $adres=explode(' ',$parametres[$i]['Postal adress']);
    $temp=0;
    $digit;
    if(!preg_match('/[0-9]+\s[A-Za-z\s]+/u',$parametres[$i]['Postal adress']))$erroradress++;
    for($k=0;$k<count($adres);$k++)
    {
        if(preg_match('/[0-9]+/u',$adres[$k]))
        {
        $digit=$adres[$k];
        array_splice($adres,$k,1);
        }
    }
    $parametres[$i]['Postal adress']=implode(' ',$adres).', '.$digit;
    //
    if($parametres[$i]['Gender']=="male")
    {
        $parametres[$i]['Gender']=1;
    }
    if($parametres[$i]['Gender']=="female")
    {
        $parametres[$i]['Gender']=0;
    }
    //
    if(preg_match('/.*@.*/',$parametres[$i]['Email']))
    {
    $mail=preg_replace('/.+@(.+)/','$1',$parametres[$i]['Email']);
    //echo $mail;
    if(!array_key_exists($mail,$emailcount))
    {
        $emailcount[$mail]=0;
    }
    $emailcount[$mail]+=1;
    }
    //array_key_exists($emailcount[$mail],$emailcount)?$emailcount[$mail]
    $strtotime=explode('/',$parametres[$i]['Birthday']);
    //print_r($strtotime);
    if(strlen($strtotime[0])==1)$strtotime[0]="0".$strtotime[0];
    if(strlen($strtotime[1])==1)$strtotime[1]="0".$strtotime[1];
    $parametres[$i]['Birthday']=$strtotime[1].".".$strtotime[0].".".$strtotime[2];
    //echo"<br>";
}
//echo"<br>";
//echo'После изменения';
//echo"<br>";
//print_r($parametres);
$output="";
for($i=0;$i<count($parametres);$i++)
{
    foreach($parametres[$i] as $key=>$value)
    {
        $output.=$value.($key=='Country code'?'':';');
    }
    $output.="\n";
}
file_put_contents("newdata.txt",$output);
//echo $output;
echo"<br>";
echo"Ошибок по полю телефон: $errorphone<br>";
echo"Ошибок по полю адресс: $erroradress<br>";
echo"<br>";
echo"Минимальный возраст: ";
echo"<br>";
for($i=0;$i<count($minold[0]);$i++)echo $parametres[$minold[0][$i]]['Name'].' '.$parametres[$minold[0][$i]]['Phone'].' '.$parametres[$minold[0][$i]]['City'].' '.$parametres[$minold[0][$i]]['Postal adress']."<br>";
echo"<br>";
echo"Максимальный возраст: ";
echo"<br>";
for($i=0;$i<count($maxold[0]);$i++)echo $parametres[$maxold[0][$i]]['Name'].' '.$parametres[$minold[0][$i]]['Phone'].' '.$parametres[$minold[0][$i]]['City'].' '.$parametres[$minold[0][$i]]['Postal adress']."<br>";
//echo"<br>";
echo"Пользователи почтой:<br>";
foreach($emailcount as $key=>$value)
{
    echo($key.": ".$value."<br>");
}
echo"<br>";
if(isset($_GET['str']))
{
    $obl=$_GET['str'];
    usort($parametres, function($a, $b) {
        $i=0;
        if($a['Surname']!=$b['Surname'])
    {
        while($i!=min(strlen($a['Surname']),strlen($b['Surname']))-1&&ord($a['Surname'][$i]) == ord($b['Surname'][$i]))
        {
            $i++;
        }
    }
        return ord($a['Surname'][$i]) - ord($b['Surname'][$i]);
    });
    //print_r($parametres);
    foreach($parametres as $people)
    {
        if($people['Region']==$obl)
        {
            foreach($people as $key=>$value)
            {
                if($key=='Name')
                {
                    if($people['Gender'])$c='blue';
                    else $c='pink';
                    echo"<span class=$c>$value</span>";
                }
                else if($key=='Birthday')
                {
                    echo(date("Y")-date("Y",strtotime($value)));
                }
                else
                {
                    echo $value;
                }
                echo" ";
            }
            echo"<br>";
        }
    }
}
?>
<br>
</body>
</html>