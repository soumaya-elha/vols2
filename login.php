<?php
$db = mysqli_connect("localhost","root","","db_vols2");

session_start(); // ouvrir une session
if (isset($_SESSION['username'])) { // si il y'a une session ouvert
    header('location: admine.php'); // redirect vers la page admine
    exit();
} elseif (isset($_SESSION['user'])) {
    header('location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // si la methode de la formulaire est POST

    $username = $_POST['user'];
    $password = $_POST['pass'];
   

    $stmt = $db->prepare("SELECT userID, username, password FROM users WHERE username = ? AND password = ? AND groupeID = 1");
    $stmt->execute(array($username, $password));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    if ($count > 0) {
        $_SESSION['username'] = $username; // SESSION USERNAME
        $_SESSION['id'] = $row['userID']; // SESSION ID
        header('location: admine.php'); // REDIRECT VERS PAGE admine
        exit();
    } 

    $stmt2 = $db->prepare("SELECT userID, username, password FROM users WHERE username = ? AND password = ? AND groupeID = 0");
    $stmt2->execute(array($username, $password));
    $row2 = $stmt2->fetch();
    $count2 = $stmt2->rowCount();

    if ($count2 > 0) {
        $_SESSION['user'] = $username; // SESSION USERNAME
        $_SESSION['id'] = $row['userID']; // SESSION ID
        header('location: index.php'); // REDIRECT VERS PAGE index
        exit();
    }
}

?>

<?php include ('includes/nav.php'); ?>
<link rel="stylesheet" href="css/login-insc.css">
<div class= "header">
    <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h4 class="text-center"> Login</h4>
        <input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off">
        <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password">
        <input type="submit"  class="btn" value="login">
        
       
    </form>
</div>

