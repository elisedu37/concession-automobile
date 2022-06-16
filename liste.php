<html>

<body>
    <!-- lien pour revenir a la page d'accueil -->
    <p>
        <a href="accueil.html">Retour a l'accueil</a>
    </p>
    <br>
    <?php
            $m = $_GET["mode"];
            // connexion au serveur
            $cnx = mysqli_connect("localhost","root","root");
            if ($cnx) 
            {
                // selection de la base de donnee
                if (mysqli_select_db($cnx,"concession_egigot")) 
                {
                    // si le mode choisi est client, on recupere tous les attributs de la table personne
                    if ($m == "client") 
                    { 
                        $requete = "select * from personne";
                        echo"<h1>Liste des clients</h1>";
                    }
                    // si le mode est voiture, on recupere tous les attributs de la table vehicule
                    else if ($m == "voiture") 
                    { 
                        echo"<h1>Liste des voitures</h1>";
                        $requete = "select * from vehicule";
                    }
                    // si le mode achat est choisi, on joint les 3 tables et on forme des lignes en fonction des id
                    else if ($m == "achat") 
                    { 
                        echo"<h1>Liste des achats</h1>";
                        $requete = "select* FROM achat 
                                                INNER JOIN vehicule on achat.id_vehicule=vehicule.id 
                                                INNER JOIN personne on achat.id_personne=personne.id; ";
                    }
                    $result = mysqli_query($cnx,$requete);
                    if (!$result) {
                        mysqli_close($cnx);
                        die ("Requête échouée dans liste!");
                    }
                    while ($enr = mysqli_fetch_object($result)) 
                    {
                        if ($m == "client") 
                        {
                            // on affiche le nom et prenom du client, ainsi que les liens pour supprimer ou modifier des informations
                            echo"<p><a href='detail.php?id=$enr->id'> $enr->nom,</a> $enr->prenom <a href='verification-suppression-pers.php?id=$enr->id'>Suppression</a> <a href='form_modification_pers.php?id=$enr->id'>Modification</a> </p> ";
                        }
                        else if ($m == "voiture") 
                        { 
                            // on affiche différentes informations concernant le vehicule ainsi que les deux liens
                            echo "<p>$enr->immatriculation, $enr->marque, $enr->modele, $enr->puissance <a href='verification-suppression-voiture.php?id=$enr->id'>Suppression</a> <a href='form_modification_voiture.php?id=$enr->id'>Modification</a></p>";
                        }
                        else if ($m == "achat") 
                        { 
                            // on affiche des informations sur le client qui a achete un vehicule et les liens
                            echo "<p>$enr->nom, $enr->prenom a acheté le véhicule $enr->immatriculation ($enr->marque, $enr->modele, $enr->puissance), le $enr->date, a $enr->prix euros. <a href='verification-suppression-achat.php?id=$enr->id_vehicule'>Suppression</a> <a href='form_modification_achat.php?id=$enr->id_vehicule'>Modification</a> </p>";
                        }  
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
