<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Curso de PHP | mayo de 2016 | ejer06.php</title>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/colors.css">
  <link rel="stylesheet" href="../css/ejemplos.css">
  <style>

    body{
      background-color: #CCFFCC;
      border-style: groove;

    }

    table{
      position: inherit;
    }

  </style>
</head>
<body>
  <h1>Ejercicio 6</h1>
  <p>Añadir una hoja de estilos CSS al fichero del ejercicio 5, de modo que la tabla y el resto de los elementos tengan
    un aspecto más "presentable".</p>
  <p>Para facilitar la lectura, queremos que las filas pares de la tabla sean de color gris y las impares blancas. El
    resto del aspecto queda a vuestra elección.</p>

  <h2>El formulario</h2>
  <form action="ejer06.php" method="get">
    <input type="text" id="N" name="N" value=""/>
    <input type="text" id="I" name="I" value=""/>
    <input type="text" id="F" name="F" value=""/>
    <input type="submit" id="enviar" name="enviar" value="Enviar"/>
  </form>

  <p>
    <?php
    $n = $_GET['N'];
    $min= $_GET['I'];
    $max= $_GET['F'];


    ?>

  <h1>Tabla de multiplicar</h1>
  <table style="border: groove">

    <?php for($i=$min; $i<=$max; $i++)  { ?>



       <?php if ($i%2==0){ ?><tr style="background: white;"> <?php }else{ ?> <tr style="background:gainsboro"> <?php }?>
        <td ><?php echo $i ?></td>
        <td>X</td>
        <td><?php echo $n ?></td>
        <td> = <?php $total=$i*$n;
          echo "$total  " ?></td>
      </tr>


    <?php  }?>
  </table>

  </p>

</body>
</html>
