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
                    // on joint les 3 tables et on forme des lignes en fonction des id
                    $requete = "select * from personne, vehicule, achat
                                where achat.id_personne = personne.id
                                and achat.id_vehicule = vehicule.id";
                    $result = mysqli_query($cnx,$requete);
                    if (!$result) 
                    {
                        mysqli_close($cnx);
                        die ("Requête échouée!");
                    }
                    while ($enr = mysqli_fetch_object($result)) 
                    {
                        // on affiche des informations sur le client qui a achete un vehicule
                        echo "<p>$enr->nom, $enr->prenom a acheté le véhicule $enr->immatriculation
                                ($enr->marque, $enr->modele, $enr->puissance).</p>";
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
