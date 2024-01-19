<?php
    if (isset($_POST['valider'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];

        $query = "INSERT INTO users (nom, email) VALUES (?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ss", $nom, $email);
        $stmt->execute();

        header("Location: index.php?message=1");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD en PHP</title>
    </head>
    <body>
        <!-- Message de modification -->
        <?php $message = $_GET['message']; 
            if($message == 1){
                echo "<p><em>Ajout effectuer avec succès</em></p>";
            }
            elseif($message == 2){
                echo "<p><em>Suppression effectuer avec succès</em></p>";
            }
            elseif($message == 3){
                echo "<p><em>Modification effectuer avec succès</em></p>";
            }
        ?>

        <!-- Formulaire de création -->
        <form method="post" action="">
            <div>
                <label for="nom">Nom:</label>
                <input type="text" name="nom" required>
            </div>
            <br>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <br>
            <button type="submit" name="valider">Inscription</button>
        </form>
        <br><br><br>
        <!-- Liste utilisateur -->
        <?php
            $query = "SELECT * FROM users";
            $result = $mysqli->query($query);

            // Vérification des erreurs
            if (!$result) {
                die("Erreur dans la requête : " . $mysqli->error);
            }
        ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Options</th>
                <!-- Ajoutez d'autres colonnes selon votre structure de table -->
            </tr>
            <?php
            // Affichage des résultats
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="/TpFgil/Mysql/index.php?id_sup=<?= $row['id']?>">delete</a>
                        <a href="/TpFgil/Mysql/index.php?id_mod=<?= $row['id']?>">update</a>
                    </td>
                    <!-- Ajoutez d'autres cellules selon votre structure de table -->
                </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>