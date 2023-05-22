<div class="container">
	<div class="row pt-4">
		<h2>Produits</h2>
		<table class="table table-striped mt-3">
		<thead>
			<tr>
			<th scope="col">Nom</th>
			<th scope="col">Description</th>
			<th scope="col">Prix</th>
            <th scope="col">Categorie</th>
			</tr>
		</thead>
		<tbody>
		<?php

		if(!empty($produit)){
			foreach ($produit as $p) {
				echo '<tr><th scope="row">'.$p['nom'].'</th>';
				echo '<th scope="row">'.$p['description'].'</th>';
				echo '<th scope="row">'.$p['prix'].'</th>';
				foreach($categorie as $c){
					if(isset($p) && $c['id'] == $p['categorie_id']){
						echo '<th scope="row">'.$c['nom'].'</th></tr>';
					}
				}
			}
		}
		else{
			echo '<p>Il n\'y a aucun produit</p>';
		}
		?>
			</tbody>
		</table>
	</div>
</div>