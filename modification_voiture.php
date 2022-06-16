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
                    $immatriculation = $_POST["immatriculation"];
                    $marque = $_POST["marque"];
                    $modele = $_POST["modele"];
                    $puissance = $_POST["puissance"];
                    // requete qui met a jour la table vehicule avec les nouvelles valeurs quand les id correspondent 
                    $requete ="UPDATE `vehicule` SET `immatriculation` = '$immatriculation', `marque` = '$marque',`modele` = '$modele', `puissance` = '$puissance' WHERE `vehicule`.`id` = $id; ";
                    $result = mysqli_query($cnx,$requete);
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
                // redirection vers la liste des vehicules 
                header("Location: liste.php?mode=voiture");
           }
            else 
            {
                die("connexion au serveur impossible !");
            }
     ?>

</body>

</html>
