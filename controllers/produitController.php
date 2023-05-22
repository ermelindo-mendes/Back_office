<?php

class produitController extends produitManager{

	/**
	 * Récupère la liste des produits
	 */
	public function getProduit(){
		// Mise en tampon de tout ce qui suit
		ob_start();
		// Appel du manager
		$produit = $this->findAll();
		$manager = new categorieManager();
		$categorie = $manager->findAll();
		// Appel de la vue (qui va posséder la variable $produits)
		require 'views/produit/allProduit.php';
		// Récupération de la vue
		$page = ob_get_clean();

		return $page;
	}

	public function getProduitByCategorie($id_categorie){
		ob_start();

		$produit = $this->findByCategorie($id_categorie);

		require 'views/produit/list_by_categorie.php';

		$vue = ob_get_clean();
		return $vue;
	}

	public function getProduitByCategorieDefault($id_categorie){
		ob_start();

		$produit = $this->findByCategorie($id_categorie);

		require 'views/produit/list_by_categorie_default.php';

		$vue = ob_get_clean();
		return $vue;
	}
	 // Sert a recuperer les categories des produits
	public function add(){
		ob_start();
		$manager = new categorieManager();
		$categorie = $manager->findAll();
		require 'views/produit/form.php';
		$page = ob_get_clean();
		return $page;
	}

	public function save($formulaire){
		if($this->isValid($formulaire)){
			if($this->insert($formulaire)){
				header('Location: index.php?page=categories');
			}
			else{
				echo '<p>Une erreur est survenue lors de l\'ajout d\'un produit  </p>';
			}
		}
		else{
			echo '<p>Formulaire invalide</p>';
		}
	}

	public function isValid($donnees){
		if(
			isset($donnees['nom']) && !empty($donnees['nom'])
			&&
			isset($donnees['prix']) && !empty($donnees['prix'])
			&&
			isset($donnees['categorie_id']) && !empty($donnees['categorie_id'])
		){
			return true;
		}
		else{
			return false;
		}
	}

	public function update($id_produit){
		ob_start();
		$produit = $this->findOneById($id_produit);
		$manager = new categorieManager();
		$categorie = $manager->findAll();
		require 'views/produit/form.php';
		$page = ob_get_clean();
		return $page;
	}

	public function persistUpdate($formulaire, $id_produit){
		if($this->isValid($formulaire)){
			if($this->maj($formulaire, $id_produit) > 0){
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

	public function delete($id_produit){
		if($this->del($id_produit) > 0){
			header('Location: index.php?page=categorie');
		}
		else{
			echo '<p>Une erreur est survenue lors de la suppression du produit</p>';
		}
	}
}