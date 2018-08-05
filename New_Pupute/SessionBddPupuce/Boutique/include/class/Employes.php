<?php

/**
 * Définis l'objet users
 * Users sert à l'identification dans mon magasin chez Pupuce
 * attr (string) $_id
 * attr (string) $_login
 * attr (string) $_mdp
 * attr (string) $_nom
 */
class Employes
{
	//attributs
	private $_id, $_login, $_mdp, $_nom;

	//constructeur
	function __construct($login, $mdp, $nom = "", $id= null)
	{
		# code...
		$this->_id = $id;
		$this->_login = $login;
		$this->_mdp = $mdp;
		$this->_nom = $nom;
	}

	// accesseur
	public function __get($attr){
		return $this->$attr;
	}

	// mutateur
	public function __set($val, $attr){
		$this->$attr = $val;
	}

	//fonction getUsers
	// permet de récupérer la liste de tous les utilisateurs dans la base ! C'est une méthode de classe d'où le static
	static function getAll($bdd){
		$sql = "SELECT * FROM `Employes`";
		$data = $bdd->query($sql);
		return $data->fetchAll();
	}

	// me permet de remplir l'objet avec les infos contenues dans la bdd en fonction de son id unique
	// J'ai besoin d'un lien avec la bdd :
	// 2 possibilitées :
	//		- passer en argument le lien avec la bdd dans l'appel de la fonction
	//		- passer en attribut de classe le lien avec la bdd mais attention avec la sérialization qui buggera !
	public function getInfoById($bdd){
		$sql = "SELECT * FROM `Employes` WHERE `ID_Employe` = ".$this->_id;
		$query = $bdd->query($sql);
		$data = $query->fetch();
		$this->_login = $data['Login_Employe'];
		$this->_mdp = $data['Password_Employe'];
		$this->_nom = $data['Name_Employe'];
	}
}
