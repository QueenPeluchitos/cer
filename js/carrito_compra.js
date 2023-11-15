function buyProduct(productId, action) {
  let message = '';
  if (action === 'Comprar ahora') {
    message = 'Ha seleccionado comprar el producto ' + productId;
  } else if (action === 'Añadir al carrito') {
    message = 'Ha seleccionado añadir al carrito el producto ' + productId;
  }

  // Agregar la variable message a la URL
  window.location.href = 'procesar_compra.php?message=' + encodeURIComponent(message);

  
}

