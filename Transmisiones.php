<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/EstilosCervezas.css">
    <script src="https://kit.fontawesome.com/b33d75bbb8.js" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="js/carrito_compra.js"></script>
    <title>Transmision | APZ</title>
    
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
  <li><a href="http://localhost/cer/Trasmisiones.php">Transmision</a></li>
  <li><a href="http://localhost/cer/Electrica.php">Electrica</a></li>
  <li><a href="http://localhost/cer/socio.php">Socio del negocio</a></li>
  <li><a href="Domicilio.html">Domicilio</a></li>
      </ul>
    </header>
     <div class="carousel">     
       <ul>
     <li><img src="imagenes/carousel/trans.png"></li>
     </ul>
     </div>Product(' .
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
              JOIN tipo_cerveza ON producto.tipo_cerveza_id = tipo_cerveza.id_tipo_cerveza
              WHERE tipo_cerveza.nombre_tipo_cerveza = 'Ámbar' AND producto.departamento_id=1
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
  
                                   
                                   $sql = "SELECT p.id, p.url_local, p.volumen, pais.nombre_pais, estilo.nombre_estilo_cerveza, sub_estilo.nombre_sub_estilo_cerveza, p.estrellas, p.precio, p.descripcion
                                            FROM producto AS p
                                            INNER JOIN tipo_cerveza ON p.tipo_cerveza_id = id_tipo_cerveza
                                            INNER JOIN pais ON p.pais_id = pais.id_pais
                                            INNER JOIN estilo ON p.cerveza_estilo_id = estilo.id_estilo
                                            INNER JOIN sub_estilo_cerveza AS sub_estilo ON p.cerveza_sub_estilo_id = sub_estilo.id_sub_estilo
                                            WHERE tipo_cerveza.nombre_tipo_cerveza = 'Ámbar' AND p.departamento_id = 1";
                          
                                   $result = $conn->query($sql);
  
                                   
                                   if ($result->num_rows > 0) {
                                      
                                      echo '<div class="products-container">';
                                      
                                      while($row = $result->fetch_assoc()) {
                                         
                                         echo '<div class="preview" data-target="p-' . $row["id"] . '">';
                                         echo '<i class="fas fa-times"></i>';
                                         echo '<img src="' . $row["url_local"] . '" alt="">';
                                         echo '<h3>Volumen ' . $row["volumen"] . 'ml<br>';
                                         echo 'País: ' . $row["nombre_pais"] . '<br>';
                                         echo 'Estilo: ' . $row["nombre_estilo_cerveza"] . '<br>';
                                         echo 'Sub-Estilo: ' . $row["nombre_sub_estilo_cerveza"] . '</h3>';
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
          <script src="tienda.js"></script>
</body>
</html>