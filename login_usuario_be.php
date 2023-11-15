<?php

session_start();
include 'conexión_be.php';

$Correo = $_POST['Correo'];
$Contrasena = $_POST['Contrasena'];
//$Contrasena = md5($_POST['Contrasena']);

$validar_login = mysqli_query($conexión, "SELECT * FROM cliente WHERE correo_electronico = '$Correo'
and contrasenia='$Contrasena'");

if(mysqli_num_rows($validar_login) > 0){
$_SESSION['correo_electronico'] = $Correo;
header("Location: ../cer/bienvenida.php");    
    exit();
}else{
    echo '
    <script>
    alert("Este usuario no existe");
    window.location = "../cer/Formulario.php";
    </script>
    ';
    exit();
    }

?>