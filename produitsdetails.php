<?php

include("BDD.php");

if (!isset($_GET["id_produit"]))
{
	header("location:produits.php");
	exit;
}

if (!is_numeric($_GET["id_produit"]))
{
	header("location:produits.php");
	exit;
}

$id_produit = $_GET["id_produit"];

// double cotte à la fin contre les pirates
$sql = "select * from produit,categorie where produit.id_categorie = categorie.id_categorie and id_produit = '".$id_produit."'";

$query = mysqli_query($lien,$sql);

$result = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo($result["produit_nom"]) ?></title>
	<meta name="description" content="<?php echo(substr($result["produit_description"],0,160)) ?>">
	<meta charset="utf-8">
	<link rel="stylesheet" href="PAGE_WEB/ecommerce.css">
</head>
<body>
	<h1><?php echo($result["produit_nom"]); ?></h1>
	<h2><?php echo($result["produit_prix"]); ?> €</h2>
	<p><?php echo(str_replace("\n","<br>",$result["produit_description"])); ?></p>
	<p>
		<a href="panier.php?id_produit=<?php echo($result["id_produit"]); ?>">Ajouter au panier</a>
	</p>
	<p>
		<a href="produits">Retour à la liste des produits</a>
	</p>
</body>
</html>


// if avec conditions si egale à 1 "Superhôte"