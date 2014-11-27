<?php



$con = mysql_connect("mysql.dieseldippers.com","geocode","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dieseldippers_geocode", $con);

$sql="INSERT INTO markers (name, address, type)
VALUES
('$_POST[name]','$_POST[address]','restaurant')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


mysql_close($con)

?>

<?php
require("phpsqlgeocode_dbinfo.php");

define("MAPS_HOST", "maps.google.com");
define("KEY", "ABQIAAAAwAL-vzcDU14tJc50DZyUhBQki0ia1eMFik2nyDZyEikNsr7kNhQvJm5Y2Z_ok4bBIeZ1jIoKa7JhYw");

// Opens a connection to a MySQL server
$connection = mysql_connect("mysql.dieseldippers.com", $username, $password);
if (!$connection) {
  die("Not connected : " . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die("Can\'t use db : " . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die("Invalid query: " . mysql_error());
}

// Initialize delay in geocode speed
$delay = 0;
$base_url = "http://" . MAPS_HOST  . "/maps/geo?output=xml" . "&key=" . KEY;

// Iterate through the rows, geocoding each address
while ($row = @mysql_fetch_assoc($result)) {
  $geocode_pending = true;

  while ($geocode_pending) {
    $address = $row["address"];
    $id = $row["id"];
    $request_url = $base_url . "&q=" . urlencode($address);
    $xml = simplexml_load_file($request_url) or die("url not loading");

    $status = $xml->Response->Status->code;
    if (strcmp($status, "200") == 0) {
      // Successful geocode
      $geocode_pending = false;
      $coordinates = $xml->Response->Placemark->Point->coordinates;
      $coordinatesSplit = preg_split("/,/", $coordinates);
      // Format: Longitude, Latitude, Altitude
      $lat = $coordinatesSplit[1];
      $lng = $coordinatesSplit[0];

      $query = sprintf("UPDATE markers " .
             " SET lat = '%s', lng = '%s' " .
             " WHERE id = '%s' LIMIT 1;",
             mysql_real_escape_string($lat),
             mysql_real_escape_string($lng),
             mysql_real_escape_string($id));
      $update_result = mysql_query($query);
      if (!$update_result) {
        die("Invalid query: " . mysql_error());
      }
    } else if (strcmp($status, "620") == 0) {
      // sent geocodes too fast
      $delay += 100000;
    } else {
      // failure to geocode
      $geocode_pending = false;
      echo "Address " . $address . " Sorry, We do not rencognise the format that location ";
      echo "Received status " . $status . "
\n";
    }
    usleep($delay);
  }
}
?>

<meta http-equiv="refresh" content="1;url=http://www.dieseldippers.com/"> 



