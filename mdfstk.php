<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification  d'un produit</title>
    <link rel="stylesheet" href="A.css">
</head>
<body>
    <div class="cont">
        <h1>Modification d'un produit</h1>
        <table>
        <?php
        $_conn = mysqli_connect("localhost", "root", "", "tpweb");
        if ($_conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $old_id = $_POST['old_id'];
            $new_name = $_POST['new_name'];
            $new_prix = $_POST['prix']; 
            $new_qnt = $_POST['qnt'];
            $new_des = $_POST['new_des'];

            $sql = "UPDATE produit SET nom='$new_name', prix='$new_prix',qnt='$new_qnt', des='$new_des' WHERE id='$old_id'";

            if ($_conn->query($sql) === TRUE) {
               
                header("Location: tablprod.php");
                exit();
            } else {
                echo "<p>Erreur lors de la mise à jour des informations du produit: " . $_conn->error . "</p>";
            }
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

        </table>
<br><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="old_id">Ancien id :</label>
            <input type="number" name="old_id" id="old_id" placeholder="Ancien Id">
            <label for="new_email">Nouveau nom :</label>
            <input type="text" name="new_name" id="new_email" placeholder="Nouveau nom">
            <label for="new_password">Nouveau prix :</label>
            <input type="number" name="prix" id="new_password" placeholder="Nouveau prix">
            <label for="qnt">Nouveau quantité :</label>
            <input type="number" name="qnt" id="qnt" placeholder="Nouveau quantité">
            <label for="new_des">Nouveau description :</label>
            <input type="text" name="new_des" id="new_des" placeholder="Nouveau description">

            <input type="submit" value="Modifier" class="btn">
        </form>
    </div>
</div>
<div class="img">
    <a href="hstok.html"><img src="mv8nudc6fseto81map0rnfr9cq.png" alt="">
        <a href="home.html"><img src="clipart879652.png" alt=""></a>
</div>

</body>
</html>
