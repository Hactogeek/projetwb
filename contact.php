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
		  	<h2>Contact</h2>
			<form class="inscription">
			  	<label> Nom :<input class="inputInscription" type="text" name="nom" /></label><br/>
			  	<label> Prenom :<input class="inputInscription" type="text" name="prenom" /></label><br/>
				<label> Email :<input class="inputInscription" type="text" name="mails" /></label><br/>
				<label> Objet :<input class="inputInscription" type="text" name="mdp" /></label><br/>
			  	<label> Message :<br/>
			  	<textarea></textarea></label><br/>
			  	<div class="centrage">
			  		<input class="buttonInscription" type="submit" value="Envoyer"/>
			  	</div>
			  </form>
		</section>
	  	<footer>

	  	</footer>
	</body>
</html>