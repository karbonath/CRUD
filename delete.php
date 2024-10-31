<?php
include_once 'db.php';

$id = $_POST['id'];

if (!$id) {
    header('Location: index.php');
    die;
}

$stmt = $mysqli->prepare("DELETE FROM post WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header('Location: index.php');
?>
