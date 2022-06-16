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
                    $id=$_GET["id"];
                    // requete qui recupere les attributs de la table achat quand les id correspondent 
                    $requete ="select * from achat where id_vehicule=$id";
                    $result = mysqli_query($cnx,$requete);
                    $enr = mysqli_fetch_object($result);
                    if ($enr)
                    {
                        // on supprime les valeurs avec l'id de la voiture de la table achat car une voiture peut etre achete par 1 seule personne, cet attribut est unique 
                        $requete = "DELETE FROM achat WHERE achat.id_vehicule = $id" ; 
                        $result=mysqli_query($cnx,$requete);
                    }
                    else 
                    {
                        echo "<p>Identifiant inconnu !</p>";
                    }
                    mysqli_close($cnx);
                    // redirection vers la liste des achats
                    header("Location: liste.php?mode=achat");
               }
               else
               {
                    mysqli_close($cnx);
                    die ("Sélection de la base impossible");
               }
        }
        else 
        {
            die("connexion au serveur impossible !");
        }
    ?>
</body>

</html>
