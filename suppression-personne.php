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
                   // requete qui recupere les attributs de la table personne quand les id correspondent 
                    $requete ="select * from personne where id=$id";
                    $result = mysqli_query($cnx,$requete);
                    $enr = mysqli_fetch_object($result);
                    if ($enr)
                    {
                        // on supprime les valeurs avec l'id de la personne de la table achat 
                        $requete = "DELETE FROM achat WHERE id_personne=$id" ; 
                        $result=mysqli_query($cnx,$requete);   
                        // on supprime les valeurs avec l'id de la personne de la table personne 
                        $requete = "DELETE FROM personne WHERE id=$id" ; 
                        $result=mysqli_query($cnx,$requete);
                    }
                    else 
                    {
                        echo "<p>Identifiant inconnu !</p>";
                    }   
			        mysqli_close($cnx);
                    // redirection vers la liste des clients
                    header("Location: liste.php?mode=client");
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
