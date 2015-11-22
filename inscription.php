 <?php
	
	include('includes/config.php');

	//Ont verifie que le formulaire a bien ete envoye pour inscription

	if(isset($_POST['INSCRIPTION']))
	{

		//Ont verifie que tout les champs ont bien ete rempli

		if(!empty($_POST['NAME']) && !empty($_POST['FIRST_NAME']) && !empty($_POST['EMAIL']) && !empty($_POST['PASSWORD']) && !empty($_POST['PASSWORD_CONFIRM']))
		{

			//Ont regarde si un utilisateur n'as pas le même EMAIL qu'un utilisateur deja inscrit sur le site

			$present=0;

			$reponse = $bdd->query('SELECT EMAIL FROM VR_grp1_Users WHERE EMAIL=\''.$_POST['EMAIL'].'\'');

			while ($donnees = $reponse->fetch())
			{
    			if($donnees['EMAIL'] == $_POST['EMAIL'])
    			{
    				$present=1;
    			}
			}

			$reponse->closeCursor();

			if($present==0)
			{
				
				//Ont regarde si le PASSWORD et sa confirmation sont identique

				if($_POST['PASSWORD'] == $_POST['PASSWORD_CONFIRM'])
				{

					//Requete SQL pour inscrire le nouveau membre dans la base de donnee

					$req = $bdd->prepare('INSERT INTO VR_grp1_Users(NAME, FIRST_NAME, EMAIL, PASSWORD, REGISTRATION_DATE) 
					VALUES(:NAME, :FIRST_NAME, :EMAIL, :PASSWORD, :REGISTRATION_DATE)');
				
					$req->execute(array(
						'NAME' => $_POST['NAME'],
						'FIRST_NAME' => $_POST['FIRST_NAME'],
						'EMAIL' => $_POST['EMAIL'],
						'PASSWORD' => md5($_POST['PASSWORD']),
						'REGISTRATION_DATE' => date("Y-m-d H:i:s")
					));
					header("Location: connexion.php");
				}
				else
				{
					echo "La confirmation du mot de passe n'est pas correct";
				}
			}
			else
			{
				echo "Un utilisateur possède le même email que vous ! ";
			}
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
		  	<h2>Inscription</h2>
		  	<form action="inscription.php" method="post" class="inscription">
			  	<label> Nom :<input class="inputInscription" type="text" name="NAME" /></label><br/>
			  	<label> Prenom :<input class="inputInscription" type="text" name="FIRST_NAME" /></label><br/>
				<label> Email :<input class="inputInscription" type="text" name="EMAIL" /></label><br/>
			  	<label> Mot de passe :<input class="inputInscription" type="password" name="PASSWORD" /></label><br/>
			  	<label> Confirmation :<input class="inputInscription" type="password" name="PASSWORD_CONFIRM" /></label><br/>
			  	<div class="centrage">
			  		<input class="buttonInscription" type="submit" name="INSCRIPTION" value="Inscription"/>
				</div>
			</form>
		</section>
	  	<footer>

	  	</footer>
	</body>
</html>