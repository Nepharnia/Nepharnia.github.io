<?php
$db=new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
	if(isset($_POST['sup']))
	{
		$idAg	=$_POST['upd'];
		$dat=$_POST['dd'];
		$d_l=explode('-',$dat);
		$mois=$d_l[1];
		$anne=$d_l[0];
		$lien="&annee=".$anne."&mois=".$mois;
		$l=$_POST['lieu'];
		$e=$_POST['event'];
		if($_POST['sup']==1)
			$sql="DELETE FROM agenda WHERE idAg=$idAg";
		else
			$sql="UPDATE agenda SET lieu='$l' , event='$e' WHERE idAg=$idAg";
		$req = $db->query($sql);
		echo $sql;
		header("location:agenda.php?admin&mod$lien");
	}
	else if(isset($_POST['lieu']))
	{
		$dat=$_POST['dd'];
		$l=$_POST['lieu'];
		$e=$_POST['event'];
		$d_l=explode('-',$dat);
		$mois=$d_l[1];
		$anne=$d_l[0];
		$lien="&annee=".$anne."&mois=".$mois;
		$sql="insert into agenda (dt,lieu,event) values('$dat','$l','$e')";
		$req = $db->query($sql);
		echo $sql;
		header("location:agenda.php?admin&add$lien");
	}
	else
	{
		$d=$_GET['dt'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Details de  la date : <?php echo $d;?></title>
</head>
<body>
<h1>Gestion de la date : <?php echo $d;?></h1>
<?php
	$sql="SELECT * FROM agenda WHERE dt='$d'";
	$db=new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
	$req=$db->query($sql);
	$count=$req->rowCount();
	if($count==1)
		while($data= $req->fetch(PDO::FETCH_ASSOC))
		{
			var_dump($data);
			$mod=1;
			$id=$data['idAg'];
			$loc=$data['event'];
			$eve=$data['lieu'];
		}
	else
	{
		$mod=0;
		$loc="";
		$eve="";
	}
?>
<form name="gr" action="gestion.php" method="post"><input type='hidden' id='dd' name='dd' value='<?php echo $d; ?>'>
<table >
        <tr height="50px"><td width="150px"><strong>Evenement</strong></td><td><input type="text" name="lieu" value="<?php echo $loc;?>"/></td></tr>
        <tr height="50px"><td><strong>Lieu</strong></td><td><input type="text" name="event" value="<?php echo $eve;?>"/></td></tr>
        <tr height="50px">
        <?php
			if($mod==0)
				echo "<td colspan='2'><input type='submit' value='Ajouter'></td>";
			else
			{
				echo "<td colspan='2'><input type='submit' value='Modifier'>&nbsp;&nbsp;<input type='button' value='Supprimer' onclick='supp()'>";
				echo "<input type='hidden' id='sup' name='sup' value='0'><input type='hidden' name='upd' value='$id'></td>";
			}
		?>
        </tr>
</table>
</form>
</body></html>
<?php
}
?>
<script type="text/javascript">
function supp()
{
	if(confirm("Etes vous sur de supprimer cette date ?")==true)
	{
		document.getElementById('sup').value=1;
		gr.submit();
	}
}
</script>