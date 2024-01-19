<?php
$id = $_GET['id_mod'];

if(isset($_POST['update'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $query = "UPDATE users SET nom = ?, email = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sss", $nom, $email, $id);
    $stmt->execute();

    header("Location: index.php?message=3");
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
        <!-- Formulaire de modification -->
        <form method="post" action="">
            <?php
                $query = "SELECT nom, email FROM users WHERE id = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("s", $id);
                $stmt->execute();

                $stmt->bind_result($nom_u, $email_u);
                $stmt->fetch();
                
            ?>
            <div>
                <label for="nom">Nom:</label>
                <input type="text" value="<?= $nom_u?>" name="nom" required>
            </div>
            <br>
            <div>
                <label for="email">Email:</label>
                <input type="email" value="<?= $email_u?>" name="email" required>
            </div>
            <br>
            <button type="submit" name="update">Modifier</button>
        </form>
    </body>
</html>