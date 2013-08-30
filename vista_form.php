<?php 
  // Muestra errores y presenta los datos que se han enviado
?>
<form class='contacto' method='POST' action=''>
    <div><label>Tu Nombre:</label><input type='text' class='nombre' value='<?php echo $_POST['nombre']; ?>'>
    <?php echo $errors[1]; ?></div>
    <div><label>Tu Email:</label><input type='text' class='email' value='<?php echo $_POST['email']; ?>'>
    <?php echo $errors[2]; ?></div>
    <div><label>Asunto:</label><input type='text' class='asunto' value='<?php echo $_POST['asunto']; ?>'>
    <?php echo $errors[3]; ?></div>
    <div><label>Mensaje:</label><textarea rows='6' class='mensaje'><?php echo $_POST['mensaje']; ?></textarea>
    <?php echo $errors[4]; ?></div>
    <div><input type='submit' value='Envia Mensaje' class='boton'></div>
     <?php echo $result; ?>
</form>
