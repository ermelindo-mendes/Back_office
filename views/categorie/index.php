<div class="container">
	<div class="row pt-4">
		<h2>Categories</h2>
		<table class="table table-striped mt-3">
		<thead>
			<tr>
			<th scope="col">Nom</th>
			<th scope="col">Voir les produits liés</th>
			<th scope="col"> Mettre a jour</th>
			<th scope="col">Supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php

		if(!empty($categorie)){
			foreach ($categorie as $c) {
				echo '<tr><th scope="row">'.$c['nom'].'</th>';
				echo '<td>'.' <a href="?page=categorie_produit&categorie_id='.$c['id'].'" class="m-2">Voir les produit</a>'.'</td>';
				echo '<td> <a href="?page=categorie_update&id='.$c['id'].'"><i class="fa fa-edit fa-2x"></a></td>';
				echo  '<td> <a href="?page=categorie_delete&id='.$c['id'].'"><i class="fa fa-trash fa-2x red-icon"</a></tr>';
			}
		}
		else{
			echo '<p>Il n\'y a aucune categorie</p>';
		}
		?>
			</tbody>
		</table>
	</div>
</div>