<!DOCTYPE html>
<html>
<head>
	<title>PHP Used Car Website</title>
		<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
 

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="container">

<?php 

  function getDb() {

    if (file_exists('.env')) {
      require __DIR__ . '/vendor/autoload.php';
      $dotenv = new Dotenv\Dotenv(__DIR__);
      $dotenv->load();
    }

    $url = parse_url(getenv("DATABASE_URL"));

    // var_dump($url);

    $db_port = $url['port'];
    $db_host = $url['host'];
    $db_user = $url['user'];
    $db_pass = $url['pass'];
    $db_name = substr($url['path'], 1);

    $db = pg_connect(
      "host=" . $db_host .
      " port=" . $db_port .
      " dbname=" . $db_name .
      " user=" . $db_user .
      " password=" . $db_pass);
    return $db;
  }

  function getInventory() {
    $request = pg_query(getDb(), "
        SELECT i.id, i.year, i.mileage, mo.name as model, mo.doors, ma.name as make, c.name as color
        FROM inventory i
        JOIN models mo ON i.model_id = mo.id
        JOIN makes ma ON mo.make_id = ma.id
        JOIN colors c ON i.color_id = c.id;
    ");
    return pg_fetch_all($request);
  }

?>

  <h1>PHP Used Car Website</h1>
  <h2>Quality Pre-Owned Vehicles...powered by PHP!</h2>

  <div style="padding: 10px;"></div>

  <table class="table">
    <tr>
      <th>ID</th>
      <th>Year</th>
      <th>Make</th>
      <th>Model</th>
      <th>Color</th>
      <th>Doors</th>
      <th>Mileage</th>
    </tr>

<?php

  foreach (getInventory() as $car) {

    echo "<tr>";    
    echo "<td>" . $car['id'] . "</td>";
    echo "<td>" . $car['year'] . "</td>";
    echo "<td>" . $car['make'] . "</td>";
    echo "<td>" . $car['model'] . "</td>";
    echo "<td>" . $car['color'] . "</td>";
    echo "<td>" . $car['doors'] . "</td>";
    echo "<td>" . $car['mileage'] . "</td>";
    echo "</tr>\n";

  }

?>

</table>

</body>
</html>