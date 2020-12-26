<?php require 'inc/init.inc.php'; ?>
<?php require 'classes/produits.class.php'; ?>
<?php require 'classes/membres.class.php'; ?>
<?php include 'inc/header.php'; ?>

<?php

$membre = new Membre;
if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
{
    $membre->logout();
    $membre->redirect('connexion.php');
}

$produit = new Produit;
$produits = $produit->findAll();

if($membre->is_loggedin()!="")
{
    $id_membre = $_SESSION['membre'];
    $membre->find($id_membre);
}

?>

    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-sm-9">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "
                                <div class='alert alert-danger'>
                                    ".$_SESSION['error']."
                                </div>
                            ";
                            unset($_SESSION['error']);
                        }
                    ?>               
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr> 
                        <th scope="col">Produit</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <?php foreach($produits as $produit) : ?>
                <tbody>
                    <tr>
                        <td><?= $produit["nom_produit"] ?></td>
                        <td><?= ttc($produit["prix_ht"], $produit["tva"]) ?></td>
                        <td><?= $produit["stock_commande"] ?></td>
                    </tr>
                    <tr>
                        <td>TOTAL</td>
                        <td></td>
                        <td></td>
                    </tr>    
                <?php endforeach; ?>
            </table>
        </section>
    </div>
    
<?php include 'inc/footer.php'; ?>
<?php include 'inc/scripts.php'; ?>
    
</body>
</html>