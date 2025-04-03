<?php
// Inclusion du fichier de configuration
require('config.php');

try {
    // Connexion avec PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $objet = $_POST['objet'];
        $description = $_POST['description'];

        // Préparer la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO entreprise (nom, objet, description) VALUES (:nom, :objet, :description)");

        // Exécuter avec les données
        if ($stmt->execute([
            ':nom' => $nom,
            ':objet' => $objet,
            ':description' => $description
        ])) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Erreur d'insertion."]);
        }
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ESCGM - Un établissement ancré à Mayotte offrant un enseignement exigeant et professionnalisant avec un accompagnement individualisé.">
    <meta name="keywords" content="ESCGM, Mayotte, formation, enseignement, entreprise, alternance, diplôme d'État">
    <meta name="author" content="ESCGM">
    <title>Ajouter une entreprise</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body class="bg-light">
    <?php include_once 'header.php'?>

    <div class="container py-5">
        <h2 class="text-center mb-4">Messagerie entreprise</h2>
        <a href="contact.php" class="btn btn-secondary mb-3">Retour</a>
        <div class="card p-4">
            <form method="POST">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de l'entreprise :</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="objet" class="form-label">Objet de l'entreprise :</label>
                    <input type="text" class="form-control" id="objet" name="objet" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description de l'entreprise :</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

    <?php include_once 'footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
