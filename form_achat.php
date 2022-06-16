<html>

<body>
    <!-- lien pour revenir a la page d'accueil -->
    <p>
        <a href="accueil.html">Retour a l'accueil</a>
    </p>
    <br>
    <h1>Formulaire d'ajout d'un achat</h1>
    <!-- formulaire pour ajouter un achat avec la methode post -->
    <form method="post" action="ajout_achat.php">
        <p>Client:
            <select name="idp">
                <?php
                // connexion au serveur
                $cnx = mysqli_connect("localhost","root","root");
	            if ($cnx)
                {  
                    // selection de la base de donnee
		              if (mysqli_select_db($cnx,"concession_egigot"))
                      {
                             // requete qui recupere la liste des clients
			                 $requete="select * from personne;";
                             $result=mysqli_query($cnx,$requete);
                             // tant qu'il y a des clients ont les affiches sous la forme <option>
                             while ($enr=mysqli_fetch_object($result))
                             {
                                 echo "<option value='$enr->id'>$enr->nom, $enr->prenom</option>";
                             } 			
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
            </select>
        </p>
        <p>Véhicule:
            <select name="idv">
                <?php
                 // connexion au serveur
                 $cnx = mysqli_connect("localhost","root","root");
	             if ($cnx)
                 {
                      // selection de la base de donnee
		              if (mysqli_select_db($cnx,"concession_egigot"))
                      {
                            // requete qui recupere la liste des vehicules
                            $requete="select * from vehicule;";
                            $result=mysqli_query($cnx,$requete);
                            // tant qu'il y a des vehicules ont les affiches sous la forme <option>
                            while ($enr=mysqli_fetch_object($result))
                            {
                                echo "<option value='$enr->id'>$enr->immatriculation, $enr->marque, $enr->modele, $enr->puissance </option>";
                            }   			
                            if(!$result){
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
            </select>
        </p>
        <p>Date: <input type="date" name="date" /></p>
        <p>Prix: <input type="text" name="prix" /></p>
        <p><input type="submit" /></p>

    </form>
</body>

</html>
