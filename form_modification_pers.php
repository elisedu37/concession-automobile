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
                   // requete qui recupere les attributs de la table personne du client
                   $requete ="select * from personne where id=$id";
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
    	echo "<form method='post' action='modification_pers.php?id=$enr->id'> ";
    ?>
    <p>
        Nom : <input type="text" name="nom" value="<?php echo $enr->nom; ?>" />
    </p>
    <p>
        Prenom : <input type="text" name="prenom" value="<?php echo $enr->prenom ; ?>" />
    </p>
    <p>
        <input type="submit" />
    </p>
    <?php
	   echo "</form>";
    ?>
</body>

</html>
