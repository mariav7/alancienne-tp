<?php 
require 'inc/init.inc.php';
include 'classes/membres.class.php';
include 'inc/header.php';

    if(isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['ville']) && isset($_POST['code_postal']) && isset($_POST['adresse'])){

        if(!empty($_POST['mdp']) && !empty($_POST['email'])){

            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $nom = htmlentities($_POST['nom']);
            $prenom = htmlentities($_POST['prenom']);
            $email = htmlentities($_POST['email']);
            $ville = htmlentities($_POST['ville']);
            $code_postal = htmlentities($_POST['code_postal']);
            $adresse = htmlentities($_POST['adresse']);

            $membre = new Membre;

            $membre->mdp = $mdp;
            $membre->nom = $nom;
            $membre->prenom = $prenom;
            $membre->email = $email;
            $membre->ville = $ville;
            $membre->code_postal = $code_postal;
            $membre->adresse = $adresse;

            if($membre->create()){
                $_SESSION["messageSuccess"] = "Le nouvel utilisateur a bien été enregistré !";
                header("location:connexion.php");
                exit;
            } else {
                die("Erreur lors de la création !");
            }
        }
    }
?>

<div class="container my-5">
    <form method="POST">
        <div class="row mb-3">
            <div class="col">
                <div class="form-group">      
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Pierre" required="required">
                </div>
            </div>
            <div class="col">
                <div class="form-group">    
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Jean" required="required">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="exemple@gmail.com" required="required">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" class="form-control" name="mdp" placeholder="******" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" name="adresse" placeholder="1 rue de Rivoli" required>
                </div>
            </div>
        
            <div class="col">  
                <div class="form-group"> 
                    <label for="code_postal">Code Postal</label>
                    <input type="text" class="form-control" name="code_postal" placeholder="75001" pattern="[0-9]{5}" title="5 chiffres requis : 0-9" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">             
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" name="ville" placeholder="Paris" pattern="[a-zA-Z]{5,15}" title="Caractères acceptés : a-z A-Z" required>
                </div>
            </div>
        </div>
    
        <button type="submit" class="btn btn-outline-success my-5 mr-3">S'inscrire</button>
        <button type="reset" class="btn btn-outline-danger">Annuler</button>
    </form>
</div>

<?php
include 'inc/footer.php';
include 'inc/scripts.php';
?>