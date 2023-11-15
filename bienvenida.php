<?php

session_start();
include 'conexión_be.php';

if(!isset($_SESSION ['correo_electronico'])){
  echo '
  <script>
   alert("Debes iniciar sesion para ingresar");
   window.location = "../cer/Formulario.php";
  </script>
  ';
  //header("location: Formulario.php");
  session_destroy();
  die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Estilos.css">
    <script src="https://kit.fontawesome.com/b33d75bbb8.js" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="js/carrito_compra.js"></script>
    <title>Carrito | APZ</title>
    
       <link rel="icon" href="imagenes/icona.png">
    
       <script src="js/script.js" defer></script>

       <body>
      </head>
      <header>
         <div class="logo">
           <ul>
           <img src="imagenes/Zakapu.png" alt="logo compañia">
           </ul>
           <h2 class="company-name">AUTOPARTES ZACAPU</h2>


           </div>
              <div class="search">
              <form action="busqueda.php" method="POST">
              <input type="text" class="search-text" placeholder="Buscar productos, marcas y más...." name="search_query"> 
              <button> <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a> </button>
              </form>
            </div>
            
            
            <div class="cart-shopping">
 <a href="Formulario.php"><i class="fa-solid fa-cart-shopping"></i></a> 
</div>
<div class="user">
  <a href="http://localhost/cer/Formulario.php"><i class="fa-solid fa-user"></i></a>
</div>
<ul class="menu">
  <li><a href="http://localhost/cer/Formulario.php">Crea tu cuenta</a></li>
  <li><a href="http://localhost/cer/ofertas.php">Ofertas</a></li>
  <li><a href="">Refacciones ↓</a>
<ul class="vertical-menu">
  <li><a href="http://localhost/cer/Todas.php">Todas</a></li>
  <li><a href="">Por tipo ></a>
    <ul>
    <li><a href="http://localhost/cer/Motores.php">Motores</a></li>
    <li><a href="http://localhost/cer/Frenos.php">Frenos</a></li>
    <li><a href="http://localhost/cer/Suspensiones.php">Suspension</a></li>
    <li><a href="http://localhost/cer/Aceites.php">Aceites</a></li>
    <li><a href="http://localhost/cer/Repuestos.php">Repuestos</a></li>
    </ul>
  </li>
  <li><a href="">Por marca ></a>
    <ul>
    <li><a href="http://localhost/cer/Toyota.php">Toyota</a></li>
    <li><a href="http://localhost/cer/Ford.php">Ford</a></li>
    <li><a href="http://localhost/cer/Honda.php">Honda</a></li>
    <li><a href="http://localhost/cer/Chevrolet.php">Chevrolet</a></li>
    <li><a href="http://localhost/cer/Volkswagen.php">Volkswagen</a></li>
    <li><a href="http://localhost/cer/BMW.php">BMW</a></li>
    <li><a href="http://localhost/cer/Audi.php">Audi </a></li>
    <li><a href="http://localhost/cer/Toyota.php">Toyota </a></li>
    </ul>
  </li>
  </ul>
  </li>
  <li><a href="http://localhost/cer/Paquetes.php">Paquetes</a></li>
  <li><a href="http://localhost/cer/Transmisiones.php">Transmision</a></li>
  <li><a href="http://localhost/cer/Electrica.php">Electrica</a></li>
  <li><a href="http://localhost/cer/socio.php">Socio del negocio</a></li>
  <li><a href="Domicilio.html">Domicilio</a></li>
      </ul>
    </header>

     <div class="ticket">
  <br><br><br><br><br><br><br>
  <h1>Mis Productos</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Confirmada</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Conexión a la base de datos
        $conn = mysqli_connect("localhost", "Solis", "2328rmsr", "autopartes");

        // Consulta para obtener los datos de las tablas
        $sql = "SELECT detalles_venta.id_compra, producto.id, producto.nombre, producto.url_local, producto.precio, detalles_venta.cantidad, detalles_venta.compra_confirmada 
        FROM detalles_venta 
        INNER JOIN producto ON detalles_venta.producto_id = producto.id 
        INNER JOIN cliente ON detalles_venta.cliente_id = cliente.id_cliente 
        WHERE cliente.correo_electronico = '{$_SESSION['correo_electronico']}'";

        // Ejecutar la consulta y obtener los resultados
        $result = mysqli_query($conn, $sql);

        // Mostrar los resultados en la tabla
        $total = 0; // Variable para almacenar el total de dinero

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id_compra"] . "</td>";
            echo '<td><img src="' . $row["url_local"] . '" alt="' . $row["nombre"] . '" width="50" height="50"></td>';
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>$" . $row["precio"] . "</td>";
            echo "<td>" . $row["cantidad"] . "</td>";
            echo "<td>" . $row["compra_confirmada"] . "</td>";
            echo '<td>
                    <button class="comprar" data-id="' . $row["id_compra"] . '">Comprar</button>
                    <button class="eliminar" data-id="' . $row["id_compra"] . '">Eliminar</button>
                  </td>';
            echo "</tr>";

            // Calcular el subtotal de cada producto
            $subtotal = $row["precio"] * $row["cantidad"];
            $total += $subtotal;
          }
          echo "<tr id='total-row'><td colspan='6'>Total</td><td id='total-amount'>$" . $total . "</td></tr>";
        } else {
          echo "<tr><td colspan='7'>Tu carrito está vacío.</td></tr>";
          echo "<tr id='total-row'><td colspan='6'>Total</td><td id='total-amount'>$0.00</td></tr>";
        }
        mysqli_free_result($result);

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
      ?>
    </tbody>
  </table>
</div>

<script>
  // Obtener todos los botones de comprar por su clase
  var comprarButtons = document.getElementsByClassName("comprar");

  // Recorrer los botones y asignar un manejador de eventos para el clic
  for (var i = 0; i < comprarButtons.length; i++) {
    comprarButtons[i].addEventListener("click", function() {
      var row = this.parentNode.parentNode; // Obtener la fila actual
      var subtotal = parseFloat(row.querySelector("td:nth-child(4)").innerText.replace("$", ""));
      var totalElement = document.getElementById("total-amount");
      var total = parseFloat(totalElement.innerText.replace("$", ""));

      total -= subtotal; // Restar el subtotal del total
      totalElement.innerText = "$" + total.toFixed(2); // Actualizar el contenido del total

      row.parentNode.removeChild(row); // Eliminar la fila de la tabla

      var tableBody = document.querySelector("tbody");
      if (tableBody.children.length === 1) {
        tableBody.innerHTML = "<tr><td colspan='7'>Tu carrito está vacío.</td></tr>";
        var totalRow = document.getElementById("total-row");
        totalRow.innerHTML = "<td colspan='6'>Total</td><td id='total-amount'>$0.00</td>";
      }

      // Mostrar mensaje de alerta
      alert("Gracias por tu compra.");
    });
  }

  // Obtener todos los botones de eliminar por su clase
  var eliminarButtons = document.getElementsByClassName("eliminar");

  // Recorrer los botones y asignar un manejador de eventos para el clic
  for (var i = 0; i < eliminarButtons.length; i++) {
    eliminarButtons[i].addEventListener("click", function() {
      var row = this.parentNode.parentNode; // Obtener la fila actual
      var subtotal = parseFloat(row.querySelector("td:nth-child(4)").innerText.replace("$", ""));
      var totalElement = document.getElementById("total-amount");
      var total = parseFloat(totalElement.innerText.replace("$", ""));

      total -= subtotal; // Restar el subtotal eliminado del total
      totalElement.innerText = "$" + total.toFixed(2); // Actualizar el contenido del total

      row.parentNode.removeChild(row); // Eliminar la fila de la tabla

      var tableBody = document.querySelector("tbody");
      if (tableBody.children.length === 1) {
        tableBody.innerHTML = "<tr><td colspan='7'>Tu carrito está vacío.</td></tr>";
        var totalRow = document.getElementById("total-row");
        totalRow.innerHTML = "<td colspan='6'>Total</td><td id='total-amount'>$0.00</td>";
      }
    });
  }
</script>



      
    </tbody>
  </table> <br>
  <a href = "cerrar_sesion.php"><button> Cerrar Sesion</button> </a>

    </div>
   
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="footer">
        <div class="box_footer">
          <p>AUTOPARTES ZACAPU.MX</p>
        </div>
          <div class="box_footer">
          <h2>Acerca de A-Z</h2>
          <a href="Terminos.html">Términos y condiciones</a>
          <a href="Privacidad.html">Politica de privacidad</a>
          <a href="Promociones.html">Términos de promociones</a>
          </div>
          <div class="box_footer">
          <h2>Ayuda</h2>  
          <a href="Pedidos.html">Información de pedidos</a>
          <a href="Preguntas.html">Preguntas frecuentes</a>
          <a href="Contacta.html">Contacta con nosotros</a>
          </div>
          <div class="box_footer">
          <h2>Redes sociales</h2>
          <a href=""><i class="fa-brands fa-facebook"></i>Facebook</a>
          <a href=""><i class="fa-brands fa-twitter"></i>Twitter</a>
          <a href=""><i class="fa-brands fa-instagram"></i>Instagram</a>
          </div>
          <div class="box_copyright">
            <hr>
            <p><b>Autopartes Zacapu </b>Todos los derechos reservados © 2023.
             Por favor, no compartas este contenido con personas que no estén
            calificadas para realizar reparaciones automotrices.</p>
          </div></div>
</body>
</html>