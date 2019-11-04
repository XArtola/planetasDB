<!DOCTYPE HTML>

<html>

<body>

  <?php

  //PARAMETROS DE CONFIGURACÓN DE LA CONEXIÓN

  $hostname = "192.168.1.52:3306";
  $username = "xabi";
  $password = "1234";
  $db = "base";

  //Inicializar conexión
  $dbconnect = mysqli_connect($hostname, $username, $password, $db);

  //Si se da algun error de conexión mostrarlo
  if ($dbconnect->connect_error) {
    die("Conexión fallida: " . $dbconnect->connect_error);
  }

  ?>
  <h1>Planetas</h1>
  <table border="1" align="center">
    <tr>
      <td>id</td>
      <td>name</td>
      <td>rotation_period</td>
      <td>orbital_period</td>
      <td>diameter</td>
      <td>climate</td>
      <td>gravity</td>
      <td>terrain</td>
      <td>surface_water</td>
      <td>population</td>
      <td>url</td>
    </tr>

    <?php
    //Hacer una consulta para recoger todos las columnas que querermos de cada planeta (todas excepto fecha creación y fecha actualización)
    $query = mysqli_query($dbconnect, "SELECT id, name, rotation_period, orbital_period, diameter, climate, gravity, terrain, surface_water, population, url FROM planet")
      or die(mysqli_error($dbconnect));
    //Mientas haya filas en los resultados obtenidos generar una nueva fila
    while ($row = mysqli_fetch_array($query)) {

      echo "<tr>";
      echo  "<td>{$row['id']}</td>";
      echo "<td>{$row['name']}</td>";
      echo "<td>{$row['rotation_period']}</td>";
      echo "<td>{$row['orbital_period']}</td>";
      echo "<td>{$row['diameter']}</td>";
      echo "<td>{$row['climate']}</td>";
      echo "<td>{$row['gravity']}</td>";
      echo "<td>{$row['terrain']}</td>";
      echo "<td>{$row['surface_water']}</td>";
      echo "<td>{$row['population']}</td>";
      echo "<td>{$row['url']}</td>";
      echo "</tr>\n";
    }

    ?>

  </table>
</body>

</html>