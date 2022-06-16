<?php
// on recupere les valeurs du formulaire
$idp = $_POST["idp"];
$idv = $_POST["idv"];
$date = $_POST["date"];
$prix = $_POST["prix"];
// connexion au serveur
$cnx = mysqli_connect( "localhost", "root", "root" );
if ( $cnx ) 
{
    // selection de la base de donnee
    if ( mysqli_select_db( $cnx, "concession_egigot" ) ) 
    {
        // requete pour ajouter les valeurs a la table achat
        $requete = "insert into achat values ('$idp','$idv','$date','$prix')";
        $result = mysqli_query( $cnx, $requete );
        if ( !$result ) 
        {
            mysqli_close( $cnx );
            die ( "requete échouée, l'achat existe deja" );
        }
        mysqli_close( $cnx );
        //Redirection vers la page qui liste les achats
        header( "Location: liste.php?mode=achat" );
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
