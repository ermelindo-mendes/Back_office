<div class="login_box">

	<div class="login">
		<h2 class="text-center">Produit</h2>
		<form action="" method="POST" class="needs-validated">
			<div class="form-group">
				<label class="form-label" for="nom">Nom : </label>
				<input class="form-control" type="text" name="nom" id="nom" class="form-controle"
				<?php
				$btn = 'Ajouter';
				if(isset($produit)){
					$btn = 'Mettre à jour';
					echo 'value="'.$produit['nom'].'"';
				}
				?>
			>
			</div>
			<div class="form-group">
				<label class="form-label" for="description">Description : </label>
				<br>
				<textarea class="form-control" name="description" id="description" rows="4" cols="20" class="form-controle"><?php if(isset($produit)){echo $produit['description'];}?></textarea>
			</div>

			<div class="form-group">
				<label class="form-label" for="prix">Prix : </label>
				<input class="form-control" type="number" name="prix" id="prix" class="form-controle"
					<?php
					if(isset($produit)){
						echo 'value="'.$produit['prix'].'"';
					}
					?>
				>
			</div>
			<div class="form-group">
				<label class="form-label" for="categorie">categorie : </label>
				<select class="form-control" name="categorie_id" id="categorie">
				<?php
					foreach($categorie as $c){
						?>
						<option value="<?= $c['id']; ?>" 
						<?php
							if(isset($produit) && $c['id'] == $produit['categorie_id']){
								echo 'selected';
							}
						?>
						><?= $c['nom']; ?></option>
						<?php
					}
				?>
				</select>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-success w-100" name="envoyer"  value="<?= $btn; ?>">
				</div>
		</form>
	</div>
</div>