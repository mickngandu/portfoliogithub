<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mon_portfolio"; // Remplacez par le nom de votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$postnom = $_POST['postnom'];
$prenom = $_POST['prenom'];
$date_naissance = $_POST['date-naissance'];
$sexe = $_POST['sexe'];
$mot_de_passe = password_hash($_POST['mot-de-passe'], PASSWORD_DEFAULT);  // Hacher le mot de passe pour la sécurité

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO utilisateurs (nom, postnom, prenom, date_naissance, sexe, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nom, $postnom, $prenom, $date_naissance, $sexe, $mot_de_passe);

if ($stmt->execute()) {
    echo "Inscription réussie !";
} else {
    echo "Erreur : " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>