<?php

header("Content-Type: text/plain ; charset=utf-8");
header("Cache-Control: no-cache , private");
header("Pragma: no-cache");

require_once 'connect.php';

$myCat = $_POST['category'];

$sql = "SELECT `id`,
                `name`,
                `category`
        FROM `test`
        WHERE `category` = '$myCat'";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
