
<div class="container">
	<div class="row pt-4">
		<h2>Gestion des utilisateurs</h2>
		<table class="table table-striped mt-3">
		<thead>
			<tr>
			<th scope="col">Email</th>
			<th scope="col">Rôle</th>
			<th scope="col">Action</th>
			<th scope="com">Supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php

		if(!empty($users)){
			foreach ($users as $u) {
				echo '<tr><th scope="row">'.$u['user'].'</th>';
				echo '<td>'.$u['role'].'</td>';
				echo '<td>'.'<a href="?page=users_update&id='.$u['id'].'" class="m-2"><i class="fa fa-edit fa-2x"></a>'.'</td>';
				echo '<td> <a href="?page=users_delete&id='.$u['id'].'"><i class="fa fa-trash fa-2x red-icon"</a></td></tr>'; 
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

