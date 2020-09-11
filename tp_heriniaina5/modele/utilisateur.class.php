<?php

class Utilisateur
{
	private $id;
	private $nom;
	private $prenom;
	private $telephone;
	private $adresse;
	private $sport;

	public function __construct(Array $donne)
	{
		$this->faliciteDon($donne);
	}

	public function setId($id){$this->id = $id;}
	public function id(){return $this->id;}

	public function setNom($nom){$this->nom = $nom;}
	public function nom(){return $this->nom;}

	public function setPrenom($prenom){$this->prenom = $prenom;}
	public function prenom(){return $this->prenom;}

	public function setTelephone($telephone){$this->telephone = $telephone;}
	public function telephone(){return $this->telephone;}

	public function setAdresse($adresse){$this->adresse = $adresse;}
	public function adresse(){return $this->adresse;}

	public function setSport($sport){$this->sport = $sport;}
	public function sport(){return $this->sport;}


	public function faliciteDon($donneArray)
	{
		foreach ($donneArray as $key => $value) 
		{
			$methode = "set".ucfirst($key);
			if(method_exists($this, $methode))
			{
				$this->$methode($value);
			}
		}
	}







}


?>