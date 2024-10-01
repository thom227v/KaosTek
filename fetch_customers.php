<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kaostek-kundedb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['query'])) { // if query is set
    $query = $_GET['query']; 
    $sql = "SELECT fornavn, efternavn FROM kunde WHERE fornavn LIKE '%$query%' OR efternavn LIKE '%$query%'"; // search for customer
    $result = $conn->query($sql);

    $customers = []; // array to store customers
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
            $customers[] = $row['fornavn'] . ' ' . $row['efternavn']; // add customer to array
        }
    }
    echo json_encode($customers); 
}

$conn->close(); 
?>