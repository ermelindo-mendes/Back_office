<?php

class categorieController extends categorieManager{
	/**
	 * Récupère la liste des categories
	 */
	public function getCategorie(){
		// Mise en tampon de tout ce qui suit
		ob_start();
		// Appel du manager
		$categorie = $this->findAll();
		// Appel de la vue (qui va posséder la variable $categorie)
		require 'views/categorie/index.php';
		// Récupération de la vue
		$page = ob_get_clean();

		return $page;
	}

	public function getCategorieDefault(){
		// Mise en tampon de tout ce qui suit
		ob_start();
		// Appel du manager
		$categorie = $this->findAll();
		// Appel de la vue (qui va posséder la variable $categorie)
		require 'views/categorie/list_default.php';
		// Récupération de la vue
		$page = ob_get_clean();

		return $page;
	}

	/**
	 * Récupère le formulaire d'ajout de categorie
	 */
	public function getForm(){
		ob_start();
		require 'views/categorie/form.php';
		$vue = ob_get_clean();
		return $vue;
	}

	public function save($formulaire){
		if($this->isValid($formulaire)){
			if($this->insert($formulaire) > 0){
				echo '<p class="alert alert-primary">'.$formulaire['nom'].' a bien été ajouté</p>';
				header('Location: index.php?page=categorie');
			}
			else{
				echo '<p class="alert alert-danger">Une erreur est survenue lors de l\'insertion de '.$formulaire['nom'].'</p>';
			}
		}
		else{
			$_SESSION['erreur'] = '<p class="alert alert-danger">Formulaire invalide</p>';
			header('Location: index.php?page=categorie_add');
			return;
		}
	}

	public function isValid($donnees){
		if(isset($donnees['nom']) && !empty($donnees['nom'])){
			return true;
		}
		else{
			return false;
		}
	}

	public function update($id){
		ob_start();
		$categorie = $this->findOneById($id);
		require 'views/categorie/form.php';
		$vue = ob_get_clean();
		return $vue;
	}

	public function persistUpdate($formulaire, $id_categorie){
		if($this->isValid($formulaire)){
			if($this->edit($formulaire, $id_categorie) > 0){
				header('Location: index.php?page=categorie');
			}
			else{
				echo '<p>Une erreur est survenue lors de la mise à jour</p>';
			}
		}
		else{
			echo '<p>Formulaire invalide</p>';
		}
	}

	public function delete($id_categorie){
		if($this->del($id_categorie) > 0){
			header('Location: index.php?page=categorie');
		}
		else{
			echo '<p>Marque introuvable</p>';
		}
	}
}