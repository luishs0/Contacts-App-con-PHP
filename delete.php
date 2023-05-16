<?php 
require 'database.php';

session_start();

if (empty($_SESSION["user"])) {
    header("Location: index.php");
    return;
};

// var_dump($_GET["id"]);

if ($_SESSION["user"]["id"] != $_GET["id"]) {
    http_response_code(403);
    echo "http 403";
    return;
}

$stmt = $conn->prepare("DELETE FROM contacts WHERE id= :idContact");
$stmt->bindParam(':idContact', $_GET["id"]);
$stmt->execute();

header("Location: home.php");
?>