<?php
	
	$dns_bdd="mysql:host=localhost;dbname=webDynamique";		//Adresse du serveur
	$user_bdd="root";											//Id de connection (login)
	$mdp_bdd="";												//Mot de passe

	try 
	{
		$bdd = new PDO($dns_bdd, $user_bdd, $mdp_bdd);
	}
	catch (Exeption $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>