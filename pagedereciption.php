<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des demandes</title>
    <link rel="stylesheet" href="A.css">
</head>
<body>
    <div class="cont">
    <h1>Liste des demandes</h1>
    <table>
        <?php
                $_conn = mysqli_connect("localhost", "root", "", "tpweb");
                if ($_conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

             
                $sql = "SELECT  id,nphone,loc,qntd  FROM client";
                $result = $_conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>numero tel</th><th>localisation</th><th>Quantité demander</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["id"]."</td><td>".$row["nphone"]."</td><td>".$row["loc"]."</td><td>".$row["qntd"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<H1>0 results</H1>";
                }
                $_conn->close();
            ?>
        </table><br><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="us">Taper le ID de produit qui vous voulez supprimer :</label>
        <input type="text" name="id" id="us" placeholder="id">
        <input type="submit" value="Supprimer le demander" class="btn">
    </form>
    <form action="cmnd.php" method="POST">
        <label for="us">Taper le ID de produit qui vous voulez Confirmer :</label>
        <input type="text" name="id" id="us" placeholder="id">
        <input type="submit" value="Confirmer le demander" class="btn">
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

            $sql = "DELETE FROM client WHERE id = '$id'";
            if ($_conn->query($sql) === TRUE) {
                header("Location: pagedereciption.php");
                exit();
            } else {
                echo "Erreur lors de la suppression de l'utilisateur : " . $_conn->error;
            }

            $_conn->close();
        } else {
            echo "Nom d'utilisateur non fourni.";
        }
    }
    ?>
    <div class="img">
    <a href="home.html"><img src="mv8nudc6fseto81map0rnfr9cq.png" alt="">
        <a href="home.html"><img src="clipart879652.png" alt=""></a></div>

</body>
</html>
v