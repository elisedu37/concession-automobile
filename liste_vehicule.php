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
                    // on recupere tous les attributs de la table vehicule
                    $requete = "select * from vehicule";
                    $result = mysqli_query($cnx,$requete);
                    if (!$result) 
                    {
                        mysqli_close($cnx);
                        die ("Requête échouée!");
                    }
                    while ($enr = mysqli_fetch_object($result)) 
                    {
                        // on affiche différentes informations concernant le vehicule
                        echo "<p>$enr->immatriculation, $enr->marque, $enr->modele, $enr->puissance</p>";
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
                die ("Connexion au serveur impossible");
            }
        ?>
</body>

</html>
