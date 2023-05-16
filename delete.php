<?php 
require 'database.php';

session_start();

if (empty($_SESSION["user"])) {
    header("Location: index.php");
    return;
};

// var_dump($_GET["id"]);

$query = $conn->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1");
$query->bindParam(":id", $_GET["id"]);
$query->execute();

$contactCompare = $query->fetchAll(PDO::FETCH_ASSOC);


if ($_SESSION["user"]["id"] != $contactCompare[0]["user_id"]) {
http_response_code(403);
echo "http 403";
return;
}

$stmt = $conn->prepare("DELETE FROM contacts WHERE id= :idContact");
$stmt->bindParam(':idContact', $_GET["id"]);
$stmt->execute();

$_SESSION["flash"] = "delete";
header("Location: home.php");
?>