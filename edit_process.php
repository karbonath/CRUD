<?php
include_once 'db.php';

$id = $_POST['id'];
$title = trim($_POST['title']);
$content = trim($_POST['content']);

if (!$title || !$content) {
    header("Location: edit.php?id=$id&invalid=1");
    die;
}

$stmt = $mysqli->prepare("UPDATE post SET title = ?, content = ? WHERE id = ?");
$stmt->bind_param("ssi", $title, $content, $id);
$stmt->execute();
$stmt->close();

header('Location: index.php');
?>
