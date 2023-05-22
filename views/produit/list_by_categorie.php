<div class="container">
	<div class="row pt-4">
		<h2>Produits</h2>
		<table class="table table-striped mt-3">
		<thead>
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Description</th>
				<th scope="col">Prix</th>
				<th scope="col">Mettre a jour</th>
				<th scope="col">Supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php

		if(!empty($produit)){
			foreach ($produit as $p) {
				echo '<tr><th scope="row">'.$p['nom'].'</th>';
				echo '<th scope="row">'.$p['description'].'</th>';
				echo '<th scope="row">'.$p['prix'].'</th>';
				echo '<th scope="row"><a href="?page=produit&action=update&id='.$p['id'].'"><i class="fa fa-edit fa-2x"</a>';
				echo  '<td> <a href="?page=produit&action=delete&id='.$p['id'].'"><i class="fa fa-trash fa-2x red-icon"</a></tr>';
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