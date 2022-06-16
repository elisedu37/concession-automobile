<html>

<body>
    <!-- lien pour revenir a la page d'accueil -->
    <p>
        <a href="accueil.html">Retour a l'accueil</a>
    </p>
    <br>
    <?php
           // connexion au serveur
           $cnx = mysqli_connect("localhost","root","root");
           if ($cnx)
           {
               // selection de la base de donnee
               if (mysqli_select_db($cnx,"concession_egigot"))
               {
                   $id=$_GET["id"];
                   // requete qui recupere les attributs de la table vehicule du client
                   $requete ="select * from vehicule where id=$id";
                   $result = mysqli_query($cnx,$requete);
                   $enr = mysqli_fetch_object($result);
			       mysqli_close($cnx);
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
    <!-- formulaire de modification avec les valeurs deja dans la base -->
    <p>Modification</p>
    <?php
    	echo "<form method='post' action='modification_voiture.php?id=$enr->id'> ";
    ?>
    <p>
        Immatriculation : <input type="text" name="immatriculation" value="<?php echo $enr->immatriculation; ?>" />
    </p>
    <p>
        Marque : <input type="text" name="marque" value="<?php echo $enr->marque ; ?>" />
    </p>
    <p>
        Modele : <input type="text" name="modele" value="<?php echo $enr->modele; ?>" />
    </p>
    <p>
        Puissance : <input type="number" name="puissance" value="<?php echo $enr->puissance ; ?>" />
    </p>
    <p>
        <input type="submit" />
    </p>
    <?php
	   echo "</form>";
    ?>
</body>

</html>
