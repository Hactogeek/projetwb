<?php
	include('includes/config.php');

	if(isset($_POST['RESERVER']))
	{
		$req = $bdd->prepare('INSERT INTO VR_grp1_Panier(IDUSER, IDJEUX) VALUES(:IDUSER, :IDJEUX)');
		$req->execute(array(
			'IDUSER' => $_SESSION['ID'],
			'IDJEUX' => $_POST['ID']
			));
		header("Location: index.php");
	}
?>