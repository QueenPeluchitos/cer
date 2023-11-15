<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/EstiloFormulario.css">
  
    <script src="https://kit.fontawesome.com/b33d75bbb8.js" crossorigin="anonymous"></script>
    <title>Formulario | APZ</title>

    <link rel="icon" href="imagenes/icona.png">

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

<main>

  <div class="contenedor__todo">
      <div class="caja__trasera">
          <div class="caja__trasera-login">
              <h3>¿Ya tienes una cuenta?</h3>
              <p>Inicia sesión para entrar en la página</p>
              <button id="btn__iniciar-sesion">Iniciar Sesión</button>
          </div>
          <div class="caja__trasera-register">
              <h3>¿Aún no tienes una cuenta?</h3>
              <p>Regístrate para que puedas iniciar sesión</p>
              <button id="btn__registrarse">Regístrarse</button>
          </div>
      </div>

      <!--Formulario de Login y registro-->
      <div class="contenedor__login-register">
          <!--Login-->
          <form action="login_usuario_be.php" method="POST" class="formulario__login">
              <h2>Iniciar Sesión</h2>
              <input type="text" placeholder="Correo Electronico" name="Correo">
              <input type="password" placeholder="Contraseña" name="Contrasena">
              <button>Entrar</button>
          </form>

          <!--Register-->
          <form action="registro_usuario_be.php" method="POST" class="formulario__register">
              <h2>Regístrarse</h2>
              <input type="text" placeholder="Nombre" name="Nombre">
              <input type="text" placeholder="Apellido Paterno" name="Apellido_P">
              <input type="text" placeholder="Apellido Materno" name="Apellido_M">
              <input type="text" placeholder="Direccion" name="Direccion"> 
              <input type="text" placeholder="Correo Electrónico" name="Correo">
              <input type="password" placeholder="Contraseña" name="Contrasena">
              <button>Regístrarse</button>
          </form>
      </div>
  </div>

</main>



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
