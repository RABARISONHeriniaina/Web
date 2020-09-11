<?php

class UtilisateurData
{
    private $baseDonnee;

    public function __construct($db)
    {
        $this->setDatabase($db);
    }

    public function ajoutDansBaseDonne(Utilisateur $user)
    {
        $requete = $this->baseDonnee->prepare("INSERT INTO utilisateur(nom,prenom,telephone,adresse,sport) values(:nom,:prenom,:telephone,:adresse,:sport) ");
        $requete->bindValue(':nom',$user->nom(),PDO::PARAM_STR);
        $requete->bindValue(':prenom',$user->prenom(),PDO::PARAM_STR);
        $requete->bindValue(':telephone',$user->telephone(),PDO::PARAM_STR);
        $requete->bindValue(':adresse',$user->adresse(),PDO::PARAM_STR);
        $requete->bindValue(':sport',$user->sport(),PDO::PARAM_STR);
        $requete->execute();
        
    }
    public function getAll()
    {
        $tab = [];
        $requete = $this->baseDonnee->query("SELECT * from utilisateur ORDER BY id_utilisateur DESC");
        while($res = $requete->fetch(PDO::FETCH_ASSOC))
        {
            array_push($tab, $res);
        }
        return $tab;
    }

    public function getSelectedUser($identification)
    {
        $tab = [];
        $requete = $this->baseDonnee->prepare("SELECT * from utilisateur where id_utilisateur=:id");
        $requete->bindValue(':id',$identification,PDO::PARAM_INT);
        $requete->execute();
        while($res = $requete->fetch(PDO::FETCH_ASSOC))
        {
            array_push($tab, $res);
        } 
        return $tab;
    }

    public function compterTous()
    {
        $thsare = "SELECT count(*) from utilisateur";
        $requete = $this->baseDonnee->query($thsare)->fetchColumn();
        return $requete;
    }

    public function miseAjourDonne(Utilisateur $user)
    {
        $requete = $this->baseDonnee->prepare("UPDATE utilisateur SET nom=:nom,prenom=:prenom,telephone=:telephone,adresse=:adresse,sport=:sport where id_utilisateur=:id ");
        $requete->bindValue(':id',$user->id(),PDO::PARAM_INT);
        $requete->bindValue(':nom',$user->nom(),PDO::PARAM_STR);
        $requete->bindValue(':prenom',$user->prenom(),PDO::PARAM_STR);
        $requete->bindValue(':telephone',$user->telephone(),PDO::PARAM_STR);
        $requete->bindValue(':adresse',$user->adresse(),PDO::PARAM_STR);
        $requete->bindValue(':sport',$user->sport(),PDO::PARAM_STR);
        $requete->execute();
    }

    public function supprimerDansBaseDonne(Utilisateur $user)
    {
        $requete = $this->baseDonnee->prepare("DELETE FROM utilisateur where id_utilisateur = :id ");
        $requete->bindParam(':id',$user->id_utilisateur(),PDO::PARAM_INT);
        $requete->execute();
    }

    public function supprimerDansBaseDonneId($user)
    {
        $requete = $this->baseDonnee->prepare("DELETE FROM utilisateur where id_utilisateur = :id ");
        $requete->bindParam(':id',$user,PDO::PARAM_INT);
        $requete->execute();
    }

    private function setDatabase(PDO $db)
    {
        $this->baseDonnee = $db;
    }
}





?>

