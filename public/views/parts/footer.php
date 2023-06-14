
<footer>
    <div class="div-footer">
    <div class="div-contact-faq">
    <a href="">Contacto</a>
    <a href="">Preguntas frecuentes</a></div>
<form class="form-footer" action="suscripciones/log.php" method='POST'>
    <label for="">¡Suscribite!</label>
    <input type="email" name='mail' id='mail' placeholder="E-Mail: ejemplo@mail.com">
    <p class="help-block" id="statusEmail"></p> 
    <button id="botonEnviar">ENVIAR</button>
    </div>
</form>
</footer>
<script>
$(document).ready(function(){
$("input[name=mail]").click(function(){
    console.log('Evento click sobre un input text con nombre="nombre1"');
});
$("#botonEnviar").click(function(){
    var valor = $("#mail").val();
    console.log(valor);


if( $("#mail").val()=="" ){
    $("#mail").addClass('is-invalid');
   alert("Validación!", 
    "El campo email/usuario es obligatorio", "warning");
    $("#statusEmail").html('<span class="label label-error" style="color: red">Campo obligatorio</span>');
    var inputemailcolor=$("#mail");
    inputemailcolor.css("border-color","red"); 
    return false;
}
});

});  

</script>
