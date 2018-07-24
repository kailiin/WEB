<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/style.css">
		<title>Rush00</title>
	</head>
	<body>
		<?php
			include("adm_menu.php");
			include ("../get_article.php");
		?>
		 <table>
		 	<tr>
				<td>Produit</td>
				<td>Nb</td>
				<td><?php echo "<a href='sco_sup_etudiant.php'> Ajout </a>" ?></td>
			</tr>
			<?php
				$articles = get_all_article();
				$i = 0;
				while ($articles[$i])
				{	
			?>
				<tr>
					<td><?php echo $articles[$i][1]; ?></td>
					<td><?php echo $articles[$i][2]; ?></td>
					<td><a href='sco_mod_etudiant.php?eid=<?php echo $articles[$i][0] ?>'> Modifier </a></td>
					<td><a href='sco_mod_etudiant.php?eid=<?php echo $articles[$i][0] ?>'>Supprimer </a></td>
				</tr>
			<?php
					$i++;
				}
			?>
		 </table>
	</body>
</html>