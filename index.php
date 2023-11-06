<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "votes");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des données POST
$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$password = $_POST['password'];

// Préparez votre requête SQL en retirant la virgule après "password"
$sql = "INSERT INTO vote (name, email , password) VALUES ('$userName', '$userEmail', '$password')";

// Exécutez la requête
if ($conn->query($sql) === TRUE) {
    echo "Success!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Fermez la connexion à la base de données
$conn->close();
?>
