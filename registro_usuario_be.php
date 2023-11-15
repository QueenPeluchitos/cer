<?php

include 'conexión_be.php';
$Nombre = $_POST['Nombre'];
$Apellido_P = $_POST['Apellido_P'];
$Apellido_M = $_POST['Apellido_M'];
$Direccion = $_POST['Direccion'];
$Correo = $_POST['Correo'];
$Contrasena = $_POST['Contrasena'];

$query = "INSERT INTO cliente(nombre, apellido_paterno, apellido_materno, edad, correo_electronico, contrasenia, direccion) 
          VALUES('$Nombre', '$Apellido_P', '$Apellido_M', 18, '$Correo','$Contrasena','$Direccion')";

$verificar_correo = mysqli_query($conexión, "SELECT * FROM cliente WHERE correo_electronico = '$Correo' ");

if(mysqli_num_rows($verificar_correo) > 0){
    echo '
    <script>
    alert("Este correo ya exite, intenta con otro diferente");
    window.location = "../cer/Formulario.php";
    </script>     
    ';
    exit();
}



$ejecutar = mysqli_query($conexión, $query); 


if($ejecutar){
    echo'
    <script>
    alert("Usuario almacenado correctamente");
    window.location = "../cer/Formulario.php";
    </script>
    ';
}else{
    echo'
<script>
    alert("Error, Intenta de nuevo");
    window.location = "../Formulario.php";
    </script>
';
}

mysqli_close($conexión);
?>