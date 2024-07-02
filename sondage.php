<?php

session_start();
$var=$_SESSION['mail']; 
$mot=$_SESSION['password']; 

$username = "root";
$password = "";
$hostname = "localhost";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$dbhandle = mysqli_connect($hostname, $username, $password);
$selected = mysqli_select_db($dbhandle, "DSJS");
$sql = "SELECT * FROM inscri WHERE e_mail='$var' AND password='$mot'";
$result = mysqli_query($dbhandle, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$reponse = $_POST['vote'];
$prenom = $row["prenom"]; 
$nom = $row["nom"];



// yalla database  
$con = new mysqli('localhost','root','','DSJS'); 

if ($con->connect_error)
{
    echo "$con->connect_error";
    die ("leeeeeeeeeeeee");
}
else

{
    $stmt = $con->prepare("insert into sondage(nom, prenom, reponse) values (?, ?, ?)");
    $stmt->bind_param('sss',$nom, $prenom, $reponse);
    $execval = $stmt-> execute();
    echo $execval;
    if ($stmt){
    echo "Sondage effectuer avec succes!!"; }
    else {
        echo"Echec";

    }
    $stmt->close();
    $con->close(); 
}
?>
