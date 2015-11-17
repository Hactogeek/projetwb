<?php
	session_start();

	//----------------------------DECONNEXION--------------------------------------

	if(isset($_GET['DECONNEXION']) && $_GET['DECONNEXION']==1)
	{
		session_destroy();
		header("Location: index.php");
	}

	//-----------------------------------------------------------------------------

	//----------------------------CONNEXION----------------------------------------

	// Ont vérifie que le formulaire a bien été envoyé pour connexion

	if(isset($_POST['CONNEXION']))
	{
		// Ont vérifie que les variables saisi dans la formulaire par l'utilisateur existe
		if(isset($_POST['IDENTIFIANT'], $_POST['PASSWORD']))
		{
    		$ADMIN="admin";

    		if($_POST['IDENTIFIANT']==$ADMIN && $_POST['PASSWORD']==$ADMIN)
    		{	
   				$_SESSION['connect_admin']=1;
   				header("Location: index.php");
   			}
    		else
    		{
    			echo 'Le login ou le mot de passe ne sont pas correct, réssayer';
   			}
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
		  	<h2>Connexion - Administration</h2>
			<form class="connexion" action="connexion.php" method="post">
			  	<label> Identifiant :<input class="inputInscription" type="email" name="IDENTIFIANT" /></label><br/>
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