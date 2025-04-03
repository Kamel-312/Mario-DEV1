<?php
// Inclusion du fichier de configuration
require('config.php');

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sécurisation des entrées utilisateur
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $age = (int)$_POST['age'];
        $commentaire = htmlspecialchars(trim($_POST['commentaire']));

        // Vérifier que les fichiers ont bien été téléchargés
        if (!empty($_FILES['cv']['tmp_name']) && !empty($_FILES['lettre_motivation']['tmp_name'])) {
            // Lire les fichiers
            $cvData = file_get_contents($_FILES['cv']['tmp_name']);
            $lettreData = file_get_contents($_FILES['lettre_motivation']['tmp_name']);

            // Insertion dans la base de données avec PDO
            $query = "INSERT INTO clients (nom, prenom, age, cv_path, lettre_path, commentaire) VALUES (:nom, :prenom, :age, :cv, :lettre, :commentaire)";
            $stmt = $pdo->prepare($query);
            
            // Exécution de la requête avec les valeurs
            if ($stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':age' => $age,
                ':cv' => $cvData,
                ':lettre' => $lettreData,
                ':commentaire' => $commentaire
            ])) {
                echo "<script>window.onload = function() { alert('Client ajouté avec succès!'); }</script>";
            } else {
                echo "Erreur lors de l'ajout.";
            }
        } else {
            die("Erreur : Tous les fichiers doivent être téléchargés.");
        }
    }
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
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
    <title>Formulaire Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body class="bg-light">
    
    <?php include_once 'header.php'?>

    <main> 
        <div class="container py-5">
            <h2 class="text-center mb-4">Messagerie Client</h2>
            <a href="contact.php" class="btn btn-secondary mb-3">Retour</a>
            <div class="card p-4">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nom" placeholder="Votre nom" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="prenom" placeholder="Votre prénom" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="age" placeholder="Votre âge" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CV :</label>
                        <input type="file" class="form-control" name="cv" accept=".pdf,.doc,.docx" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lettre de motivation :</label>
                        <input type="file" class="form-control" name="lettre_motivation" accept=".pdf,.doc,.docx" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="commentaire" rows="3" placeholder="Votre message..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-20">Envoyer</button>
                </form>
            </div>
        </div>
    </main>


    <?php include_once 'footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
