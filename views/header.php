<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="views/style/style.css">
	<title>Back office</title>
</head>

<body>
	<nav class="navbar navbar-expand-sm" style="background-color: #FFFFFF">
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav">
				<?php
				if($_SESSION['role'] == 'admin'){
				echo '<li class="nav-link active" aria-current="page"><a class="nav-link" href="?page=categorie">Listes des categories</a></li>';
				echo '<li class="nav-link active" aria-current="page"><a class="nav-link" href="?page=categorie_add">Ajouter une categorie</a></li>';
				echo '<li class="nav-link active" aria-current="page"><a class="nav-link" href="?page=users">Gestion des utilisateurs</a></li>';
                echo '<li class="nav-link active" aria-current="page"><a class="nav-link" href="?page=produit&action=add">Ajouter un produit</a></li>';
				}
				
				if ($_SESSION['role'] == 'default') {
					echo '<li class="nav-link active" aria-current="page"><a class="nav-link"href="?page=categorie_default">Listes des categories</a></li>';
				}

				if(array_key_exists('role', $_SESSION)){
					echo '<li class="nav-link active" aria-current="page"><a class="nav-link" href="?page=allproduit">Tous produits</a></li>';
				
					echo '<li class="nav-link active" aria-current="page"><a class="nav-link" href="?page=disconnect">Se deconnecter</a></li>';
				}
				else{
					echo '<li class="nav-link active" aria-current="page"><a class="nav-link" href="?page=register">S\'enregistrer</a></li>';
					echo '<li class="nav-link active" aria-current="page"><a class="nav-link" href="?page=login">Se connecter</a></li>';
					
				}
				?>
			
			</ul>
		</div>
	</nav>
