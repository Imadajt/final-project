<?php 
$username = "root";
$servername = "localhost";
$password = "";
$dbname = "tpweb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("error connecting to database" . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $prix = $_POST['prix'];
    $qnt =$_POST['qnt'];
    $des = $_POST['des'];
    $sql = "INSERT INTO produit (nom, prix,qnt, des) VALUES ('$name', '$prix','$qnt', '$des')";
    if ($conn->query($sql) === TRUE) {
        header("location: tablprod.php?message=yes");
        exit();
    } else {
        header("location: ajtsock.html?message=no");
        exit();
    }
}

$conn->close();
?>
