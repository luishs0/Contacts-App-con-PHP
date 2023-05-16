<?php 
require 'database.php';

if (empty($_SESSION["user"])) {
    header("Location: index.php");
    return;
};

// var_dump($_GET["id"]);

$stmt = $conn->prepare("DELETE FROM contacts WHERE id= :idContact");
$stmt->bindParam(':idContact', $_GET["id"]);
$stmt->execute();

header("Location: home.php");
?>