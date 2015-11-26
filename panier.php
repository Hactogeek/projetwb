<?php
	//Vérifier si la date de recup est supérieur a la date de resa
	//Vérifier si l'utilisateur est connecté

	include('includes/config.php');
	if(isset($_POST['CONFIRMRESA']))
	{
		if(!empty($_POST['DATERECUP']))
		{
			$joursem = array('dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam');
			// extraction des jour, mois, an de la date
			list($date, $time) = explode('T', $_POST['DATERECUP']);
			list($jour, $mois, $annee) = explode('-', $date);
			list($heure, $minute) = explode(':', $time);
			// calcul du timestamp
			$timestamp = mktime (0, 0, 0, $mois, $jour, $annee);

			/*$dateReservation = date("Y-m-d\TH:i");
			list($dateResa, $timeResa) = explode('T', $dateReservation);
			list($jourResa, $moisResa, $anneeResa) = explode('-', $dateResa);
			list($heureResa, $minuteResa) = explode(':', $timeResa);*/

		
			if($joursem[date("w",$timestamp)]!='sam' && $joursem[date("w",$timestamp)]!='dim')
			{
				if($heure>=8 && $heure<18)
				{	
					$reponse = $bdd->query('SELECT * FROM VR_grp1_Panier WHERE IDUSER=\''.$_SESSION['ID'].'\'');
					while ($donnees = $reponse->fetch())
					{
						$reponse3 = $bdd->query('SELECT * FROM VR_grp1_Jeux WHERE ID=\''.$donnees['IDJEUX'].'\'');
						while ($donnees3 = $reponse3->fetch())
						{
							if($donnees3['STOCK']!=0)
							{
								$reponse2= $bdd->prepare('INSERT INTO VR_grp1_Reservation(IDUSER, IDJEUX, DATERESA, DATERECUP) VALUES(:IDUSER, :IDJEUX, :DATERESA, :DATERECUP)');
								$reponse2->execute(array(
									'IDUSER' => $_SESSION['ID'],
									'IDJEUX' => $donnees['IDJEUX'],
									'DATERESA' => date("Y-m-d\TH:i"),
									'DATERECUP' => $_POST['DATERECUP']
									));
								$reponse2->closeCursor();
								
								$reponse4 = $bdd->prepare('UPDATE VR_grp1_Jeux SET STOCK = :NVSTOCK WHERE ID =\''.$donnees3['ID'].'\'');
								$reponse4->execute(array(
									'NVSTOCK' => $donnees3['STOCK']-1
									));
								$reponse4->closeCursor();
								$bdd->exec('DELETE FROM VR_grp1_Panier WHERE ID=\''.$donnees['ID'].'\'');
							}
						}
						$reponse3->closeCursor();
					}
					$reponse->closeCursor();
				}	
				else 
					$erreur=2;
			}
			else
				$erreur=1;
		}
	}
	if(isset($_POST['SUPPRIMERTRAITEMENT']))
	{
		$bdd->exec('DELETE FROM VR_grp1_Panier WHERE ID=\''.$_POST['ID'].'\'');

		header("Location: panier.php");
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
  			<article>
  				<h2>Panier</h2>
	  			<p>Attention certains jeux peuvent ne plus être disponible lors de la confirmation de réservation.</p>
	  			<?php
					if(isset($_POST['SUPPRIMER']))
					{
						$reponse = $bdd->query('SELECT * FROM VR_grp1_Panier p RIGHT JOIN VR_grp1_Jeux j ON p.IDJEUX = j.ID WHERE p.ID=\''.$_POST['ID'].'\'');

						while ($donnees = $reponse->fetch())
						{
							?>
							<article>
								<h3>Confirmer la suppression du panier du jeu : <?php echo $donnees['NOM']; ?></h3>
								<p>La suppresion du jeu est définitive, il ne sera pas possible de re revenir en arrière</p>
								<form action="panier.php" method="post">
									<input type="hidden" value=<?php echo $_POST['ID'] ?> name="ID"/>
									<input type="submit" value="SUPPRIMER" name="SUPPRIMERTRAITEMENT" />
									<input type="submit" value="ANNULER" name="" />
								</form>
							</article>
							<?php
						}

						$reponse->closeCursor();
					}
				?>
	  			<table>
		  			<tr>
		  				<th>Nom</th>
		  				<th>Type</th>
		  				<th>Description</th>
		  				<th>Stock</th>
		  				<th>Supprimer</th>
		  			</tr>
		  			<?php
		  				$reponse = $bdd->query('SELECT * FROM VR_grp1_Panier p RIGHT JOIN VR_grp1_Jeux j ON p.IDJEUX = j.ID WHERE p.IDUSER=\''.$_SESSION['ID'].'\'');

						while ($donnees = $reponse->fetch())
						{
		  					?>
		  					<tr>
						  		<td><?php echo $donnees['NOM']; ?></td>
						  		<td><?php echo $donnees['TYPE']; ?></td>
								<td><?php echo $donnees['DESCRIPTION']; ?></td>
						  		<td><?php echo $donnees['STOCK']; ?></td>
						  		<td><form action="panier.php" method="post">
						  			<input type="hidden" value=<?php echo $donnees[0]; ?> name="ID"/>
						  			<input type="submit" value="Supprimer du panier" name="SUPPRIMER"/>
						  		</form></td>
						  	</tr>
		  					<?php
		  				}
		  			?>
	  			</table>
	  		</article>
	  		<article>
	  			<h3>Confirmer la réservation</h3>
	  			<form action="panier.php" method="post" class="inscription">
	  				<p>Vous pouvez recuperer les réservation tout les jours de semaines du lundi au vendredi de 08h à 18h30.</p>
	  				<?php
	  					if($erreur==1)
	  						echo "Veuillez choisir un jour de semaine.";
	  					elseif($erreur==2)
	  						echo "Veuillez changer d'heure car la boutique sera fermé.";
	  				?>
	  				<label>Date ou vous voulez recuperer votre/vos jeux (AAAA - MM - JJ T HH : MM):<input type="datetime" name="DATERECUP" value="<?php if($erreur!=NULL) echo $_POST['DATERECUP']; else echo date("Y-m-d\TH:i");?>" /></label><br/>
	  				<input type="submit" value="Confirmer la réservation" name="CONFIRMRESA"/>
	  			</form>
	  		</article>
	  	</section>
	  	<footer>

	  	</footer>
	</body>
</html>
