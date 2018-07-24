<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="./style/style.css">
		<title>Rush0</title>
	</head>
	<body>
		<?php
		include("menu.php");
		include ("modif_panier.php");
		include ("get_article.php");
		?>
		 <table>
		 	<tr>
				<td>Produit</td>
				<td>Prix seul</td>
				<td>Prix</td>
				<td>Quantit&eacute;</td>
				<td class="no_bord"></td>
			</tr>
		 	<?php
		 		session_start();
		$i = 0;
		$total = 0;
		 		while ($_SESSION['panier'][$i])
		 		{
					$article = get_article_id($_SESSION['panier'][$i][0]);
			?>
				<tr>
					<td><?php echo $article['name']; ?></td>
					<td> 5$ </td>
					<td><?php echo $_SESSION['panier'][$i][2]."$"; ?></td>
					<td>
						<form action="modif.php?eid=<?php echo $article['id']; ?>" method="POST">
				        <input type="number" name="nombre" value=<?php echo $_SESSION['panier'][$i][1]; ?> />
				        <input type="submit" name="submit" value="Modifier"/>
				    	</form>
					</td>
					<td><a href="delete.php?eid=<?php echo $article['id']; ?>"><input type='submit' value='Supprimer'/></a></td>
				</tr>
<?php
					$total = $total + $_SESSION['panier'][$i][2];
		 			$i++;
				}
			?>
		 </table>
		 <?php 
		 if ($i > 0)
		 {
		 ?>
		Total = <?php echo $total."$"; ?>
		 <form action="valide.php" method="POST">
			<input type="submit" name="submit" value="Valider le panier"/>
		</form>
		<?php
	}
			if (isset($_GET) && $_GET['error'])
			{
				
				echo "Erreur: Vous devez vous connecter pour valider votre panier.\n";
			}
		?>
	</body>
</html>
