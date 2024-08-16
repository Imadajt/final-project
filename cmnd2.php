<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    $_conn = mysqli_connect("localhost", "root", "", "tpweb");
    if ($_conn->connect_error) {
        die("Connection failed: " . $_conn->connect_error);
    }

    $sql_cmnd = "DELETE FROM cmnd WHERE idd = '$id'";
    if ($_conn->query($sql_cmnd) === TRUE) {
        header("Location:cmnd.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de la commande : " . $_conn->error;
    }

    $sql_client = "DELETE FROM client WHERE id = '$id'";
    if ($_conn->query($sql_client) === TRUE) {
        header("Location:cmnd.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de la commande : " . $_conn->error;
    }

    $_conn->close();
} else {
  
    echo "ID non fourni.";
}
?>

</body>
</html>
