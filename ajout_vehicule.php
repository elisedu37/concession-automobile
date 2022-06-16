<?php 
// on recupere les valeurs du formulaire
$immatriculation = $_POST["immatriculation"];
$marque = $_POST["marque"];
$modele = $_POST["modele"];
$puissance = $_POST["puissance"];
// connexion au serveur
$cnx = mysqli_connect( "localhost", "root", "root" );
if ( $cnx ) 
{
    // selection de la base de donnee
    if ( mysqli_select_db( $cnx, "concession_egigot" ) ) 
    {
        // requete pour ajouter les valeurs a la table vehicule, l'id est auto-incremente, on ne s'en occupe pas
        $requete = "insert into vehicule values (NULL,'$immatriculation','$marque','$modele','$puissance')";
        $result = mysqli_query( $cnx, $requete );
        if ( !$result ) 
        {
            mysqli_close( $cnx );
            die ( "requete échouée" );
        }
        mysqli_close( $cnx );
        //Redirection vers la page qui liste les vehicules
        header( "Location: liste.php?mode=voiture" );
    } 
    else 
    {
        mysqli_close( $cnx );
        die ( "Sélection de la base impossible" );
    }
} 
else 
{
    die( "connexion au serveur impossible !" );
}

?>
