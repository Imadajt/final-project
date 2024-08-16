<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="A.css">
    <title>Login</title>
</head>
<body>
    <div class="cont">
       
        <?php 
        $error_message = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom_utilisateur  = $_POST['username'];
            $mot_de_passe = $_POST['password'];

            $connexion = new mysqli("localhost", "root", "", "tpweb");
            if ($connexion->connect_error) {
                die("Échec de la connexion : " . $connexion->connect_error);
            } else {
                $requete = $connexion->prepare("SELECT * FROM login WHERE username = ?");
                $requete->bind_param("s", $nom_utilisateur);
                $requete->execute();
                $resultat_requete = $requete->get_result();
                if ($resultat_requete->num_rows > 0) {
                    $donnees_utilisateur = $resultat_requete->fetch_assoc();
                    if ($donnees_utilisateur['passwordd'] === $mot_de_passe) {
                        $est_admin = ($donnees_utilisateur['rool'] === 'admin');
                        $est_utilisateur = ($donnees_utilisateur['rool'] === 'user');

                        if ($est_admin) {
                            header("Location: home.html");
                            exit();
                        } elseif ($est_utilisateur) {
                            header("Location: reception.php");
                            exit();
                        }
                    } else {
                        $error_message = "Mot de passe incorrect";
                    }
                } else {
                    $error_message = "Nom d'utilisateur invalide";
                }
            }
        }
        ?>
        <form method="post" action="">
        <div class="head"><h1>LOGIN</h1></div>
             <label for="us">Username:</label>
            <input placeholder="username"
             id="us" name="username" type="text" required>
             <label for="ps">Password:</label>
            <input placeholder="password" 
            id="ps" name="password" type="password" required>
            <input value="Login" class="btn" type="submit">
        </form>
        
          <p> You don't have an account?<br>
            <br><a href="registre.html">
                <button class="btn">Sign in now</button></a></p>
        <?php 
        if (!empty($error_message)) {
            echo "<h4>$error_message</h4>";
        }
        ?>
    </div>
</body>
</html>
