<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rapport Réunion</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Template Main CSS File -->
  <link href="../css/ajoutUtilisateur.css" rel="stylesheet">


</head>


<body class="align">
    
    <?php

    ?>
    
    
    <p><?php echo $row['rang']; ?></p>        
            
            

    <h1>Ajouter un nouvel utilisateur :</h1>
      <div class="grid">
    
        <form action="" method="POST" class="form login">
    
          <p>Information sur le nouvel utilisateur :</p>
          <div class="form__field">
            <label for="login__username"><svg class="icon">
                <use xlink:href="#icon-user"></use>
              </svg><span class="hidden">Username</span></label>
            <input autocomplete="Nom" id="login__username" type="text" name="signNom" class="form__input" placeholder="Nom" required>
          </div>
          
          <div class="form__field">
            <label for="login__username"><svg class="icon">
                <use xlink:href="#icon-user"></use>
              </svg><span class="hidden">Username</span></label>
            <input autocomplete="Prenom" id="login__username" type="text" name="signPrenom" class="form__input" placeholder="Prenom" required>
          </div>
          
          
          
          <div class="form__field">
            <label for="login__username"><svg class="icon">
                <use xlink:href="#icon-user"></use>
              </svg><span class="hidden">Username</span></label>
            <input autocomplete="Mail" id="login__username" type="text" name="signMail" class="form__input" placeholder="Mail" required>
          </div>
          
          
    
          <div class="form__field">
            <label for="login__password"><svg class="icon">
                <use xlink:href="#icon-lock"></use>
              </svg><span class="hidden">Password</span></label>
            <input id="login__password" type="password" name="signPassword" class="form__input" placeholder="Password" required>
          </div>
    
    
          
          <p>Rang : admin ou employé</p>
          <div class="form__field">
            <label for="login__username"><svg class="icon">
                <use xlink:href="#icon-user"></use>
              </svg><span class="hidden">Username</span></label>
            <input autocomplete="Rang" id="login__username" type="text" name="signRang" class="form__input" placeholder="Rang" required>
          </div>
          
          
          
          <p>Information sur l'admin qui ajoute :</p>
          <div class="form__field">
            <label for="login__username"><svg class="icon">
                <use xlink:href="#icon-user"></use>
              </svg><span class="hidden">Username</span></label>
            <input autocomplete="Rang" id="login__username" type="text" name="signMailAdmin" class="form__input" placeholder="Mail de l'admin" required>
          </div>
          
          
          <div class="form__field">
            <label for="login__password"><svg class="icon">
                <use xlink:href="#icon-lock"></use>
              </svg><span class="hidden">Password</span></label>
            <input id="login__password" type="password" name="signPasswordAdmin" class="form__input" placeholder="Password de l'admin" required>
          </div>
          
          <div class="form__field">
            <input type="submit" value="Enregistrer cette utilisateur">
          </div>
    
        </form>
    
      </div>
      
    
        <form action="https://rapportreunion.000webhostapp.com/php/rapport.php" method="POST"  class="form login">
          <div class="form__field">
            <input type="submit" value="Retourner aux rapports">
          </div>
        </form>
    
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

    
      if (isset($_POST["signNom"]) && isset($_POST["signPrenom"]) &&isset($_POST["signMail"]) && isset($_POST["signPassword"]) && isset($_POST["signMailAdmin"]) && isset($_POST["signPasswordAdmin"])) {


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
        
            $resultat = $cnn->prepare('SELECT rang FROM user WHERE mail = :mail');
            $resultat->bindParam(':mail', $_POST["signMailAdmin"], PDO::PARAM_STR);
            $resultat->execute();
            
            $row = $resultat->fetch();
        
            $peutAjouter = false;
            
            
            
            if ($row['rang'] == "admin") { 
                $peutAjouter = true;
                
        
            } else{
                echo "Vous n'avez pas les permissions requises, pour ajouter un utilisateur";
            }
            $resultat->closeCursor();
            $cnn = null;

      } else {?>
          <p>Vous n'avez pas remplie toutes les informations</p>
      <?php
      }
    ?>





    <?php 

    
      if ($peutAjouter == true) {


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

            $resultat = $cnn->prepare('INSERT INTO user (nom, prenom, mail, password, rang) VALUES (:nom, :prenom, :mail, :password, :rang)');

            $resultat->bindParam(':nom', $_POST["signNom"], PDO::PARAM_STR);
            $resultat->bindParam(':prenom', $_POST["signPrenom"], PDO::PARAM_STR);
            $resultat->bindParam(':mail', $_POST["signMail"], PDO::PARAM_STR);
            $resultat->bindParam(':rang', $_POST["signRang"], PDO::PARAM_STR);

            $hashPassword = password_hash($_POST["signPassword"], PASSWORD_DEFAULT);
            $resultat->bindParam(':password', $hashPassword, PDO::PARAM_STR);

            $resultat->execute();

            $resultat->closeCursor();
            $cnn = null;
            
            ?>
            <P>L'utilisateur, a été ajouté avec succès !</P>
            <?php
      }
    ?>
    

</body>

</html>