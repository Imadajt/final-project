<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cont">
    <h1>liste des utilisateur</h1>
        <table>
            <caption>
            Opération accomplie avec succès
            </caption>
            <?php
                $_conn = mysqli_connect("localhost", "root", "", "tpweb");
                if ($_conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT username, rool FROM login";
                $result = $_conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Username</th><th>Role</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["username"]."</td><td>".$row["rool"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $_conn->close();
            ?>
        </table>
    
    </div>
    <div class="img">
    <a href="hgestion.html"><img src="mv8nudc6fseto81map0rnfr9cq.png" alt="">
        <a href="home.html"><img src="clipart879652.png" alt=""></a></div>

</body>
</html>
