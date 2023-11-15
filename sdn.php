<?php

session_start();
include 'conexión_be.php';

$id_socio = $_POST['id_socio'];
$nombre_completo = $_POST['Nombre Completo'];
$correo = $_POST['Correo'];
$telefono = $POST['Telefono'];
$mensaje = $_POST['Mensaje'];
//$Contrasena = md5($_POST['Contrasena']);

$query = "INSERT INTO cliente(nombre_completo,correo,telefono,mensaje) 
          VALUES('$nombrecompleto','$correo','$telefono','$mensaje')";

$verificar_correo = mysqli_query($conexión, "SELECT * FROM socio WHERE correo = '$correo' ");

    echo '
    <script>
    alert("Mensaje REcibido");
    window.location = "../cer/Socio.php";
    </script>
    ';

?>