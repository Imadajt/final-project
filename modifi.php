<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'un utilisateur</title>
    <link rel="stylesheet" href="A.css">
</head>
<body>

    <div class="cont">
        <h1>Modification d'un utilisateur</h1>
        <table>
            <?php
            $_conn = mysqli_connect("localhost", "root", "", "tpweb");
            if ($_conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $old_username = $_POST['old_username'];
                $new_username = $_POST['new_username'];
                $new_email = $_POST['new_email'];
                $new_password = $_POST['new_password'];
                $new_role = $_POST['role'];

                $sql = "UPDATE login SET username='$new_username', email='$new_email', passwordd='$new_password', rool='$new_role' WHERE username='$old_username'";

                if ($_conn->query($sql) === TRUE) {
                    header("Location: listutls.php");
                    exit();
                } else {
                    echo "<p>Erreur lors de la mise à jour des informations de l'utilisateur: " . $_conn->error . "</p>";
                }
            }

            $select_sql = "SELECT username, email, passwordd, rool FROM login";
            $result = $_conn->query($select_sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Username</th><th>Email</th><th>Password</th><th>Role</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["username"]."</td><td>".$row["email"]."</td><td>".$row["passwordd"]."</td><td>".$row["rool"]."</td></tr>";
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
            <label for="old_username">Ancien nom d'utilisateur :</label>
            <input type="text" name="old_username" id="old_username" placeholder="Ancien nom d'utilisateur">
            <label for="new_username">Nouveau nom d'utilisateur :</label>
            <input type="text" name="new_username" id="new_username" placeholder="Nouveau nom d'utilisateur">
            <label for="new_email">Nouveau email :</label>
            <input type="email" name="new_email" id="new_email" placeholder="Nouveau email">
            <label for="new_password">Nouveau mot de passe :</label>
            <input type="password" name="new_password" id="new_password" placeholder="Nouveau mot de passe">
            <label for="role">Nouveau rôle :</label>
            <select id="role" name="role">
                <option value="admin">Administrateur</option>
                <option value="user">Utilisateur</option>
            </select>
            <input type="submit" value="Modifier" class="btn">
        </form>
    </div>

<div class="img">
    <a href="hgestion.html"><img src="mv8nudc6fseto81map0rnfr9cq.png" alt="">
        <a href="home.html"><img src="clipart879652.png" alt=""></a>
</div>

</body>
</html>
