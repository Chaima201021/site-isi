<?php

$nom = $_POST['nom'] ;
$prenom = $_POST['prenom'];
$mail =  $_POST['mail']; 
$mdp = $_POST['mdp'];
$cin = $_POST['cin'];
$ddn = $_POST['ddn'];
$profil = $_POST['profil'];

// yalla database  
$con = new mysqli('localhost','root','','DSJS'); 

if ($con->connect_error)
{
    echo "$con->connect_error";
    die ("leeeeeeeeeeeee");
}
else

{
    $stmt = $con->prepare("insert into inscri(nom, prenom, date_naissance, CIN, e_mail, password, profil) values (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss',$nom, $prenom, $ddn , $cin, $mail, $mdp , $profil );
    $execval = $stmt-> execute();
    echo $execval;
    if ($stmt){
    echo "Inscription effectuer avec succes!!"; }
    else {
        echo"Echec lors de l'inscription!";

    }
    $stmt->close();
    $con->close(); 
}
?>
