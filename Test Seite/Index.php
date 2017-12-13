
<html >
<head>

    <title>Document</title>
</head>
<body>
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "squiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM fragen JOIN antworten USING(f_id) WHERE fragen.Antwort = pos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Frage ID: " . $row["f_id"]. "<br>". "Angabe: ". $row["Angabe"]. " | Antwort Nr. : "
         . $row["Antwort"]. "<br>". "Richtige Antwort: ". $row["antwort"] ."<br>". "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>