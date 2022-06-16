<html>

<body>

    <?php
           // connexion au serveur
           $cnx = mysqli_connect("localhost","root","root");
           if ($cnx)
           {
               // selection de la base de donnee
               if (mysqli_select_db($cnx,"concession_egigot"))
                   {
                   // on recupere les valeurs
                   $id=$_GET["id"];
                   $date = $_POST["date"];
                   $prix = $_POST["prix"];
                   // on met a jour la table achat avec les nouvelles valeurs quand les id correspondent 
                   $requete ="UPDATE `achat` SET `date` = '$date', `prix` = '$prix' WHERE `id_vehicule` = $id; ";
                   $result = mysqli_query($cnx,$requete);
                  echo $requete;
			         if(!$result)
                     {
					       mysqli_close($cnx);
					       die ("requete échouée");
			         }
                  mysqli_close($cnx);
                  }
                  else
                  {
                        mysqli_close($cnx);
                        die ("Sélection de la base impossible");
                  }
                  // redirection vers la page liste des achats
                  header("Location: liste.php?mode=achat");
           }
            else 
            {
                die("connexion au serveur impossible !");
            }
    ?>

</body>

</html>
