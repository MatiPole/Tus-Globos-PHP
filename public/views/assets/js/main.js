"use strict";

function agregarACarrito(producto_id, user_id) {
  $.ajax({
    type: "POST",
    url: "../../funciones/agregar_a_carrito.php",
    data: {
      productoId: producto_id,
      userId: user_id,
    },
    success: function (result) {
      // Actualizar el catálogo después de agregar al carrito
      console.log("success");
      console.log(result);
      location.reload();
    },
    error: function (xhr, status, error) {
      console.log("error");
      console.error(error);
    },
  });
}

function filtrarTipo(valueTipo) {
  let tipo = valueTipo;
  console.log(tipo);
  $.ajax({
    type: "POST",
    url: "../../funciones/traer_tipo.php",
    data: {
      tipo: tipo,
    },
    success: function (result) {
      $("#resultado").html(result);
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });

  return false;
}
