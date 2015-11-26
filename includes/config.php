<?php
	session_start();
	if ($_SERVER['HTTP_HOST'] == "localhost:8888")
	{
		//Pour ce connecter à la BDD  :
		$dns_bdd="mysql:host=localhost;dbname=webDynamique";		//Adresse du serveur
		$user_bdd="root";											//Id de connection (login)
		$mdp_bdd="root";											//Mot de passe
	}
	else
	{
		//Pour ce connecter à la BDD  :
		$dns_bdd="mysql:host=info.univ-lemans.fr;dbname=info201a";   //Adresse du serveur
		$user_bdd="info201a_user";							//Id de connection (login)
		$mdp_bdd="com72";						//Mot de passe
	}

	try 
	{
		$bdd = new PDO($dns_bdd, $user_bdd, $mdp_bdd);
	}
	catch (Exeption $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>
