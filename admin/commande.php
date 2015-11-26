<?php
	include('includes/config.php');

	if($_SESSION['connect_admin']==1)
	{
	if(isset($_POST['REMIS']))
	{
		if(!empty($_POST['IDRESA']))
		{
			$reponse=$bdd->query('SELECT * FROM VR_grp1_Reservation WHERE ID =\''.$_POST['IDRESA'].'\'');

			while ($donnees=$reponse->fetch())
			{

				$req = $bdd->prepare('INSERT INTO VR_grp1_Commande (IDUSER, IDJEUX, DATERECUP, DATERETOUR) 
					VALUES(:IDUSER, :IDJEUX, :DATERECUP, :DATERETOUR)');
				
				$req->execute(array(
					'IDUSER' => $donnees['IDUSER'],
					'IDJEUX' => $donnees['IDJEUX'],
					'DATERECUP' => $donnees['DATERECUP'],
					'DATERETOUR' => $donnees['DATERECUP']
				));
			}

			$reponse->closeCursor();

			$bdd->exec('DELETE FROM VR_grp1_Reservation WHERE ID=\''.$_POST['IDRESA'].'\'');
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
			<h2>Commande</h2>
		  	<table>
	  			<tr>
	  				<th>Utilisateur</th>
	  				<th>Jeu</th>
	  				<th>Date réservation</th>
	  				<th>Date recupération</th>
	  			</tr>
	  			<?php
					$reponse = $bdd->query('SELECT * FROM VR_grp1_Reservation p RIGHT JOIN VR_grp1_Users u ON p.IDUSER = u.ID RIGHT JOIN VR_grp1_Jeux j ON p.IDJEUX = j.ID ORDER BY DATERECUP');

					while ($donnees = $reponse->fetch())
					{
						?>
			  			<tr>
					  		<td><?php echo $donnees['NAME']." ".$donnees['FIRST_NAME']; ?></td>
					  		<td><?php echo $donnees['NOM']; ?></td>
							<td><?php echo $donnees['DATERESA']; ?></td>
					  		<td><?php echo $donnees['DATERECUP']; ?></td>
				  			<td><form action="commande.php" method="post">
				  				<input type="hidden" name="IDRESA" value=<?php echo $donnees[0]; ?> />
				  				<input type="submit" name="REMIS" value="Remise Commande"/>
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