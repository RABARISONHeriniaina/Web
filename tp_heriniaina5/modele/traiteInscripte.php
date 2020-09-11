<?php

function appelleClass($class)
{
	include($class.".class.php");
}
spl_autoload_register('appelleClass');

$db = new PDO('mysql:host=localhost;dbname=kotranamf','root','');
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);


$notreBaseDonee = new UtilisateurData($db);

$arrayForm = [
				'id'=>0,
				'nom'=>$_POST["Nom"],
				'prenom'=>$_POST["Prenom"],
				'telephone'=>$_POST["contact"],
				'adresse'=>$_POST["adresse"],
				'sport'=>$_POST["sport"]
				];

$user = new Utilisateur($arrayForm);

$notreBaseDonee->ajoutDansBaseDonne($user);

header("location:../vue/?ok=1");






?>