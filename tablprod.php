<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="A.css">
</head>
<body>
    <div class="cont">
    <h1>Liste des produits</h1>
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
        </table></div>

    <div class="img">
    <a href="hstok.html"><img src="mv8nudc6fseto81map0rnfr9cq.png" alt="">
        <a href="home.html"><img src="clipart879652.png" alt=""></a></div>

</body>
</html>
