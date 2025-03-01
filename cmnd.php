<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <div >
    <h1 class="head">Liste des commandes confirmeés</h1>
  
        <?php
        $_conn = mysqli_connect("localhost", "root", "", "tpweb");
        if ($_conn->connect_error) {
            die("Connection failed: " . $_conn->connect_error);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
          
            $select_sql = "INSERT INTO cmnd (idd, nphon, qntd, loc)
                            SELECT id, nphone, qntd, loc
                            FROM client
                            WHERE id='$id'";
            if ($_conn->query($select_sql) === TRUE) {
                echo "";
            } else {
                echo "<p>Erreur lors de l'insertion des données dans la table cmnd: " . $_conn->error . "</p>";
            }
        }
        $aff_sql = "SELECT * FROM  cmnd";
        $result = $_conn->query($aff_sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Numéro de téléphone</th><th>Quantité demandée</th><th>Localisation</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["idd"]."</td>";
                echo "<td>".$row["nphon"]."</td>";
                echo "<td>".$row["qntd"]."</td>";
                echo "<td>".$row["loc"]."</td>";
                echo "<td>";
                echo "<form action='cmnd2.php' method='post'>";
                echo "<input type='hidden' name='id' value='".$row["idd"]."'>";
                echo "<input type='submit' value='Valider' class='btn'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<h1>pas de Commandes pour l'instant</h1>";
        }
        $_conn->close();
        ?>

    </div> 

    <div class="img">
        <a href="hstok.html"><img src="mv8nudc6fseto81map0rnfr9cq.png" alt=""></a>
        <a href="home.html"><img src="clipart879652.png" alt=""></a>
    </div>
</body>
</html>
