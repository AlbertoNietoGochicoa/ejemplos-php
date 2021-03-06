<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Curso de PHP | mayo de 2016 | ejer08.php</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/colors.css">
    <link rel="stylesheet" href="../css/ejemplos.css">
</head>
<body>
<h1>Ejercicio 8</h1>
<p>Modificar el ejemplo 21 para que además de borrar, nos permita modifica una entrada ya existente.</p>
<p>Como pista, pensad que en el ejemplo 20 ya teneis el formulario y la inserción de datos, tendreis que modificarlo
    para que haga una UPDATE de SQL en vez de una INSERT.</p>


<h1>Borrar una fila de una tabla de MySQL</h1>
<p>Se conecta a una base de datos llamada "blog" en la máquina "localhost" con el usuario "root" y contraseña
    "root".</p>
<p>Borra la entrada cuyo ID nos llegue en el parámetro id de la petición GET de HTTP.</p>
<p>No hace comprobación de errores.</p>


<!--//Formulario para pedir valor a borrar -->


<form action="ejer08_2.0.php" method="get">
    <div>
        <label for="titulo">Id de la linea a modificar</label>
        <input type="text" id="id" name="id" value=""/>
    </div>
    <div>
        <tr>
            <th>
                <label for="titulo">titulo:</label>
                <input type="text" id="titulo" name="titulo" value=""/>
            </th>
            <th>
                <label for="texto">texto:</label>
                <input type="text" id="texto" name="texto" value=""/>
            </th>
            <th>
                <label for="activo">activo:</label>
                <input type="text" id="activo" name="activo" value=""/>
            </th>
        </tr>

    </div>
    <div>
        <input type="submit" id="enviar" name="enviar" value="Enviar"/>
    </div>
    </form>
    <!--Boton de enviar-->
    <?php if (isset($_GET['enviar'])) {

        // Recoger los valores
        $id = "";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $titulo = $_GET['titulo'];
            $texto = $_GET['texto'];
            $activo = $_GET['activo'];


            // Abrir la conexión
            $conexion = mysqli_connect("localhost", "root", "root", "blog");

            $q = "update entrada set  titulo = '".$titulo."',texto = '".$texto."' ,  activo = ".$activo."  WHERE id = ".$id;
            echo $q;


            // Ejecutar la consulta en la conexión abierta. No hay "resultset"
            mysqli_query($conexion, $q) or die(mysqli_error($conexion));


            // Comprobar si hemos afectado a alguna fila
            echo "<p class='red'>";

            if (mysqli_affected_rows($conexion) > 0)
                echo "Se ha modificado la entrada on ID " . $_GET['id'] . ".";
            else
                echo "No se ha modificado ninguna entrada.";

            echo "</p>";
            // Cerrar la conexión
            mysqli_close($conexion);

        }
    } ?>




    <?php
    // Abrir la conexión
    $conexion = mysqli_connect("localhost", "root", "root", "blog");


    // Formar la consulta (seleccionando todas las filas)
    $q = "select * from entrada";

    // Ejecutar la consulta en la conexión abierta y obtener el "resultset" o abortar y mostrar el error
    $r = mysqli_query($conexion, $q) or die(mysqli_error($conexion));

    // Calcular el número de filas
    $total = mysqli_num_rows($r);

    // Mostrar el contenido de las filas, creando una tabla XHTML
    if ($total > 0) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Título</th><th>Texto</th><th>Fecha</th><th>Activo</th></tr>';

        while ($fila = mysqli_fetch_assoc($r)) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['titulo'] . "</td>";
            echo "<td>" . $fila['texto'] . "</td>";
            echo "<td>" . $fila['fecha'] . "</td>";
            echo "<td>" . $fila['activo'] . "</td>";
            echo "</tr>";
        }

        echo '</table>';
    }

    // Cerrar la conexión
    mysqli_close($conexion);
    ?>
    <p><a class="blue" href="ejer082.0.php">Recargar la página</a></p>

</body>
</html>
