<?php
include '../Model/user.php';
include '../Model/conexion.php';
$femail=$_POST ['femail'];
$fpassword=$_POST ['fpassword'];
//echo "El email es ($femail) y la contraseña es ($fpassword)";
//Creo objeto user a traves de la clase
$user=new User($femail, $fpassword);
echo $user->getEmail();
echo "<br>";
echo $user->getPassword();
$sql="SELECT * FROM tbl_user WHERE email=? AND password=?";
$smt=$conn->prepare($sql);
$smt->bindParam(1, $femail);
$smt->bindParam(2, $fpassword);
$smt->execute();
$numuser=$smt->rowcount();
echo $numuser
if ($numuser == 1){
    header("location: ../View/home.php");
}else{
    header("location: ../View/vista_login.html?error=1");
}
