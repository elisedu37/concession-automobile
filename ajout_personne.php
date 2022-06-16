<?php 
// on recupere les valeurs du formulaire
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
// connexion au serveur
$cnx = mysqli_connect( "localhost", "root", "root" );
if ( $cnx ) 
{
    // selection de la base de donnee
    if ( mysqli_select_db( $cnx, "concession_egigot" ) ) 
    {
        // requete pour ajouter les valeurs a la table personne, l'id est auto-incremente, on ne s'en occupe pas
        $requete = "insert into personne values (NULL,'$nom','$prenom')";
        $result = mysqli_query( $cnx, $requete );
        if ( !$result ) 
        {
            mysqli_close( $cnx );
            die ( "requete échouée" );
        }
        mysqli_close( $cnx );
        //Redirection vers la page qui liste les clients
        header( "Location: liste.php?mode=client" );
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
