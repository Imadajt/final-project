<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un utilisateur</title>
    <link rel="stylesheet" href="A.css">
</head>
<body>

    <div class="cont">
    <h1>Suppression d'un utilisateur</h1>
        <table>
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
<br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="us">Taper le nom d'utilisateur que vous voulez supprimer :</label>
        <input type="text" name="username" id="us" placeholder="Nom d'utilisateur">
        <input type="submit" value="Supprimer l'utilisateur" class="btn">
    </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the username is provided
        if (isset($_POST["username"])) {
            // Get the username from the form
            $username = $_POST["username"];

            // Establish database connection
            $_conn = mysqli_connect("localhost", "root", "", "tpweb");
            if ($_conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute the SQL query to delete the user
            $sql = "DELETE FROM login WHERE username = '$username'";
            if ($_conn->query($sql) === TRUE) {
                // Rediriger vers imad.html après la suppression réussie
                header("Location: listutls.php");
                exit(); // Arrêter l'exécution pour éviter toute sortie supplémentaire
            } else {
                echo "Erreur lors de la suppression de l'utilisateur : " . $_conn->error;
            }

            // Close the database connection
            $_conn->close();
        } else {
            echo "Nom d'utilisateur non fourni.";
        }
    }
    ?>
    <div class="img">
    <a href="hgestion.html"><img src="mv8nudc6fseto81map0rnfr9cq.png" alt="">
        <a href="home.html"><img src="clipart879652.png" alt=""></a></div>

</body>
</html>
