<?php
    session_start();
    //Créez une session
    if(isset($_POST['username'])){
      $_SESSION['username']=$_POST['username'];
     
      
    }
    //Annuler la session et déconnecter l'utilisateur du chat
    if(isset($_GET['logout'])){
         unset($_SESSION['username']);
      //    session_destroy();
        header('Location:index.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/css.css">

   <title>Document</title>
</head>
<body>

<div class="test">


<?php


if(isset($_POST['message'])){
$_SESSION['message'][] = array($_SESSION['username'],$_POST['message']);



foreach($_SESSION['message'] as $message) {
    echo $message[0], " : ", $message[1], '<br>';
}


}

 ?>

<div class="test2">

<form method="POST" action="checkData.php">
            <input type="text" placeholder="Entrez votre message ici" name="message">
            <button type="submit">Envoyer</button>
</form>


<?php if(isset($_SESSION['username'])) { ?>
          <a class='logout' href="?logout">Déconnexion</a>
<?php } ?>

</div>

</div>

</body>
</html>