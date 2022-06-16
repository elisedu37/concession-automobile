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
                    $nom = $_POST["nom"];
                    $prenom = $_POST["prenom"];
                    // on met a jour la table personne avec les nouvelles valeurs quand les id correspondent 
                    $requete ="UPDATE `personne` SET `nom` = '$nom', `prenom` = '$prenom' WHERE `personne`.`id` = $id; ";
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
                // redirection vers la page liste des clients
                header("Location: liste.php?mode=client");
           }
            else 
            {
                die("connexion au serveur impossible !");
            }
    ?>

</body>

</html>
