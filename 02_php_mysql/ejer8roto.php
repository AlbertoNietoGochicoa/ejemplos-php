<?php
/**
 * Created by PhpStorm.
 * User: albertonieto
 * Date: 27/5/16
 * Time: 19:27
 */  <?php
  // Abrir la conexión
  $conexion = mysqli_connect("localhost", "root", "root", "blog");

  // Borrado, si es que nos pasan un id
  if (isset($_GET['id'])) {
      // Borramos los comentarios correspondientes a la entrada
      $q = "delete from comentario where entrada_id='" . $_GET['id'] . "'";
      // Ejecutar la consulta en la conexión abierta. No hay "resultset"
      mysqli_query($conexion, $q) or die(mysqli_error($conexion));

      // Formar la consulta (borrado de una fila)
      $q = "delete from entrada where id='" . $_GET['id'] . "'";

      // Ejecutar la consulta en la conexión abierta. No hay "resultset"
      mysqli_query($conexion, $q) or die(mysqli_error($conexion));

      // Comprobar si hemos afectado a alguna fila
      echo "<p class='red'>";

      if (mysqli_affected_rows($conexion) > 0)
          echo "Se ha borrado la entrada on ID " . $_GET['id'] . ".";
      else
          echo "No se ha borrado ninguna entrada.";

      echo "</p>";
  }
  ?>
