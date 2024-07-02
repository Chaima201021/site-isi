<?php

// yalla database  
$con = new mysqli('localhost','root','','DSJS'); 

if ($con->connect_error)
{
    echo "$con->connect_error";
    die ("leeeeeeeeeeeee");
} 

else

{



$username =  $_POST['mail']; 
$password = $_POST['mdp'];

$sql = "SELECT * FROM inscri WHERE e_mail='$username' AND password='$password'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0)
{
session_start();
$_SESSION['mail'] = $username;
$_SESSION['password'] = $password; 


   
$row = $result -> fetch_array(MYSQLI_ASSOC);
if ($row["profil"] == "Etudiant")
{
header('Location: espace_etudiant.php');
}
else
{
header('Location: espace_enseignant.php');
}
   
exit;
} 
else 
{
echo "Invalid username or password.";
}


$con->close(); 
}
?>