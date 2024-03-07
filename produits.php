<?php

include("BDD.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Produits</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="PAGE_WEB/ecommerce.css">
</head>
<body>
	<h1>Produits</h1>
	<div class="produits">
		<?php
		$sql = "select * from produit,categorie where produit.id_categorie = categorie.id_categorie";
		
		$query = mysqli_query($lien,$sql);
		
		// !!!
		while ($result = mysqli_fetch_assoc($query))
		{
			echo("<div class=\"produit\">\n");
			echo("<div class=\"produit-nom\"><a href=\"produitsdetails.php?id_produit=".$result["id_produit"]."\">".$result["produit_nom"]."</a></div>\n");
			echo("<div class=\"produit-prix marg-top-20 marg-bot-20\">".$result["produit_prix"]."</div>\n");
			
			$stock = $result["produit_stock"];
			$libelle_stock = "En stock";
			if ($stock == 0)
			{
				$libelle_stock = "Sur commande";
			}
			
			echo("<div class=\"produit-stock\">".$libelle_stock."</div>\n");
			echo("</div>\n");
		}
		
		?>
	</div>
</body>
</html>
