<?php
$id = $_GET['id_sup'];

$query = "DELETE FROM  users WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();

header("Location: index.php?message=2");
?>