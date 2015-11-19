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
		  	<h2>Contact</h2>
			<form class="inscription">
				<?php 
					if($_SESSION['connect']!=1)
		   			{
		   				?>
			  			<label> Nom :<input class="inputInscription" type="text" name="NOM" /></label><br/>
			  			<label> Prenom :<input class="inputInscription" type="text" name="PRENOM" /></label><br/>
						<label> Email :<input class="inputInscription" type="text" name="EMAIL" /></label><br/>
						<?php 
					}
					else
					{
						?>
							<input type="hidden"  name="NOM" value=<?php echo $_SESSION['NOM']; ?> />
							<input type="hidden"  name="PRENOM" value=<?php echo $_SESSION['PRENOM']; ?> />
							<input type="hidden"  name="EMAIL" value=<?php echo $_SESSION['EMAIL']; ?> />
						<?php
					}
				?>
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