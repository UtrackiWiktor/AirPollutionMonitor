
<?php
$servername = "airpollution.c0pmexmy2ypg.eu-central-1.rds.amazonaws.com";
$username = "dataproviderremotly";
$password = "mlotnazanieczyszczenia420";
$database = "airpollution";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$tempdata = $_GET["temp"];
$dustdata = $_GET["dust"];
$humdata = $_GET["hum"];

echo "<br>Temperature is $tempdata *C";
echo "<br>Humidity is $humdata %";
echo "<br>Air pollution is $dustdata ug/m^3<br>";

//$sql = "INSERT INTO AirData (Data)
//VALUES ('Temperature is $getdata.')";

$sql1 = "INSERT INTO Temperature (Value, Time) VALUES ($tempdata, NOW() + 10000)";

if ($conn->query($sql1) === TRUE) {
  echo "New temperature record created successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$sql2 = "INSERT INTO Humidity (Value, Time) VALUES ($humdata, NOW() + 10000)";

if ($conn->query($sql2) === TRUE) {
  echo "New humidity created successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$sql3 = "INSERT INTO Dust (Value, Time) VALUES ($dustdata, NOW() + 10000)";

if ($conn->query($sql3) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}

/*$path = $_SERVER['DOCUMENT_ROOT'] . 'logfile.txt';

$fp = fopen($path, 'a');
fwrite($fp, '\nTemp: ');
fwrite($fp, $tempdata);
fwrite($fp, '\nHum: ');
fwrite($fp, $humdata);
fwrite($fp, '\nDust: ');
fwrite($fp, $dustdata);
fclose($fp);*/

$conn->close();
?> 
