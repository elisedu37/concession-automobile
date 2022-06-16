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
                    // requete qui recupere les attrubuts de la table achat quand les id correspondent 
			        $requete="select * from achat where id_vehicule=$id;";
                    $result=mysqli_query($cnx,$requete);
                    $enr=mysqli_fetch_object($result);
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
		  }
           else 
           {
				die("connexion au serveur impossible !");
		   }              
    ?>
    <?php
        // creation de liens pour que l'utilisateur confirme qu'il veut supprimer cet achat
        echo "<p>Voulez-vous supprimer cet achat</p>";
        echo "<a href='suppression-achat.php?id=$enr->id_vehicule'>Oui</a><br>";
        echo "<a href='accueil.html'>Non</a>";
    ?>
</body>

</html>
