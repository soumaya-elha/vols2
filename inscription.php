<?php
$db = mysqli_connect("localhost","root","","db_gestionVols");
$do = isset($_GET['do']) ? $_GET['do'] : 'add';



?>

<?php include ('includes/nav.php'); ?>
<link rel="stylesheet" href="css/login-insc.css">
<div class= "header1">
    <h4 class="text-center"> Inscription</h4>
    <form class="login" action="?do=insert " method="POST">
        <div>
            <input class="form-control" type="text" name="user" placeholder="Username">
        </div>
        <div>
            <input class="form-control" type="text" name="email" placeholder="Email">
        </div>
        <div>
            <input class="form-control" type="password" name="pass" placeholder="Mot de passe" >
        </div>
        <div>
            <input class="form-control" type="password" name="pass" placeholder="Confirme" >
        </div>
        <div>
            <input type="submit" class="btn" value="Inscrivez-Vous">
        </div>
    </form>
</div>

