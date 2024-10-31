<?php
include_once 'db.php';

$title = trim($_POST['title']);
$content = trim($_POST['content']);

if (!$title || !$content) {
    header('Location: create.php?invalid=1');
    die;
}

$stmt = $mysqli->prepare("INSERT INTO post (title, content) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $content);
$stmt->execute();
$stmt->close();

header("Location: index.php");
?>
