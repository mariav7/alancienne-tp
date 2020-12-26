<?php 
require_once 'inc/init.inc.php';
include 'inc/header.php';

include_once 'classes/membres.class.php';

$membre = new Membre;
if($membre->is_loggedin()!="")
{
 $membre->redirect('index.php');
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    if($membre->login($email, $mdp)){
        $_SESSION["messageSuccess"] = 'Bonjour' . $membreRow['prenom'] . '!';
        $membre->redirect('index.php');
    } else {
        $_SESSION['messageErreur'] = "Mauvaise credentials";
    }
}

?>
<?php
    if(isset($error))
    {
?>
    <div class="alert alert-danger">
        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
    </div>
    <?php
    }
    ?>
<div class="container p-5">
    <form method="POST">
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="mdp" class="form-control">
        </div>

        <button type="submit" name="login" class="btn btn-outline-info">Se connecter</button>
    </form>
</div>
<?php include 'inc/footer.php'; ?>
<?php include 'inc/scripts.php'; ?>