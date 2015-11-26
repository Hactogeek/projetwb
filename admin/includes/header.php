<?php
	session_start();
?>
<div id="header"></div> 
<header>
	<h1>LUDOTHEQUE</h1>
	<h2>Administration</h2>
	<nav>
		<ul>
		    <li><a href="index.php">Accueil</a></li>
		    <?php
		   		if($_SESSION['connect_admin']!=1)
		   		{
		   		?>
		   			<li><a href="connexion.php">Connexion</a></li>
		   		<?php		
		   		}
		   	?>
		    <?php
		   		if($_SESSION['connect_admin']==1)
		   		{
		   		?>
		   			<li><a href="gestionJeux.php">Gestion Des Jeux</a></li>
		   			<li><a href="gestionMembres.php">Gestion Des Membres</a></li>
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