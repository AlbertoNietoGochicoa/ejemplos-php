<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Curso de PHP | mayo de 2016 | ejer02.php</title>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/colors.css">
  <link rel="stylesheet" href="../css/ejemplos.css">
</head>
<body>
  <h1>Ejercicio 2</h1>
  <p>Hacer un formulario que recoja los dos valores A y B del ejercicio anterior (y haga la comparación...).</p>
  <h2>El formulario</h2>
  <form action="ejer02.php" method="get">
    <input type="text" id="N1" name="N1" value=""/>
    <input type="text" id="N2" name="N2" value=""/>

    <input type="submit" id="enviar" name="enviar" value="Enviar"/>
  </form>



<p>

  <?php
  $n1=0;
  $n2=0;

  $n1 = ($_GET['N1']);
  $n2 = ($_GET['N2']);
  ?>

  <?php
  if ($n1<$n2){
    echo "$n2 es mayor que $n1";
  }else{
    echo "$n1 es mayor que $n2";
  }
 ?>
</p>


</body>
</html>
