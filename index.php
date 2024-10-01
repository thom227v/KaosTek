<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kaostek-kundedb";

// create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);

// check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get products sorted by lowest to highest
$sql = "SELECT produkt_id, produkt, produkt_pris_dkk FROM produkt ORDER BY produkt_pris_dkk ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaostek BulkShop</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <div class="table-container">
        <h2>Produkt Liste</h2>
        <table>
            <thead>
                <tr>
                    <th>Produkt Navn</th>
                    <th>Produkt Pris (DKK)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // get products sorted by lowest to highest
                $sql = "SELECT produkt, produkt_pris_dkk FROM produkt ORDER BY produkt_pris_dkk ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["produkt"] . "</td>";
                        echo "<td>" . $row["produkt_pris_dkk"] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    $conn->close();
    ?>
</body>
</html>