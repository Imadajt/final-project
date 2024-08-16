<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un produit</title>
    <link rel="stylesheet" href="A.css">
</head>
<body>
    <div class="cont">
    <h1>Suppression d'un produit</h1>

        <table>
        <?php
                $_conn = mysqli_connect("localhost", "root", "", "tpweb");
                if ($_conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id,nom,prix,des,qnt  FROM produit";
                $result = $_conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Produit</th><th>Prix</th><th>Quantité dispo</th><th>Description</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["id"]."</td><td>".$row["nom"]."</td><td>".$row["prix"]."</td><td>".$row["qnt"]."</td><td>".$row["des"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $_conn->close();
            ?>
        
        </table><br><br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="us">Taper le id de produit que vous voulez supprimer :</label>
        <input type="number" name="id" id="us" placeholder="id">
        <input type="submit" value="Supprimer le produit" class="btn">
    </form>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["id"])) {
       
        $id = $_POST["id"];

        $_conn = mysqli_connect("localhost", "root", "", "tpweb");
        if ($_conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM produit WHERE id = '$id'";
        if ($_conn->query($sql) === TRUE) {
            $_conn->close();
            header("Location: tablprod.php");
            exit(); 
        } else {
            echo "Erreur lors de la suppression du produit : " . $_conn->error;
        }

        $_conn->close();
    } else {
        echo "ID non fourni.";
    }
}
?>
    <div class="img">
    <a href="hstok.html"><img src="mv8nudc6fseto81map0rnfr9cq.png" alt="">
        <a href="home.html"><img src="clipart879652.png" alt=""></a></div>

</body>
</html>
