<?php
	include('includes/config.php');
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
  			<h2>Inventaire</h2>
	  		<table>
	  			<tr>
	  				<th>Image</th>
	  				<th>Nom</th>
	  				<th>Description</th>
	  				<th>Age</th>
	  				<th>Stock</th>
	  				<th>Réservation</th>
	  			</tr>
	  			<?php
					$reponse = $bdd->query('SELECT * FROM VR_grp1_Jeux');

					while ($donnees = $reponse->fetch())
					{
						?>
			  			<tr>
					  		<td><?php echo $donnees['NOM']; ?></td>
					  		<td><?php echo $donnees['DESCRIPTION']; ?></td>
							<td><?php echo $donnees['TYPE']; ?></td>
					  		<td><?php echo $donnees['AGE']; ?></td>
					  		<td><?php echo $donnees['QUANTITE']; ?></td>
					  		<td><?php echo $donnees['STOCK']; ?></td>
					  		<?php
					  			if($_SESSION['connect']==1)
					  			{
					  				?>
						  			<td><form action="reserver.php" method="post">
						  				<input type="hidden" name="ID" value=<?php echo $donnees['ID']; ?> />
						  				<input type="submit" name="RESERVER" value="RESERVER"/>
						  			</form></td>
					  				<?php
					  			}
					  		?>
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
