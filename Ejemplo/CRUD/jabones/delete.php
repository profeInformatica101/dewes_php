<?php
include 'config.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM jabones WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
exit;
