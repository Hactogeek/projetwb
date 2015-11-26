<?php
	// Si le stock est déja complet ?
	//Ajouter +1 a au stock et supprimer ligne dans table commande

	include('includes/config.php');
	
	if($_SESSION['connect_admin']==1)
	{
	if(isset($_POST['RETOUR']))
	{
		if(!empty($_POST['IDCOMMANDE']) && !empty($_POST['IDJEUX']))
		{
			$reponse4 = $bdd->prepare('UPDATE VR_grp1_Jeux SET STOCK = :NVSTOCK WHERE ID =\''.$_POST['IDJEUX'].'\'');
			$reponse4->execute(array(
				'NVSTOCK' => $_POST['STOCK']+1
			));

			$bdd->exec('DELETE FROM VR_grp1_Commande WHERE ID=\''.$_POST['IDCOMMANDE'].'\'');
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<title> - Ludothèque - </title>
	</head>
	<body>
		<?php include("includes/header.php"); ?>
		<section>
			<h2>Retour</h2>
		  	<table>
	  			<tr>
	  				<th>Utilisateur</th>
	  				<th>Jeu</th>
	  				<th>Date récupération</th>
	  				<th>Date retour</th>
	  				<th>Quantité</th>
	  				<th>Stock</th>
	  			</tr>
	  			<?php
					$reponse = $bdd->query('SELECT * FROM VR_grp1_Commande p RIGHT JOIN VR_grp1_Users u ON p.IDUSER = u.ID RIGHT JOIN VR_grp1_Jeux j ON p.IDJEUX = j.ID ORDER BY DATERECUP');

					while ($donnees = $reponse->fetch())
					{
						?>
			  			<tr>
					  		<td><?php echo $donnees['NAME']." ".$donnees['FIRST_NAME']; ?></td>
					  		<td><?php echo $donnees['NOM']; ?></td>
							<td><?php echo $donnees['DATERECUP']; ?></td>
					  		<td><?php echo $donnees['DATERETOUR']; ?></td>
					  		<td><?php echo $donnees['QUANTITE']; ?></td>
					  		<td><?php echo $donnees['STOCK']; ?></td>
				  			<td><form action="retour.php" method="post">
				  				<input type="hidden" name="IDCOMMANDE" value=<?php echo $donnees[0]; ?> />
				  				<input type="hidden" name="IDJEUX" value=<?php echo $donnees['IDJEUX']; ?> />
				  				<input type="hidden" name="STOCK" value=<?php echo $donnees['STOCK']; ?> />
				  				<input type="submit" name="RETOUR" value="RETOUR"/>
			  				</form></td>
					  	</tr>
						<?php
					}

					$reponse->closeCursor();
				?>
	  		</table>
		</section>
	  	<footer>

	  	</footer>
	</body>
</html>
<?php
	}
	else
		header("Location: connexion.php");
?>