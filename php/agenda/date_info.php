<?php
	$d=$_GET['dt'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/style_agenda.css" rel="stylesheet" type="text/css" />
<title>Details de  la date : <?php echo $d;?></title>
</head>
<body>
<h1>Detail de la date : <?php echo $d;?></h1>
<?php
	$sql="SELECT * FROM agenda WHERE dt='$d'";
	$db=new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
	$req=$db->query($sql);
	$count=$req->rowCount();
	
	if($count == 0)
		echo "Aucune information pour cette date";
	else
		while($data=$req->fetch(PDO::FETCH_ASSOC))
		{
?>
        <table >
        <tr height="50px"><td width="150px"><strong>Evenement</strong></td><td><?php echo $data['event'];?></td></tr>
        <tr height="50px"><td><strong>Lieu</strong></td><td><?php echo $data['lieu'];?></td></tr>
        </table>
<?php
		}
?>
</body>
</html>
