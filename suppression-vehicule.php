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
                   // requete qui recupere les attributs de la table vehicule quand les id correspondent 
                   $requete ="select * from vehicule where id=$id";
                   $result = mysqli_query($cnx,$requete);
                   $enr = mysqli_fetch_object($result);
                   if ($enr)
                   {
                        // on supprime les valeurs avec l'id du vehicule de la table achat 
                        $requete = "DELETE FROM achat WHERE id_vehicule=$id" ; 
                        $result=mysqli_query($cnx,$requete);
                        // on supprime les valeurs avec l'id de la table vehicule
                        $requete = "DELETE FROM vehicule WHERE id=$id" ; 
                        $result=mysqli_query($cnx,$requete);
                   }
                   else 
                   {
                        echo "<p>Identifiant inconnu !</p>";
                   }
			       mysqli_close($cnx);
                   // redirection vers la liste des voitures
                   header("Location: liste.php?mode=voiture");
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
