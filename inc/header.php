<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Test Technique Alancienne</title>
    <meta name="author" content="Maria Villegas">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://kit.fontawesome.com/5f47dca840.js" crossorigin="anonymous"></script>  

</head>
<body>
<div class="container-fluid m-0 p-0">  
    <nav class="mb-5 navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div>
                <a class="navbar-brand" href="index.php">E-commerce</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">CATALOGUE</a>
                    </li>
                    <?php
                if(isset($_SESSION['membre']) && $row['statut'] == 1) : ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="admin/editer-catalogue.php">EDIT CATALOGUE</a>
                    </li>
                <?php endif ?>
                </ul>
            </div>
            
            
            <div class=" dropdown px-4">
                <a class="toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="badge badge-danger cart_count" id="cart-count""></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <h6 class="dropdown-header">Vous avez <span class="cart_count"></span> produit(s) dans votre panier</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="panier.php">Aller au panier </a>
                </div>
            </div>
            
            <?php
                if(utilisateurEstConnecte() || utilisateurEstConnecteEtEstAdmin()) : ?>
                
                    <div class="dropdown user user-menu px-4">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs"><?php 'nom'." ". 'prenom'?></span>
                        </a>
                        <ul class='dropdown-menu'>
                            <li class='user-header'>
                                <p><?php 'prenom'." ".'nom' ?></p>
                            </li>
                            <li class='user-footer'>
                                <div class='pull-right'>
                                    <a href='index.php?action=deconnexion' class='btn btn-default btn-flat'>Déconnexion</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php endif ?>
                    <a href='connexion.php' class='px-4'>CONNEXION</a>
                    <a href='inscription.php' class='px-4'>S'INSCRIRE</a>
        </div>
    </nav>
    
    <?php if(!empty($_SESSION["messageErreur"])) : ?>
        <div class="alert alert-danger container">
            <?= $_SESSION["messageErreur"] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php 
        unset($_SESSION["messageErreur"]);
        endif;
    ?>

    <?php if(!empty($_SESSION["messageSuccess"])) : ?>
        <div class="alert alert-success container">
            <?= $_SESSION["messageSuccess"] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php 
        unset($_SESSION["messageSuccess"]);
        endif; 
    ?>
    
    <div class="container mt-3">