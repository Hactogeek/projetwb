<div id="header"></div> 
<header>
	<h1>LUDOTHEQUE</h1>
	<nav>
		<ul>
		    <li><a href="index.php">Accueil</a></li>
		   	<?php
		   		if($_SESSION['connect']!=1)
		   		{
		   		?>
		   			<li><a href="inscription.php">Inscription</a></li>
		   			<li><a href="connexion.php">Connexion</a></li>
		   		<?php		
		   		}
		   	?>
		    <li><a href="contact.php">Contact</a></li>
		    <?php
		   		if($_SESSION['connect']==1)
		   		{
		   		?>
		   			<li><a href="panier.php" name="PANIER">Panier</a></li>
		   			<li><a href="commande.php" name="COMMANDE">Commande</a></li>
		   			<li><a href="connexion.php?DECONNEXION=1" name="DECONNEXION">Deconnexion</a></li>
		   		<?php		
		   		}
		   	?>
		</ul>
		<form class="rechercher">
		    <input type="text"/>
		    <input type="submit" value="Rechercher"/>
		</form>
	</nav>
</header>