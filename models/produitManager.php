<?php

class produitManager extends BDD{
	/**
	 * Récupère la liste des produits en fonction de la categorie reçue
	 */
	public function findByCategorie($id_categorie){
		$sql = 'SELECT * FROM produit WHERE categorie_id = :id';
		$select = $this->co->prepare($sql);
		$select->execute(['id' => $id_categorie]);

		return $select->fetchAll();
	}

	public function findAll(){
		$sql = 'SELECT * FROM produit';
		$select = $this->co->prepare($sql);
		$select->execute();

		return $select->fetchAll();
	}

	public function insert($donnees){
		$sql = 'INSERT INTO produit(nom, description, prix, categorie_id) VALUES (:n, :d, :p, :c)';
		$insert = $this->co->prepare($sql);
		$insert->execute([
			'n' => $donnees['nom'],
            'd' => $donnees['description'],
			'p' => $donnees['prix'],
			'c' => $donnees['categorie_id']
		]);

		return $insert->rowCount();
	}

	public function findOneById($id){
		$sql = 'SELECT * FROM produit WHERE id = :id';
		$select = $this->co->prepare($sql);
		$select->execute(['id' => $id]);

		return $select->fetch();
	}

	public function maj($donnees, $id){
		$sql = 'UPDATE produit SET nom = :n, description = :d, prix = :p, categorie_id = :c WHERE id = :id';
		$update = $this->co->prepare($sql);
		$update->execute([
			'n'=>$donnees['nom'],
            'd'=>$donnees['description'],
			'p'=>$donnees['prix'],
			'c'=>$donnees['categorie_id'],
			'id'=>$id
		]);

		return $update->rowCount();
	}

	public function del($id){
		$sql = 'DELETE FROM produit WHERE id = :id';
		$del = $this->co->prepare($sql);
		$del->execute(['id' => $id]);

		return $del->rowCount();
	}
}