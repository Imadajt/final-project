<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de reciption</title>
    <link rel="stylesheet" href="A.css">
</head>
<body>
    <div class="cont">
    <h1>Page de réception</h1>
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
        <label for="us">Taper le Id de le prouduit:</label>
        <input type="number" name="id" id="us" placeholder="Id">
              <label for="qnt">La quantité demander:</label>
        <input type="number" name="qntd" id="qnt" placeholder="La quantité">
        <label for="n">numer tél:</label>
        <input type="number" name="nphone" id="n" placeholder="num téléphone">
        <label for="loc">localisation:</label>
        <input type="text" name="loc" id="loc" placeholder="localisation">
      <input type="submit" value="Acheter" class="btn">
    </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_conn = mysqli_connect("localhost", "root", "", "tpweb");
        if ($_conn->connect_error) {
            die("Connection failed: " . $_conn->connect_error);
        }
    
        $id = $_POST['id'];
        $qntd = $_POST['qntd'];
        $nphone =$_POST['nphone'];
        $loc = $_POST['loc'];
        $sql = "INSERT INTO client (id, qntd,nphone, loc) VALUES ('$id', '$qntd','$nphone', '$loc')";
        if ($_conn->query($sql) === TRUE) {
            header("location: reception2.php?message=yes");
            exit();
        } else {
            header("location: ajtsock.html?message=no");
            exit();
        }
    }
    
    ?>
    </div>
    <div class="img">
    <a href="login.html"><button class="btn">Logout</button></a></div>

</body>
</html>
