<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<title> - Jeux recherchés - </title>
	</head>
	<body><?php
$Serveur="info.univ-lemans.fr";
$Utilisateur="info201a_user";
$MotDePasse="com72";
$Base="info201a";
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
    $age4 = $age + 4;
    $Requete='SELECT * FROM VR_grp1_Jeux WHERE Ages ='.$age.'  ';
    $Reponse = mysql_query($Requete);
    while ($donnees = mysql_fetch_array($Reponse) )
    {
    //Affichage des lignes de données, champ par champ
    //echo "Numero: ".$donnees[0]." ,Equipe:". $donnees[1];
      echo "Voici la liste des jeux que vous avez demandé : Pour les jeux de ".$donnees['Ages']." ans, on a le jeu ".$donnees['Nom'].$donnees['Typejeux'];
    }
      //echo "Voici la liste des jeux que vous avez demandé :".$Reponse;
    
  }
else echo "Les champs obligatoires ne sont pas renseignés";
}
?>

</body>
</html>
