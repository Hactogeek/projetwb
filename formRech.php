<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<title> - Jeux recherchés - </title>
	</head>
	<body>
    <?php include("includes/header.php"); ?>
    <form method="post" action="rechercher.php">
    <fieldset>
      <p><legend> Quel jeu souhaitez-vous ? </legend></p>
      <p><select name="type"></p>
       <option value="société">Jeux de société </option>
        <option value="carte">Jeux de carte </option>
        <option value="voiture">Jeux de voiture </option>
        <option value="figurine">Jeux de figurine </option>
       <option value="bille">Jeux de bille </option>
     </select>*

     <p><select name="age"></p>
       <option value="2">Jeux entre 2 ans et 6 ans </option>
       <option value="6">Jeux entre 6 ans et 10 ans </option>
       <option value="10">Jeux entre 10 ans et 14 ans </option>
        <option value="14">Jeux entre 14 ans et plus </option>
     </select>

  <!-- Faire des ajouts en fonction de l'évolution de la base de donnée -->
    
  <p>Insérez le nom du jeu pour être plus précis !<input name="nomJeu" value="Entrez le nom du jeu" /> </p>
  <p>Lancez la recherche !<input type="submit" value="Rechercher" name="Rechercher" /></p>

  <h6>Les champs avec une * sont obligatoires.</h6>
  </fieldset>
</form>
</body>
</html>
