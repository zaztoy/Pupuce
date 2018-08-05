<?php

/**
 * Définis l'objet users 
 * Users sert à l'identification dans mon magasin chez Pupuce
 * attr (string) $_login
 * attr (string) $_mdp
 * attr (string) $_nom
 */
class Users
{
	//attributs
	private $_login, $_mdp, $_nom;

	//constructeur
	function __construct($login, $mdp, $nom = "")
	{
		# code...
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
}
