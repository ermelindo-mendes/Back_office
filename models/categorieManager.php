<?php

class categorieManager extends BDD{
	/**
	 * Récupère toute la table categorie
	 */
	public function findAll(){
		$sql = 'SELECT * FROM categorie';
		$select = $this->co->prepare($sql);
		$select->execute();

		return $select->fetchAll();
	}

	/**
	 * Récupère une categorie à l'aide de son id
	 */
	public function findOneById($id){
		$sql = 'SELECT * FROM categorie WHERE id = :id';
		$select = $this->co->prepare($sql);
		$select->execute(['id' => $id]);

		return $select->fetch();
	}

	public function insert($donnees){

			$sql = 'INSERT INTO categorie (nom) VALUES (:n)';
			$insert = $this->co->prepare($sql);
			$insert->execute(['n'=>$donnees['nom']]);
	
			return $insert->rowCount();
		
		
	}

	public function edit($donnees, $id){
		$sql = 'UPDATE categorie SET nom = :n WHERE id = :id';
		$update = $this->co->prepare($sql);
		$update->execute([
			'n' => $donnees['nom'],
			'id' => $id
		]);

		return $update->rowCount();
	}

	public function del($id){
		$sql = 'DELETE FROM categorie WHERE id = :id';
		$del = $this->co->prepare($sql);
		$del->execute(['id' => $id]);

		return $del->rowCount();
	}
}