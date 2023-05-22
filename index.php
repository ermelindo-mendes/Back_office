<?php
	session_start();
	include 'views/header.php';
?>

	<?php


	if (isset($_SESSION['erreur'])) {
		echo $_SESSION['erreur'];
		unset($_SESSION['erreur']); // Supprime une cellule de tableau
	}

	if (isset($_SESSION['validate'])) {
		echo $_SESSION['validate'];
		unset($_SESSION['validate']); // Supprime une cellule de tableau
	}
	$denied = '<p class="alert alert-danger">Vous n\'avez pas les droits d\'accéder à cette page 
	contacter votre administrateur</p>';

	require_once 'class/Autoload.php';
	Autoload::load(); // Appel automatiquement tous les fichiers nécessaires

	if (isset($_GET['page'])) {
		switch ($_GET['page']) {

			case 'categorie': // ?page=categorie	
				// Liste les categories admin
				if ($_SESSION['role'] == 'admin') {
					$ctrl = new categorieController();
					echo $ctrl->getCategorie();
				} else {
					echo $denied;
				}
				break;

			case 'categorie_add': // ?page=categorie_add

				if ($_SESSION['role'] == 'admin') {
					$ctrl = new categorieController();
					if (!empty($_POST)) {
						echo $ctrl->save($_POST);
					} else {
						echo $ctrl->getForm();
					}
				} else {
					echo $denied;
				}
				break;

			case 'categorie_update': // ?page=categorie_update&id=x
				if ($_SESSION['role'] == 'admin') {
					$ctrl = new categorieController();
					if (isset($_GET['id']) && !empty($_GET['id'])) {
						// Si le formulaire de maj a été soumis
						if (!empty($_POST)) {
							echo $ctrl->persistUpdate($_POST, $_GET['id']);
						}
						// Sinon c'est qu'on a juste demandé le formulaire
						else {
							echo $ctrl->update($_GET['id']);
						}
					}
					else {
						echo '<p>categorie introuvable</p>';
					}
				} 
				else {
					echo $denied;
					}
				break;

			case 'categorie_delete': // ?page=categorie_delete&id=x
				if ($_SESSION['role'] == 'admin') {
					$ctrl = new categorieController();
					if (isset($_GET['id']) && !empty($_GET['id'])) {
						echo $ctrl->delete($_GET['id']);
					} else {
						echo '<p>Categorie introuvable</p>';
					}
				} else {
					echo $denied;
				}
				break;

			case 'categorie_produit':  // ?page=categorie_produit
				// Liste les produit d'une categorie
				if ($_SESSION['role'] == 'admin') {
					$ctrl = new produitController();
					echo $ctrl->getProduitByCategorie($_GET['categorie_id']);
				} else {
					echo $denied;
				}
				break;

			case 'users':
				if ($_SESSION['role'] == 'admin') {
					$ctrl = new userController();
					echo $ctrl->getUsers();
				}
				else {
					echo $denied;
				}
				break;

			case 'users_update':
				if ($_SESSION['role'] == 'admin') {
					$ctrl = new userController();
					if (isset($_GET['id']) && !empty($_GET['id'])) {
						// Si le formulaire de maj a été soumis
						if (!empty($_POST)) {
							echo $ctrl->persistUpdate($_POST, $_GET['id']);
						}
						// Sinon c'est qu'on a juste demandé le formulaire
						else {
							echo $ctrl->update($_GET['id']);
						}
					}
					else {
						echo '<p>Utilisateur introuvable</p>';
					}
				}
				else {
					echo $denied;
				}
				break;

			case 'users_delete': // ?page=categorie_delete&id=x
				if ($_SESSION['role'] == 'admin') {
						$ctrl = new userController();
						if (isset($_GET['id']) && !empty($_GET['id'])) {
							echo $ctrl->delete($_GET['id']);
						}
						else {
							echo '<p>Utilisateur introuvable</p>';
						}
				} 
				else {
					echo $denied;
				}
				break;
			
			case 'disconnect': 
				$ctrl = new userController;
				echo $ctrl->disconnect();
				break;

				case 'allproduit': // ?page=allproduit	
						$ctrl = new produitController();
						echo $ctrl->getProduit();
					break;	

			case 'produit':
				if ($_SESSION['role'] == 'admin') {
					$ctrl = new produitController();
					// Echappe si action n'est pas défini dans l'URL
					if (isset($_GET['action'])) {
						$action = $_GET['action'];
					} else {
						$action = null;
					}

					switch ($action) {

						case 'add': // ?page=produit&action=add
							if (!empty($_POST)) {
								echo $ctrl->save($_POST);
							} else {
								echo $ctrl->add();
							}
							break;

						case 'update': // ?page=produit&action=update&id=x
							if (isset($_GET['id']) && !empty($_GET['id'])) {
								// Si le formulaire de maj a été soumis
								if (!empty($_POST)) {
									echo $ctrl->persistUpdate($_POST, $_GET['id']);
								}
								// Sinon c'est qu'on a juste demandé le formulaire
								else {
									echo $ctrl->update($_GET['id']);
								}
							} else {
								echo '<p>produit introuvable</p>';
							}
							break;

						case 'delete': // ?page=produit&action=delete&id=x
							if (isset($_GET['id']) && !empty($_GET['id'])) {
								echo $ctrl->delete($_GET['id']);
							} else {
								echo '<p>produit introuvable</p>';
							}
							break;

						default:
							$_SESSION['erreur'] = '<p class="alert alert-danger">Page introuvable</p>';
							header('Location: index.php?page=login');
							break;
					}
					break;
				}
				else {
					echo $denied;
				}

			case 'register':  // ?page=register
				// recupere le formulaire d'inscription
				$ctrl = new userController();
				if (!empty($_POST)) {
					echo $ctrl->save($_POST);
				} else {
					echo $ctrl->getForm();
				}

				break;

			case 'login':  // ?page=login
				// recupere le formulaire d'inscription
				$ctrl = new userController();
				if (!empty($_POST)) {
					echo $ctrl->verifLogin($_POST);
				} else {
					echo $ctrl->getLogin();
				}
				break;

			case 'categorie_produit_default':  // ?page=categorie_produit_default
				// Liste les produit d'une categorie
				$ctrl = new produitController();
				echo $ctrl->getProduitByCategorieDefault($_GET['categorie_id']);
				break;

			case 'categorie_default': // ?page=categorie_default
				// Liste les categories
				$ctrl = new categorieController();
				echo $ctrl->getCategorieDefault();
				break;

			default:
				// INDEX
				header('Location: index.php?page=categorie');
				break;
		}
	} 	else {
		// 404
		header('Location: index.php?page=login');
	}
	?>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://kit.fontawesome.com/eb255bb84a.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>