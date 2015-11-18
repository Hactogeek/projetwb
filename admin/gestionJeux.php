<?php
	session_start();

	$dns_bdd="mysql:host=localhost;dbname=webDynamique";		//Adresse du serveur
	$user_bdd="root";											//Id de connection (login)
	$mdp_bdd="root";											//Mot de passe

	try 
	{
		$bdd = new PDO($dns_bdd, $user_bdd, $mdp_bdd);
	}
	catch (Exeption $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	if($_SESSION['connect_admin']==1)
	{
		if(isset($_POST['AJOUTER']))
		{
			if(!empty($_POST['NOM']) && !empty($_POST['AGE']) && !empty($_POST['TYPE']) && !empty($_POST['JOUEUR']) && !empty($_POST['QUANTITE']) && !empty($_POST['DESCRIPTION']))
			{
				$req = $bdd->prepare('INSERT INTO VR_grp1_Jeux(NOM, DESCRIPTION, IMAGE, AGE, TYPE, JOUEUR, QUANTITE, STOCK) 
												VALUES(:NOM, :DESCRIPTION, :IMAGE, :AGE, :TYPE, :JOUEUR, :QUANTITE, :STOCK)');
				$req->execute(array(
					'NOM' => $_POST['NOM'],
					'DESCRIPTION' => $_POST['DESCRIPTION'],
					'IMAGE' => $_POST['DESCRIPTION'],
					'AGE' => $_POST['AGE'],
					'TYPE' => $_POST['TYPE'],
					'JOUEUR' => $_POST['JOUEUR'],
					'QUANTITE' => $_POST['QUANTITE'],
					'STOCK' => $_POST['QUANTITE']
					));
				header("Location: gestionJeux.php");
			}
		}
		elseif(isset($_POST['MODIFIERTRAITEMENT']))
		{
			if(!empty($_POST['NOM']) && !empty($_POST['AGE']) && !empty($_POST['TYPE']) && !empty($_POST['JOUEUR']) && !empty($_POST['QUANTITE']) && !empty($_POST['DESCRIPTION']))
			{
				$req = $bdd->prepare('UPDATE VR_grp1_Jeux SET NOM = :NVNOM, DESCRIPTION = :NVDESCRIPTION, IMAGE, AGE = :NVAGE, TYPE = :NVTYPE, JOUEUR = :NVJOUEUR, QUANTITE = :NVQUANTITE, STOCK = :NVSTOCK) WHERE ID=\''.$_POST['ID'].'\'');
				$req->execute(array(
					'NVNOM' => $_POST['NOM'],
					'NVDESCRIPTION' => $_POST['DESCRIPTION'],
					'IMAGE' => $_POST['DESCRIPTION'],
					'NVAGE' => $_POST['AGE'],
					'NVTYPE' => $_POST['TYPE'],
					'NVJOUEUR' => $_POST['JOUEUR'],
					'NVQUANTITE' => $_POST['QUANTITE'],
					'NVSTOCK' => $_POST['QUANTITE']
					));
				header("Location: gestionJeux.php");
			}
		}
		elseif(isset($_POST['SUPPRIMERTRAITEMENT']))
		{
			$bdd->exec('DELETE FROM VR_grp1_Jeux WHERE ID=\''.$_POST['ID'].'\'');

			header("Location: gestionJeux.php");
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
			<h2>Gestion Des Jeux</h2>

			<?php
				if(isset($_POST['SUPPRIMER']))
				{
					$reponse = $bdd->query('SELECT * FROM VR_grp1_Jeux WHERE ID=\''.$_POST['ID'].'\'');

					while ($donnees = $reponse->fetch())
					{
						?>
						<article>
							<h3>Confirmer la suppression du jeu : <?php echo $donnees['NOM']; ?></h3>
							<p>La suppresion du jeu est définitive, il ne sera pas possible de re revenir en arriière</p>
							<form action="gestionJeux.php" method="post">
								<input type="hidden" value=<?php echo $_POST['ID'] ?> name="ID"/>
								<input type="submit" value="SUPPRIMER" name="SUPPRIMERTRAITEMENT" />
								<input type="submit" value="ANNULER" name="" />
							</form>
						</article>
						<?php
					}

					$reponse->closeCursor();
				}
				if(isset($_POST['MODIFIER']))
				{
					$reponse = $bdd->query('SELECT * FROM VR_grp1_Jeux WHERE ID=\''.$_POST['ID'].'\'');

					while ($donnees = $reponse->fetch())
					{
						?>
							<article>
								<h3>Modification du jeu : <?php echo $donnees['NOM']; ?></h3>
								<form class="modifier" action="gestionJeux.php" method="post" enctype="multipart/form-data">
									<input type="hidden" name="ID" value=<?php echo $donnees['ID']; ?> />
							  		<label>Nom du jeux : <input class="inputInscription" type="text" name="NOM" value=<?php echo $donnees['NOM']; ?> /></label><br/>
							  		<!--<label>Image du jeux :<input class="inputInscription" name="IMAGE" type="file" multiple="false"/></label><br/>-->
							  		<label> Age :
							  			<?php 
							  			if($donnees['AGE']==-3)
							  			{
							  				?>
							  					<select class="selectedInscription" name="AGE">
									  				<option value="-3" selected>-3 ans</option>
									  				<option value="+3">+3 ans</option>
									  				<option value="-10">-10 ans</option>
									  				<option value="+10">+10 ans</option>
									  				<option value="-18">-18 ans</option>
									  				<option value="+18">+18 ans </option>
									  			</select>
							  				<?php
							  			}elseif($donnees['AGE']==3)
							  			{
							  				?>
							  					<select class="selectedInscription" name="AGE">
									  				<option value="-3">-3 ans</option>
									  				<option value="+3" selected>+3 ans</option>
									  				<option value="-10">-10 ans</option>
									  				<option value="+10">+10 ans</option>
									  				<option value="-18">-18 ans</option>
									  				<option value="+18">+18 ans </option>
									  			</select>
							  				<?php
							  			}elseif($donnees['AGE']==-10)
							  			{
							  				?>
							  					<select class="selectedInscription" name="AGE">
									  				<option value="-3">-3 ans</option>
									  				<option value="+3">+3 ans</option>
									  				<option value="-10" selected>-10 ans</option>
									  				<option value="+10">+10 ans</option>
									  				<option value="-18">-18 ans</option>
									  				<option value="+18">+18 ans </option>
									  			</select>
							  				<?php
							  			}elseif($donnees['AGE']==10)
							  			{
							  				?>
							  					<select class="selectedInscription" name="AGE">
									  				<option value="-3">-3 ans</option>
									  				<option value="+3">+3 ans</option>
									  				<option value="-10">-10 ans</option>
									  				<option value="+10" selected>+10 ans</option>
									  				<option value="-18">-18 ans</option>
									  				<option value="+18">+18 ans </option>
									  			</select>
							  				<?php
							  			}
							  			elseif($donnees['AGE']==-18)
							  			{
							  				?>
							  					<select class="selectedInscription" name="AGE">
									  				<option value="-3">-3 ans</option>
									  				<option value="+3">+3 ans</option>
									  				<option value="-10">-10 ans</option>
									  				<option value="+10">+10 ans</option>
									  				<option value="-18" selected>-18 ans</option>
									  				<option value="+18">+18 ans </option>
									  			</select>
							  				<?php
							  			}elseif($donnees['AGE']==18)
							  			{
							  				?>
							  					<select class="selectedInscription" name="AGE">
									  				<option value="-3">-3 ans</option>
									  				<option value="+3">+3 ans</option>
									  				<option value="-10">-10 ans</option>
									  				<option value="+10">+10 ans</option>
									  				<option value="-18">-18 ans</option>
									  				<option value="+18" selected>+18 ans </option>
									  			</select>
							  				<?php
							  			}
							  			?>
							  			
							  		</label><br/>
							  		<label> Type de jeux: 
							  			<?php
							  				if($donnees['TYPE']=="CARTE")
							  				{
							  					?>
							  					<select class="selectedInscription" name="TYPE">
									  				<option value="CARTE" selected>Jeux de carte</option>
									  				<option value="SOCIETE">Jeux de société</option>
									  				<option value="EXTERIEUR">Jeux d'extérieur</option>
									  				<option value="EAU">Jeux d'eau</option>
									  			</select>
							  					<?php
							  				}elseif($donnees['TYPE']=="SOCIETE")
							  				{
							  					?>
							  					<select class="selectedInscription" name="TYPE">
									  				<option value="CARTE">Jeux de carte</option>
									  				<option value="SOCIETE" selected>Jeux de société</option>
									  				<option value="EXTERIEUR">Jeux d'extérieur</option>
									  				<option value="EAU">Jeux d'eau</option>
									  			</select>
							  					<?php
							  				}elseif($donnees['TYPE']=="EXTERIEUR")
							  				{
							  					?>
							  					<select class="selectedInscription" name="TYPE">
									  				<option value="CARTE">Jeux de carte</option>
									  				<option value="SOCIETE">Jeux de société</option>
									  				<option value="EXTERIEUR" selected>Jeux d'extérieur</option>
									  				<option value="EAU">Jeux d'eau</option>
									  			</select>
							  					<?php
							  				}elseif($donnees['TYPE']=="EAU")
							  				{
							  					?>
							  					<select class="selectedInscription" name="TYPE">
									  				<option value="CARTE">Jeux de carte</option>
									  				<option value="SOCIETE">Jeux de société</option>
									  				<option value="EXTERIEUR">Jeux d'extérieur</option>
									  				<option value="EAU" selected>Jeux d'eau</option>
									  			</select>
							  					<?php
							  				}
							  			?>
							  		</label><br/>
							  		<label>Nombre de joueur :<input class="inputInscription" type="number" name="JOUEUR" value=<?php echo $donnees['JOUEUR']; ?> /></label><br/>
							  		<label>Quantité :<input class="inputInscription" type="number" name="QUANTITE" value=<?php echo $donnees['QUANTITE']; ?> /></label><br/>
							  		<label>Description :</label><br/>
							  		<textarea name="DESCRIPTION"><?php echo $donnees['DESCRIPTION']; ?></textarea><br/>
							  		<input type="submit" name="MODIFIERTRAITEMENT" value="Modifier"/>
							  	</form>
							</article><hr/>
						<?php
					}

					$reponse->closeCursor();
				}
			?>

			<article>
				<h3>Liste des jeux</h3>
				<table>
					<tr>
					  	<th>Nom</th>
					  	<th>Description</th>
					  	<th>Type</th>
					  	<th>Age</th>
					  	<th>Quantite</th>
					  	<th>Stock</th>
					  	<th>Modifier</th>
					  	<th>Supprimer</th>
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
					  				<td><form action="gestionJeux.php" method="post" name="MODIFIER">
					  					<input type="hidden" name="ID" value=<?php echo $donnees['ID']; ?> />
					  					<input type="submit" name="MODIFIER" value="MODIFIER"/>
					  				</form></td>
					  				<td><form action="gestionJeux.php" method="post" name="SUPPRIMER">
					  					<input type="hidden" name="ID" value=<?php echo $donnees['ID']; ?> />
					  					<input type="submit" name="SUPPRIMER" value="SUPPRIMER"/>
					  				</form></td>

					  			</tr>
							<?php
						}

						$reponse->closeCursor();
					?>
				</table>
			</article><hr/>
			
			<article>
			  	<h3>Ajouter un jeux</h3>

			  	<form class="inscription" action="gestionJeux.php" method="post" enctype="multipart/form-data">
			  		<label>Nom du jeux : <input class="inputInscription" type="text" name="NOM"/></label><br/>
			  		<!--<label>Image du jeux :<input class="inputInscription" name="IMAGE" type="file" multiple="false"/></label><br/>-->
			  		<label> Age :
			  			<select class="selectedInscription" name="AGE">
			  				<option value="-3">-3 ans</option>
			  				<option value="+3">+3 ans</option>
			  				<option value="-10">-10 ans</option>
			  				<option value="+10">+10 ans</option>
			  				<option value="-18">-18 ans</option>
			  				<option value="+18">+18 ans </option>
			  			</select>
			  		</label><br/>
			  		<label> Type de jeux: 
			  			<select class="selectedInscription" name="TYPE">
			  				<option value="CARTE">Jeux de carte</option>
			  				<option value="SOCIETE">Jeux de société</option>
			  				<option value="EXTERIEUR">Jeux d'extérieur</option>
			  				<option value="EAU">Jeux d'eau</option>
			  			</select>
			  		</label><br/>
			  		<label>Nombre de joueur :<input class="inputInscription" type="number" name="JOUEUR"/></label><br/>
			  		<label>Quantité :<input class="inputInscription" type="number" name="QUANTITE"/></label><br/>
			  		<label>Description :</label><br/>
			  		<textarea name="DESCRIPTION"></textarea><br/>
			  		<input type="submit" name="AJOUTER" value="Ajouter"/>
			  	</form>
			  </article>
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