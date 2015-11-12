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
		  	<form class="inscription">
			  	<label> Nom :<input class="inputInscription" type="text" name="nom" /></label><br/>
			  	<label> Prenom :<input class="inputInscription" type="text" name="prenom" /></label><br/>
				<label> Email :<input class="inputInscription" type="text" name="mails" /></label><br/>
			  	<label> Mot de passe :<input class="inputInscription" type="password" name="mdp" /></label><br/>
			  	<label> Confirmation :<input class="inputInscription" type="password" name="mdpConfirm" /></label><br/>
			  	<div class="centrage">
			  		<input class="buttonInscription" type="submit" value="Inscription"/>
				</div>
			</form>
		</section>
	  	<footer>

	  	</footer>
	</body>
</html>