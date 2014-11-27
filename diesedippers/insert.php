<?php



$con = mysql_connect("mysql.dieseldippers.com","geocode","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dieseldippers_geocode", $con);

$sql="INSERT INTO markers (name, address, type)
VALUES
('$_POST[name]','$_POST[address]','$_POST[type]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


mysql_close($con)

?>



    <title>DIESELDIPPERS.COM - HELPING YOU AVOID TRAFFIC CONGESTION</title>

<style type="text/css">
body {
		background-image:url(images/bg.gif);
	}
    #feedback { 

	background-color: #ba9f96;
	border: solid 2px #85817a;
	-webkit-border-radius: 8px;
    -moz-border-radius: 8px;
	height: 10em;
	width: 50%;
	margin-left: auto;
	margin-right: auto;
	margin-top: 3%;
	margin-bottom: 2%;
	clear: both;
	-moz-box-shadow: 3px 3px 4px #88837c;
	-webkit-box-shadow: 3px 3px 4px #88837c;
	box-shadow: 3px 3px 4px #88837c;
	/* For IE 8 */
-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#88837c')";
/* For IE 5.5 - 7 */
filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#88837c');
text-align: center;

}

#exit {
		width: 10% ;
 margin-left: 0px auto;
 margin-right: 0px auto;
	border: solid 2px #85817a;
  	padding: 5px;
 	display: inline-block;

	background-color: #f8efe1;
  	-webkit-border-radius:10px;
	-moz-border-radius:5px;
	text-align:center;

  }
  
  
#exit2 {
		width: 10% ;
 margin-left: 0px auto;
 margin-right: 0px auto;
	border: solid 2px #85817a;
  	padding: 5px;
 	display: inline-block;

	background-color: #f8efe1;
  	-webkit-border-radius:10px;
	-moz-border-radius:5px;
	text-align:center;

  }

a {
	text-decoration: none;
	 font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	color:#570602;
	font-size: 1em;
	font-weight:bold;
	}
	
a:hover {
	text-decoration: none;
	color:#d16964;	
	}
	
p {
	text-align: center;
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	}
	
  </style>




  
<div id="logo">
  <img src="images/DIESELDIPPERS_LOGO_6.png"/>
  </div>
<div id="feedback"> 

<p>Are you sure you wish to add a checkpoint to our map?</p>

<p align="center">
<div id="exit">
<a href="http://www.dieseldippers.com">Cancel</a></div>
<div id="exit2">
<a href="phpsqlgeocode_xml.php">Proceed</a>
</div></p>


</div>