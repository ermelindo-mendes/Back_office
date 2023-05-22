<div class="login_box">
	<div class="login">
		<h2 class="text-center">Categorie</h2>
	
		<form action="" method="POST" class="needs-validated">
			<div class="form-group">
				<label class="form-label" for="nom">Nom : </label>
				<input  class="form-control" type="text" name="nom" id="nom"
					<?php 
					$btn = 'Ajouter';
					if(isset($categorie)){
						$btn = 'Mettre à jour';
						echo 'value="'.$categorie['nom'].'"';
					}
					?>
				>
			</div>
				<br>
			<div class="form-group">
				<input type="submit" name="ajouter" value="<?= $btn; ?>" class="btn btn-success w-100">
				</div>
		</form>
	</div>
</div>