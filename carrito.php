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
<html>
<head>
    <link rel="stylesheet" href="css/Estilos.css">
    <script src="https://kit.fontawesome.com/b33d75bbb8.js" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/carrito_compra.js"></script>
  <title>Carrito de Compras</title>
  <link rel="icon" href="imagenes/icono.png">
       <script src="js/script.js" defer></script>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: dodgerblue;
    }

    .total {
      text-align: right;
      font-weight: bold;
    }

    .checkout-btn {
      background-color: dodgerblue;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
</head>
<header>
   <div class="logo">
     <ul>
     <img src="imagenes/sipp.png" alt="logo compañia">
     </ul>
     <h2 class="company-name">CERVECERIA SIPP</h2>


     </div>
        <div class="search">
        <form action="busqueda.php" method="POST">
        <input type="text" class="search-text" placeholder="Buscar productos, marcas y más...." name="search_query"> 
        <button> <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a> </button>
        </form>
      </div>
      
      
   <div class="cart-shopping">
     <a href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a> 
   </div>
   <div class="user">
      <a href="http://localhost/cer/Formulario.php"><i class="fa-solid fa-user"></i></a>
    </div>
    <ul class="menu">
      <li><a href="http://localhost/cer/Formulario.php">Crea tu cuenta</a></li>
      <li><a href="http://localhost/cer/ofertas.php">Ofertas</a></li>
      <li><a href="">Cervezas ↓</a>
  <ul class="vertical-menu">
      <li><a href="http://localhost/cer/Todas.php">Todas</a></li>
      <li><a href="">Por tipo ></a>
        <ul>
        <li><a href="http://localhost/cer/claras.php">Clara</a></li>
        <li><a href="http://localhost/cer/oscuras.php">Oscura</a></li>
        <li><a href="http://localhost/cer/Ambar.php">Ámbar</a></li>
        </ul>
      </li>
      <li><a href="">Por marca ></a>
        <ul>
        <li><a href="http://localhost/cer/labru.php">La Bru</a></li>
        <li><a href="http://localhost/cer/delirium.php">Delirium</a></li>
        <li><a href="http://localhost/cer/wendlandt.php">Wendlandt</a></li>
        <li><a href="http://localhost/cer/ramuri.php">Ramúri</a></li>
        <li><a href="http://localhost/cer/Ayinger.php">Ayinger</a></li>
        <li><a href="http://localhost/cer/chouffe.php">La chouffe</a></li>
        <li><a href="http://localhost/cer/gooseisland.php">Goose </a></li>
        <li><a href="http://localhost/cer/kastel.php">Kasteel </a></li>
        </ul>
      </li>
      </ul>
      </li>
      <li><a href="http://localhost/cer/packs.php">Beerpacks</a></li>
      <li><a href="http://localhost/cer/cooler.php">Coolers</a></li>
      <li><a href="http://localhost/cer/cristaleria.php">Cristaleria</a></li>
      <li><a href="http://localhost/cer/socio.php">Socio del negocio</a></li>
      <li><a href="Domicilio.html">Domicilio</a></li>
  </ul>
</header><br><br><br><br><br><br><br><br>
  <div class="container">
    <h1>Carrito de Compras</h1>
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
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href = "cerrar_sesion.php"><button> Cerrar Sesion</button> </a>
  
      </div>
     
      <br><br><br><br><br><br><br><br>
      <div class="footer">
        <div class="box_footer">
          <p>CERVECERIA SIPP.MX</p>
        </div>
          <div class="box_footer">
          <h2>Acerca de sipp</h2>
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
          <a href="https://www.facebook.com/profile.php?id=100092518540525&mibextid=ZbWKwL"><i class="fa-brands fa-facebook"></i>Facebook</a>
          <a href="https://twitter.com/?lang=es"><i class="fa-brands fa-twitter"></i>Twitter</a>
          <a href="https://instagram.com/cerveceria_sipp?igshid=ZGUzMzM3NWJiOQ=="><i class="fa-brands fa-instagram"></i>Instagram</a>
          </div>
          <div class="box_copyright">
            <hr>
            <p><b>Cerveceria SIPP</b> recomienda el consumo responsable. Alc 10,5%. Todos los derechos reservados © 2023
              No compartas este contenido con personas  que no tengan la edad legal para consumir alcohol</p>
          </div></div>
  </body>
  </html>