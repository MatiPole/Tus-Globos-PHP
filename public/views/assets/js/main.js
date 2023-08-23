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

      swal({
        title: "Agregado al carrito!",
        text: null,
        icon: "success",
        button: null,
      });

      // Cerrar el SweetAlert después de 1 segundo
      setTimeout(function () {
        swal.close();
        location.reload();
      }, 1000);
    },
    error: function (xhr, status, error) {
      console.log("error");
      console.error(error);
    },
  });
}
