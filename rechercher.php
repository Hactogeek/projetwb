<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<title> - Jeux recherchés - </title>
	</head>
	<body><?php include("includes/header.php"); include('includes/config.php'); ?><?php
$Serveur="";
$Utilisateur="";
$MotDePasse="";
$Base="";
$LienBase=mysql_connect($Serveur,$Utilisateur,$MotDePasse);
$retour=mysql_select_db($Base,$LienBase);
if(!$retour)
echo "Connexion à la base impossible";
if(isset($_POST["Rechercher"]))
{
  if(!empty($_POST["type"]))
  {
    $type = $_POST["type"];
    $age = $_POST["age"];
    $nom = $_POST["nomJeu"];
    $age4 = $age+4;
    $Reponse=$bdd->query('SELECT * FROM VR_grp1_Jeux WHERE AGE BETWEEN '.$age.' AND '.$age4.' AND TYPE LIKE "'.$type.'" AND NOM LIKE "'.$nom.'" '); // AND TYPE LIKE "'.$type.'" AND NOM LIKE "'.$nom.'"
    //$Reponse = mysql_query($Requete);
    ?>
    <p><?php echo "Voici la liste des jeux d'au moins ".$age." ans que vous avez demandé : "; ?> </p> <?php
    ?>
    				<table>
			  			<tr>
			  				<th> Type de jeu </th>
							<th> Nom du jeu </th>
						</tr>
	<?php
    while ($donnees = $Reponse->fetch())
    {
    ?>
						<tr>
							<td><?php echo $donnees['TYPE']; ?></td>
					  		<td><?php echo $donnees['NOM']; ?></td>					  		
					  	</tr>
					
	<?php	
	?></table><?php				  		
    //Affichage des lignes de données, champ par champ
    //echo "Numero: ".$donnees[0]." ,Equipe:". $donnees[1];
    }
      //echo "Voici la liste des jeux que vous avez demandé :".$Reponse;
    
  }
else echo "Les champs obligatoires ne sont pas renseignés";
}
?>

</body>
</html>
