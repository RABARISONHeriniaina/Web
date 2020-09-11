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
				'id'=>$_GET["idMod"],
				'nom'=>$_POST["nomModification"],
				'prenom'=>$_POST["prenomModification"],
				'telephone'=>$_POST["telephoneModification"],
				'adresse'=>$_POST["adresseModification"],
				'sport'=>$_POST["sportModification"]
				];

$user = new Utilisateur($arrayForm);

$notreBaseDonee->miseAjourDonne($user);

header("location:../vue/?ok=1");






?>