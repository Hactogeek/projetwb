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

	//----------------------------DECONNEXION--------------------------------------

	if(isset($_GET['DECONNEXION']) && $_GET['DECONNEXION']==1)
	{
		session_destroy();
	}

	//-----------------------------------------------------------------------------

	//----------------------------CONNEXION----------------------------------------

	// Ont vérifie que le formulaire a bien été envoyé pour connexion

	if(isset($_POST['CONNEXION']))
	{
		echo "TEST";
		// Ont vérifie que les variables saisi dans la formulaire par l'utilisateur existe

		if(isset($_POST['EMAIL'], $_POST['PASSWORD']))
		{

			$reponse = $bdd->query('SELECT * FROM VR_grp1_Users WHERE EMAIL=\''.$_POST['EMAIL'].'\'');

			while ($donnees = $reponse->fetch())
			{
    			if($donnees['EMAIL'] == $_POST['EMAIL'])
    			{	
    				if($donnees['PASSWORD']==md5($_POST['PASSWORD']))
    				{
    					
    					$_SESSION['connect']=1;
    					header('index.php');
    				}
    				else
    				{
    					echo 'Le login ou le mot de passe ne sont pas correct, réssayer';
    				}
    			}
			}

			$reponse->closeCursor();

		}
	}

	//-----------------------------------------------------------------------------
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
		  	<h2>Connexion</h2>
			<form class="connexion" action="connexion.php" method="post">
			  	<label> Email :<input class="inputInscription" type="email" name="EMAIL" /></label><br/>
			  	<label> MDP :<input class="inputInscription" type="password" name="PASSWORD" /></label><br/>
			  	<div class="centrage">
			  		<input class="buttonInscription" type="submit" value="Connexion" name="CONNEXION"/>
			  	</div>
			  </form>
		</section>
	  	<footer>

	  	</footer>
	</body>
</html>