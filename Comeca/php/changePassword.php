<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rapport Réunion</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta name="google-site-verification" content="yhmbulUfHP8M8ExN_ZTmTL1tQawRgEvjFKcjSt8pkmQ" />
  <!-- Template Main CSS File -->
  <link href="../css/changePassword.css" rel="stylesheet">


</head>


<body class="align">
    
        <h1>Changer de mot de passe :</h1>
      <div class="grid">
    
        
        
        <form action="" method="POST" class="form login">
    
          <div class="form__field">
            <label for="login__username"><svg class="icon">
                <use xlink:href="#icon-user"></use>
              </svg><span class="hidden">username</span></label>
            <input autocomplete="username" id="login__username" type="text" name="changeMail" class="form__input" placeholder="Mail" required>
          </div>
    
          <div class="form__field">
            <label for="login__password"><svg class="icon">
                <use xlink:href="#icon-lock"></use>
              </svg><span class="hidden">Ancien mot de passe</span></label>
            <input id="login__password" type="password" name="changePassword" class="form__input" placeholder="Ancien mot de passe" required>
          </div>
          
          
          <div class="form__field">
            <label for="login__password"><svg class="icon">
                <use xlink:href="#icon-lock"></use>
              </svg><span class="hidden">Nouveau mot de passe</span></label>
            <input id="login__password" type="password" name="changeNewPassword" class="form__input" placeholder="Nouveau mot de passe" required>
          </div>
    
          <div class="form__field">
            <input type="submit" value="Valider le changement">
          </div>
    
        </form>
    
      </div>
     
 
      <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
          <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
        </symbol>
        <symbol id="icon-lock" viewBox="0 0 1792 1792">
          <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
        </symbol>
        <symbol id="icon-user" viewBox="0 0 1792 1792">
          <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
        </symbol>
      </svg>


    <?php
        
      if (isset($_POST["changeMail"]) && isset($_POST["changePassword"]) && isset($_POST["changeNewPassword"])) {

            $peutChangerPassword = false;

      $host ="localhost";    //Nom de l'hote
      $bdd = "id21894523_syndicat";       //nom de la base de données
      $user = "id21894523_rapport";
      $password = "#SiteComeca4868";

      //On essaie de se connecter
      try {    //Connexion à la base et au serveur
        $cnn = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",$user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      }
      // En cas d'erreur, on affiche un message et arrete tout
      catch(PDOExeption $e) {
        echo "Erreur : " . $e->getMessage();
      }

            $resultat = $cnn->prepare('SELECT password, mail FROM user WHERE mail = :mail');
            $resultat->bindParam(':mail', $_POST["changeMail"], PDO::PARAM_STR);
            $resultat->execute();
            
            $row = $resultat->fetch();

            if (password_verify($_POST["changePassword"], $row['password'])) { 
                $_SESSION['isLogin'] = "Confirmer";
                $_SESSION['Rang'] = "admin";
                // Rediriger l'utilisateur vers une autre page après la connexion réussie
                //header("refresh: 1");  //Refresh la page pour afficher "Mon compte"
                $peutChangerPassword = true;

            } else{
                echo "Vous vous êtes sûrement trompé, veuillez réessayer";
            }
            $resultat->closeCursor();
            $cnn = null;

      }
    ?>
    
     <?php 
    
      if ($peutChangerPassword == true) {

    
            // Se connecter à la base de données
            $host = "localhost"; // Adresse du serveur MySQL
            $dbname = "id21894523_syndicat"; // Nom de la base de données
            $username = "id21894523_rapport"; // Nom d'utilisateur MySQL
            $password = "#SiteComeca4868"; // Mot de passe MySQL
    
      //On essaie de se connecter
      try {    //Connexion à la base et au serveur
        $cnn = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",$user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      }
      // En cas d'erreur, on affiche un message et arrete tout
      catch(PDOExeption $e) {
        echo "Erreur : " . $e->getMessage();
      }
            
            
            
            // Préparer et exécuter la requête SQL pour mettre à jour le mot de passe dans la base de données
            $resultat = $cnn->prepare('UPDATE user SET password = :password WHERE mail = :mail');
            $resultat->bindParam(':password', password_hash($_POST["changeNewPassword"], PASSWORD_DEFAULT)); // Hacher le nouveau mot de passe avant de le stocker dans la base de données
            $resultat->bindParam(':mail', $_POST["changeMail"]);
            $resultat->execute();
            $cnn = null;
            ?>
            <p>Bravo, vous avez réussi à changer de mot de passe, pour continuer, veuillez vous reconnecter</p>
            <?php
            
      }
    ?> 

    

    <form action="https://rapportreunion.000webhostapp.com/index.php" method="POST"  class="form login">
      <div class="form__field">
        <input type="submit" value="Veuillez vous connecter, une fois le mot de passe modifié">
      </div>
    </form>
    
    
</body>

</html>