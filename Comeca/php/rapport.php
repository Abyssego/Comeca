<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rapport Réunion</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Template Main CSS File -->
  <link href="../css/rapport.css" rel="stylesheet">


</head>


<body class="align">
    
    <?php 
    
      if (isset($_POST["signMail"]) && isset($_POST["signPassword"])) {


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

            $resultat = $cnn->prepare('SELECT password, mail, rang FROM user WHERE mail = :mail');
            $resultat->bindParam(':mail', $_POST["signMail"], PDO::PARAM_STR);
            $resultat->execute();
            
            $row = $resultat->fetch();

            if (password_verify($_POST["signPassword"], $row['password'])) { 
                $_SESSION['isLogin'] = "Confirmer";
                $_SESSION['Rang'] = $row['rang'];
                $_SESSION['idMail'] = $row['mail'];
                // Rediriger l'utilisateur vers une autre page après la connexion réussie
                //header("refresh: 1");  //Refresh la page pour afficher "Mon compte"
                

            } else{
                echo "Vous vous êtes sûrement trompé, veuillez réessayer";
            }
            $resultat->closeCursor();
            $cnn = null;

      }
    ?>
    
    
    
    
    
    
    
    
    
    
  <?php
  if($_SESSION['isLogin'] == "Confirmer") {?>
    <h2>Liste des PDFs</h2>
    <ul>
        <?php
        $directory = "uploads/";
        $files = glob($directory . "*.pdf");
        
        foreach ($files as $file) {
            $fileName = basename($file);
            echo "<li>";
            echo "<a href='uploads/$fileName' target='_blank'>$fileName</a>";
            if($_SESSION['Rang'] == "admin") {
                echo "<form action='delete_pdf.php' method='post'>";
                echo "<input type='hidden' name='pdf_file' value='$fileName'>";
                echo "<button type='submit' name='delete'>Supprimer</button>";
                echo "</form>";
            }
            echo "</li>";
        }
        ?>
    </ul>
    <?php
    if($_SESSION['Rang'] == "admin") {?>
        <h2>Uploader un fichier PDF</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="pdfFile" accept=".pdf" required>
            <button type="submit" name="submit">Uploader</button>
        </form>

        <form action="https://rapportreunion.000webhostapp.com/php/ajoutUtilisateur.php" method="POST"  class="form login">
          <div class="form__field">
            <input type="submit" value="Ajouter un utilisateur">
          </div>
        </form>
    <?php
    }
    ?>
    
    
    



    
    



    
    
    
    
    <h2>Changer de compte ou de mot de passe</h2>

    <form action="https://rapportreunion.000webhostapp.com/index.php" method="POST"  class="form login">
      <div class="form__field">
        <input type="submit" value="Changer de compte">
      </div>
    </form>
    
    <form action="https://rapportreunion.000webhostapp.com/php/changePassword.php" method="POST"  class="form login">
      <div class="form__field">
        <input type="submit" value="Changer de mot de passe">
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
  }
  ?>


    <?php 

    
      if (isset($_POST["signNom"]) && isset($_POST["signPrenom"]) &&isset($_POST["signMail"]) && isset($_POST["signPassword"])) {


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

      }
    ?>
    
    <?php
    if($_SESSION['isLogin'] != "Confirmer") {?>
    
    <p>Veuillez vous connectez : </p>
    <form action="https://rapportreunion.000webhostapp.com/index.php" method="POST"  class="form login">
      <div class="form__field">
        <input type="submit" value="Page de connection">
      </div>
    </form>
    
    <?php
    }
    ?>

</body>

</html>