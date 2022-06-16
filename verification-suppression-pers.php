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
                    // requete qui recupere les attributs de la table personne quand les id correspondent 
			        $requete="select * from personne where id=$id;";
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
        // creation de liens pour que l'utilisateur confirme qu'il veut supprimer ce client
        echo "<p>Voulez-vous supprimer $enr->nom, $enr->prenom</p>";
        echo "<a href='suppression-personne.php?id=$enr->id'>Oui</a><br>";
        echo "<a href='accueil.html'>Non</a>";
    ?>
</body>

</html>
