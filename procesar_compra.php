<?php
include 'conexión_be.php';

session_start();

if(!isset($_SESSION['correo_electronico'])){
  echo '
  <script>
   alert("Debes iniciar sesión para ingresar");
   window.location = "Formulario.php";
  </script>
  ';
  session_destroy();
  die();
}

if (isset($_GET['message'])) {
  $message = $_GET['message'];

  $cadena = $message;
  $confirmado = "";
  $producto = "";

  if (strpos($cadena, "comprar") !== false) {
    $confirmado = "Sí";
    preg_match('/\d+/', $cadena, $match);
    $producto = $match[0];
    echo '<script>alert("El producto se añadio a tu carrito.");</script>';
  } elseif (strpos($cadena, "carrito") !== false) {
    $confirmado = "No";
    preg_match('/\d+/', $cadena, $match);
    $producto = $match[0];
    echo '<script>alert("El producto se añadio a tu carrito.");</script>';
  }

  $servername = "localhost";
  $username = "Solis";
  $password = "2328rmsr";
  $dbname = "autopartes";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
  }
  
  $cliente_id = '';
  $sql = "SELECT id_cliente FROM cliente WHERE correo_electronico = '{$_SESSION['correo_electronico']}'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $cliente_id = $row['id_cliente'];
  } else {
    $conn->close();
    die();
  }

  $sql = "INSERT INTO detalles_venta (cliente_id, producto_id, fecha, compra_confirmada, cantidad) VALUES ('$cliente_id','$producto',NOW(),'$confirmado',1)";
  if (mysqli_query($conn, $sql)) {
    // Datos insertados correctamente
  } else {
    // Error al insertar los datos
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html>

  <script>
    // Redireccionar después de 3 segundos
    setTimeout(function() {
      window.location.href = "carrito.php";
    }, 500);
  </script>
</body>
</html>

