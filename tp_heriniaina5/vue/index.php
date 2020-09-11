<?php
function appelleClass($class)
{
    include("../modele/".$class.".class.php");
}
spl_autoload_register('appelleClass');
$db = new PDO('mysql:host=localhost;dbname=kotranamf','root','');
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$notreBaseDonee = new UtilisateurData($db);

$tabTout = $notreBaseDonee->getAll();

if(isset($_GET["id"]))
{
    $notreBaseDonee->supprimerDansBaseDonneId($_GET["id"]);
    header('location:index.php?ok=0');
}

if(isset($_GET["idModif"]))
{
    $tabModification = $notreBaseDonee->getSelectedUser($_GET["idModif"])[0];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./image/back.svg" type="image/x-icon">
    <link rel="stylesheet" href="./style/style.css">
    <title>Kotrana MF</title>
</head>

<body>
    <div class="blog">
        <div class="background"></div>


        <!-- modifiers -->
        <div class="modifierListe <?php if(isset($_GET["idModif"])) echo "active";?>">
            <div class="formModif">
                <form action="../modele/traiteModif.php?idMod=<?php echo $tabModification['id_utilisateur'];?>" method="POST" name="formModif">
                    <h1>Modification des données</h1>
                    <div class="formulaireComplete">
<label>
    <span>Identification</span>
    <input type="text" name="idMod" readonly="true"  value="<?php echo $tabModification['id_utilisateur'];?>">
</label>
<label>
    <span>Nom</span>
    <input type="text" name="nomModification" value="<?php echo $tabModification['nom']?>">
</label>
<label>
    <span>Prenom</span>
    <input type="text" name="prenomModification"  value="<?php echo $tabModification['prenom']?>">
</label>
<label>
    <span>Telephone</span>
    <input type="text" name="telephoneModification"  value="<?php echo $tabModification['telephone']?>">
</label>
<label>
    <span>Adresse</span>
    <input type="text" name="adresseModification"  value="<?php echo $tabModification['adresse']?>">
</label>
<label>
    <span>Sport</span>
    <input type="text" name="sportModification"  value="<?php echo $tabModification['sport']?>">
</label>
<input type="submit" value="Modifier">
                    </div>
                </form>
                
            </div>
        </div>


        <!-- les listes -->
        <div class="listeInscrit <?php if(isset($_GET['ok'])) echo 'active';?>">
            <span class="cancel" onclick="window.location='index.php'">+</span>
            <div class="tableau">

                <table>
                    <tr>
                        <th>Identification</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Telephone</th>
                        <th>Adresse</th>
                        <th>Sport</th>
                        <th>Options</th>
                    </tr>
                    <tr>
                        <?php
                        foreach ($tabTout as $key => $value) 
                        {
                            foreach ($value as $k => $valeur) 
                            {
                                ?><td><?php echo $valeur;?></td><?php
                            }

                            ?>
                            <td>
                                <a href="?<?php echo "id=".$value["id_utilisateur"]?>"><img src="./image/effacer.png" title="Effacer"></a>
                                <a href="?<?php echo "idModif=".$value["id_utilisateur"]?>"><img src="./image/modifier.png" title="Modifier"></a>
                            </td>  
                        </tr> 
                        <?php 
                    }

                    ?>

                </table>
            </div>

        </div>



        <!-- les formulaires d'inscriptions -->
        <div class="abonnementContact">
            <h1>Inscrivez-vous</h1>
            <form action="../modele/traiteInscripte.php" method="POST" name="inscription">
                <label for="nom">
                    <input type="text" name="Nom" id="nom" required>
                    <span class="bar"></span>
                    <span class="attr">Nom</span>
                </label>
                <label for="prenom">
                    <input type="text" name="Prenom" id="prenom" required>
                    <span class="bar"></span>
                    <span class="attr">Prenom</span>
                </label>
                <label for="contact">
                    <input type="text" name="contact" id="contact" required>
                    <span class="bar"></span>
                    <span class="attr">Telephone</span>
                </label>
                <label for="adresse">
                    <input type="text" name="adresse" id="adresse" required>
                    <span class="bar"></span>
                    <span class="attr">Adresse actuel</span>
                </label>
                <label for="sport">
                    <input type="text" name="sport" id="sport" required>
                    <span class="bar"></span>
                    <span class="attr">Sport a pratiquer</span>
                </label>
                <label for="pro">
                    <input type="checkbox" name="cehch" id="pro">
                    <span class="carre"></span>
                    <span class="motpro">Profesionnel</span>
                </label>
                <a href="http://youtube/com?kotranamf">Abonnez-vous Ici?</a>
                <input type="submit" value="Valider">
            </form>
        </div>
        <div class="contenair">
            <div class="plus" onclick="afficheTableau();"><span>+</span></div>
            <header>
                <h1>Niah KMFav</h1>
            </header>
            <div class="abonez">
                <a href="#">Voir les prochaines entrainements</a>
            </div>
            <section>
                <h2><span>Kotrana MF</span> avec nous</h2>
                <p dir="rtl">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt laudantium accusamus,
                    mollitia
                    culpa velit natus perferendis labore nesciunt eius eligendi, repudiandae necessitatibus doloremque
                    omnis, soluta provident eum sapiente repellendus pariatur neque officiis. Est a asperiores qui ad
                    culpa excepturi consequatur, quaerat at? Voluptate accusamus nobis tempora quia. Quas, eveniet.
                Alias.</p>
                <nav>
                    <ul>
                        <li><img src="./image/Facebook.ico" alt="Facebook" title="Facebook"></li>
                        <li><img src="./image/Instagram.ico" alt="Instagram" title="Instagram"></li>
                        <li><img src="./image/Twitter.ico" alt="Twitter" title="Twitter"></li>
                        <li><img src="./image/FaceTime.ico" alt="FaceTime" title="FaceTime"></li>
                    </ul>
                </nav>
            </section>
        </div>
    </div>

    <script src="./js/function.js"></script>
</body>

</html>