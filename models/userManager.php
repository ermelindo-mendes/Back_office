<?php

class userManager extends BDD{

	public function findUser($form){
		$sql = 'SELECT * FROM user WHERE user = :u';
		$select = $this->co->prepare($sql);
		$select->execute([
			'u' => $_POST['user']
		]);

		return $select->fetch();
	}

	public function findAll(){
		$sql = 'SELECT * FROM user';
		$select = $this->co->prepare($sql);
		$select->execute();

		return $select->fetchAll();
	}

	public function findUserById($id){
		$sql = 'SELECT * FROM user WHERE id = :id';
		$select = $this->co->prepare($sql);
		$select->execute(['id' => $id]);

		return $select->fetch();
	}

    public function insert($donnees){
		$sql = 'INSERT INTO user(user, pwd, role) VALUES (:u, :p, :r)';
		$insert = $this->co->prepare($sql);
		$insert->execute([
			'u' => $donnees['user'],
            'p' => $donnees['pwd'],
			'r' => $donnees = 'default',
		]);


		return $insert->rowCount();
	}

	public function maj($donnees, $id){
		$sql = 'UPDATE user SET role = :r WHERE id = :id';
		$update = $this->co->prepare($sql);
		$update->execute([
			'r'=>$donnees['role'],
			'id'=>$id
		]);

		return $update->rowCount();
	}

	public function del($id){
		$sql = 'DELETE FROM user WHERE id = :id';
		$del = $this->co->prepare($sql);
		$del->execute(['id' => $id]);

		return $del->rowCount();
	}
}