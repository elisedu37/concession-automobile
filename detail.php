<html>

<body>
    <!-- lien pour revenir a la page d'accueil -->
    <p>
        <a href="accueil.html">Retour a l'accueil</a>
    </p>
    <?php
           // connexion au serveur
           $cnx = mysqli_connect("localhost","root","root");
           if ($cnx)
           {
               // selection de la base de donnee
               if (mysqli_select_db($cnx,"concession_egigot"))
                {
                   // on recupere l'id
                   $id=$_GET["id"];
                   // requete qui selectionne les attributs de la table personne quand l'id est identique a celui que l'on demande  
                   $requete ="select * from personne where id=$id";
                   $result = mysqli_query($cnx,$requete);
                   $enr = mysqli_fetch_object($result);
                   if ($enr)
                   {
                       echo "<h1>$enr->nom, $enr->prenom</h1>";
                       // liste des achats du client grace a 3 jointures tables 
                       $requete = "SELECT * FROM achat INNER JOIN vehicule on achat.id_vehicule=vehicule.id INNER JOIN personne on achat.id_personne=personne.id where personne.id =$id"; 
                       $result=mysqli_query($cnx,$requete);
                       // si le client n'a pas achete de voiture
                       if (mysqli_num_rows($result)==0)
                       {
                           echo"pas de voiture";
                       }
                       // tant qu'il y a des elements ont les affiches
                        while ($enr = mysqli_fetch_object($result))
                        {
                            echo "<p>$enr->marque ( $enr->modele ) le $enr->date à $enr->prix €</p>";
                        }
                    }
                   else 
                    {
                       echo "<p>Identifiant inconnu !</p>";
                    }
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
