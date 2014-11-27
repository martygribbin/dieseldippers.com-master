<?php 

require("phpsqlajax_dbinfo.php"); 

@mysql_select_db($DataBase) or die(mysql_error());

$query="TRUNCATE --markers--";

mysql_query($query);
mysql_close();

  


?>