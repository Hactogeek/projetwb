<?php
	
	//Vérifier qu'un membre n'a pas la même adresse mail 

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

	//Ont verifie que le formulaire a bien ete envoye pour inscription

	if(isset($_POST['INSCRIPTION']))
	{

		echo "OK";

		//Ont verifie que tout les champs ont bien ete rempli

		if(isset($_POST['NAME'], $_POST['FIRST_NAME'], $_POST['EMAIL'], $_POST['PASSWORD'], $_POST['PASSWORD_CONFIRM']))
		{
			
			echo "OK2";

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