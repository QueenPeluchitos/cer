<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/EstilosSocio.css">
  
    <script src="https://kit.fontawesome.com/b33d75bbb8.js" crossorigin="anonymous"></script>
    <title>Socio | APZ</title>

    <link rel="icon" href="imagenes/icona.png">

<body>
</head>
<script>

function confirmacion(){
  var respuesta = confirm("Deseas ser socio APZ?");
if (respuesta==true){
  return true;
} else{
  return false;
}


</script>
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
  <li><a href="http://localhost/cer/packs.php">Paquetes</a></li>
  <li><a href="http://localhost/cer/cooler.php">Transmision</a></li>
  <li><a href="http://localhost/cer/cristaleria.php">Electrica</a></li>
  <li><a href="http://localhost/cer/socio.php">Socio del negocio</a></li>
  <li><a href="Domicilio.html">Domicilio</a></li>
      </ul>
    </header>

<div class="container">
    <span class="big-circle"></span>
    <img src="img/shape.png" class="square" alt="" />
    <div class="form">
      <div class="contact-info">
        <h3 class="title">Se parte de SIPP</h3>
        <p class="text">
          Contacta con nostros, para asi poder <br> asociarte
          a nuestra cerveceria, envianos <br> tu propuesta de
          tu cerveza y pronto estaremos dandole una respuesta.

        </p>

        <div class="info">
          <div class="information">
            <img src="location.png" class="icon" alt="" />
            <p>Calle la Birra, Morelia Mich 1116</p>
          </div>
          <div class="information">
            <img src="email.png" class="icon" alt="" />
            <p>Solis@CerveceriaSIPP.mx</p>
          </div>
          <div class="information">
            <img src="phone.png" class="icon" alt="" />
            <p> (317) 585-8468</p>
          </div>
        </div>

        <div class="social-media">
          <p>Siguenos en :</p>
          <div class="social-icons">
            <a href="https://www.facebook.com/profile.php?id=100092518540525&mibextid=ZbWKwL">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/?lang=es">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://instagram.com/cerveceria_sipp?igshid=ZGUzMzM3NWJiOQ==">
              <i class="fab fa-instagram"></i>
            </a>
          
          </div>
        </div>
      </div>

      <div class="contact-form">
        <span class="circle one"></span>
        <span class="circle two"></span>

        <form action="RespuestaSocio.php" method="POST" autocomplete="off">
          <h3 class="title">Contactanos</h3>
          <div class="input-container">
            <input type="text" name="name" class="input" />
            <label for="">Nombre completo</label>
            <span>Nombre completo</span>
          </div>
          <div class="input-container">
            <input type="email" name="email" class="input" />
            <label for="">Correo</label>
            <span>Correo</span>
          </div>
          <div class="input-container">
            <input type="tel" name="phone" class="input" />
            <label for="">Telefono</label>
            <span>Telefono</span>
          </div>
          <div class="input-container textarea">
            <textarea name="message" class="input"></textarea>
            <label for="">Mensaje</label>
            <span>Mensaje</span>
          </div>
          <input type="submit" value="Enviar" class="btn" onclick="return confirmacion()"/>
        </form>
      </div>
    </div>
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