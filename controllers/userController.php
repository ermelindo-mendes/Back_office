<?php

class userController extends userManager{

    public function getUsers(){
		// Mise en tampon de tout ce qui suit
		ob_start();
		// Appel du manager
		$users = $this->findAll();
		// Appel de la vue (qui va posséder la variable $categorie)
		require 'views/user/list_users.php';
		// Récupération de la vue
		$page = ob_get_clean();

		return $page;
	}

    public function getForm(){
        ob_start();
        require 'views/user/register.php';
        $vue = ob_get_clean();
        return $vue;
    }
    // Recuperer le formulaire de login
    public function getLogin(){
        ob_start();
        require 'views/user/login.php';
        $vue = ob_get_clean();
        return $vue;
    }

    public function verifLogin($form){

        if($this->isValid($form)){
            $user = $this->finduser($form);
            if (password_verify($form['pwd'], $user['pwd'])) {
                $_SESSION['user'] = $user['user'];
                $_SESSION['role'] = $user['role']; 
                if($_SESSION['role'] == 'admin'){
                    header('Location:index.php?page=categorie');

                }
                else {
                    header('Location: index.php?page=categorie_default');
                }

            } else {
                $_SESSION['erreur'] = '<p class="alert alert-danger">Mot de passe incorrect</p>';
                header('Location: index.php?page=login');;
            }
        }
       
    }

    public function save($formulaire){

		if($this->isValid($formulaire)){
            if ($formulaire['pwd']== $formulaire['confirmPassword']) {

                $formulaire['pwd'] = password_hash($formulaire['pwd'], PASSWORD_DEFAULT);

			    if($this->insert($formulaire)){
                    $_SESSION['validate'] = '<p class="alert alert-primary">Vous êtes bien inscrit</p>';
				    header('Location: index.php?page=login');
			    }
			    else{
				    echo '<p>Une erreur est survenue lors de l\'inscription  </p>';
			    }
                
            }
            else {
                $_SESSION['erreur'] = '<p class="alert alert-danger">le Mot de passe et la confirmation ne sont pas identique</p>';
                header('Location: index.php?page=register');
            }
		}
		else{

			echo '<p>Formulaire invalide</p>';
		}
	}

    public function isValid($donnees){
		if(
			isset($donnees['user']) && !empty($donnees['user'])
			&&
			isset($donnees['pwd']) && !empty($donnees['pwd'])
		){
			return true;
		}
		else{
			return false;
		}
	}

    public function isValidRole($donnees){
		if(isset($donnees['role']) && !empty($donnees['role'])){
			return true;
		}
		else{
			return false;
		}
	}

    public function update($id){
		ob_start();
		$users = $this->findUserById($id);
		require 'views/user/update_user.php';
		$vue = ob_get_clean();
		return $vue;
	}

    public function persistUpdate($formulaire, $id_user){
		if($this->isValidRole($formulaire)){
			if($this->maj($formulaire, $id_user) > 0){
				header('Location: index.php?page=users');
			}
			else{
				echo '<p>Une erreur est survenue lors de la mise à jour</p>';
			}
		}
		else{
			echo '<p>Formulaire invalide</p>';
		}
	}

    public function delete($id_user){
		if($this->del($id_user) > 0){
			header('Location: index.php?page=users');
		}
		else{
			echo '<p>Une erreur est survenue lors de la suppression de l\'utilisateur</p>';
		}
	}

    public function disconnect(){
        session_destroy();
		echo '<p class="alert alert-primary">Vous êtes bien deconnecter</p>';
        header('Location: index.php?page=login');
		
    }

}