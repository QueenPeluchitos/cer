<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/EstilosCervezas.css">
    <script src="https://kit.fontawesome.com/b33d75bbb8.js" crossorigin="anonymous"></script>
    <script src="js/carrito_compra.js"></script>
    <title>Cristaleria | Cerveceria SIPP</title>
    
       <link rel="icon" href="imagenes/icono.png">
    
       <script src="js/script.js" defer></script>

       <body>
      </head>
      <header>
         <div class="logo">
           <ul>
           <img src="imagenes/sipp.png" alt="logo compañia">
           </ul>
           <h2 class="company-name">CERVECERIA SIPP</h2>
         </div>
         </div>
         <div class="search">
      <form action="busqueda.php" method="POST">
      <input type="text" class="search-text" placeholder="Buscar productos, marcas y más...." name="search_query"> 
      <button> <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a> </button>
      </form>
    </div>




         
         <div class="cart-shopping">
           <a href="bienvenida.php"><i class="fa-solid fa-cart-shopping"></i></a> 
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
     </header>
     <div class="carousel">     
       <ul>
     <li><img src="imagenes/carousel/.png"></li>
     </ul>
     </div>
    <body>
       
    <div class="container">

<div class="products-container">

  <?php

     $servername = "localhost";
     $username = "Solis";
     $password = "2328rmsr";
     $dbname = "autopartes";


     $conn = new mysqli($servername, $username, $password, $dbname);


     if ($conn->connect_error) {
     die("Error de conexión: " . $conn->connect_error);
     }


     $sql = "SELECT producto.id, producto.nombre, producto.precio, producto.url_local
     FROM producto
     WHERE producto.departamento_id=2
     ";
     $result = $conn->query($sql);
  ?>

  <?php

     while ($producto = $result->fetch_assoc()) {
     echo '<div class="product" data-name="p-' . $producto["id"] . '">';
     echo '<img src="' . $producto["url_local"] . '" alt="">';
     echo '<h3>' . $producto["nombre"] . '</h3>';
     echo '<div class="price">MXN$ ' . $producto["precio"] . '</div>';
     echo '</div>';
     }
  ?>

  <?php

     $conn->close();
  ?>  
 

</div>

</div>

<div class="products-preview">

<?php
                             
                             $servername = "localhost";
                             $username = "Solis";
                             $password = "2328rmsr";
                             $dbname = "autopartes";

                             $conn = new mysqli($servername, $username, $password, $dbname);

                             
                             if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                             }

                             
                             $sql = "SELECT p.id, p.url_local, p.volumen, pais.nombre_pais, p.estrellas, p.precio, p.descripcion, tipo_cristaleria.nombre_cristaleria
                                      FROM producto AS p
                                      INNER JOIN pais ON p.pais_id = pais.id_pais
                                      INNER JOIN tipo_cristaleria ON p.tipo_cristaleria_id = tipo_cristaleria.id_cristaleria
                                      WHERE  p.departamento_id = 2";
                    
                             $result = $conn->query($sql);

                             
                             if ($result->num_rows > 0) {
                                
                                echo '<div class="products-container">';
                                
                                while($row = $result->fetch_assoc()) {
                                   
                                   echo '<div class="preview" data-target="p-' . $row["id"] . '">';
                                   echo '<i class="fas fa-times"></i>';
                                   echo '<img src="' . $row["url_local"] . '" alt="">';
                                   echo '<h3>Volumen ' . $row["volumen"] . 'ml<br>';
                                   echo 'País: ' . $row["nombre_pais"] . '<br>';
                                   echo 'Tipo: ' . $row["nombre_cristaleria"] . '<br>';
                                   echo '<div class="stars">';
                                   echo '<i class="fas fa-star"></i>';
                                   echo '<i class="fas fa-star"></i>';
                                   echo '<i class="fas fa-star"></i>';
                                   echo '<i class="fas fa-star"></i>';
                                   echo '<i class="fas fa-star"></i>';
                                   echo '<span>(' . $row["estrellas"] . ')</span>';
                                   echo '</div>';
                                   echo '<p>' . $row["descripcion"] . '</p>';
                                   echo '<div class="price">MXN$ ' . $row["precio"] . '</div>';
                                   echo '<div class="buttons">';
                                   echo '<a href="#" class="buy" onclick="buyProduct(' . $row["id"] . ', \'Comprar ahora\')">Comprar ahora</a>';
                                   echo '<a href="#" class="cart" onclick="buyProduct(' . $row["id"] . ', \'Añadir al carrito\')">Añadir al carrito</a>';
                                   echo '</div>';
                                   echo '</div>';
                                }
                                
                                
                                echo '</div>';
                             } else {
                                echo "No se encontraron productos.";
                             }

                          
                             $conn->close();
?>


</div>
    
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