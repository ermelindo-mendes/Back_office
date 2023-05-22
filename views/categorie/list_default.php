<div class="container">
	<div class="row pt-4">
		<h2>Categories</h2>
		<table class="table table-striped mt-3">
		<thead>
			<tr>
			<th scope="col">Nom</th>
			<th scope="col">Voir les produits liés</th>
			</tr>
		</thead>
		<tbody>
		<?php

		if(!empty($categorie)){
			foreach ($categorie as $c) {
				echo '<tr><th scope="row">'.$c['nom'].'</th>';
				echo '<td>'.' <a href="?page=categorie_produit_default&categorie_id='.$c['id'].'" class="m-2">Voir</a>'.'</td></tr>';
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