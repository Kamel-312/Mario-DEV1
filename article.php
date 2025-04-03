<?php  
require('config.php');

try {
    // Connexion avec PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Vérifier si l'ID de l'article est passé et est valide
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = (int)$_GET['id'];

        // Requête sécurisée avec requête préparée
        $stmt = $pdo->prepare("SELECT id, name, description, image FROM detail WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        // Vérifier si un article a été trouvé
        if (!$row) {
            die("Article non trouvé.");
        }
    } else {
        die("ID non fourni ou invalide.");
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
    <title><?= htmlspecialchars($row['name']); ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.png">

    <style>
        body { background-color: #f4f6f9; font-family: 'Roboto', sans-serif; line-height: 1.6; }
        .article-header { background-color: #2c3e50; color: white; padding: 50px 0; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); }
        .article-header h2 { font-size: 2.5rem; font-weight: 700; text-align: center; letter-spacing: 2px; }
        .article-body { background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; }
        .article-body:hover { box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); }
        .article-image { width: 100%; height: auto; border-radius: 8px; transition: transform 0.3s ease; }
        .article-image:hover { transform: scale(1.05); }
        .article-text { font-size: 1.1rem; color: #333; margin-top: 20px; }
        .btn-back { background-color: #3498db; color: white; padding: 12px 30px; border-radius: 50px; text-transform: uppercase; font-weight: 500; letter-spacing: 1px; border: none; transition: all 0.3s ease; }
        .btn-back:hover { background-color: #2980b9; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); }
        .container { max-width: 1200px; }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <main class="container my-5">
        <div class="article-header">
            <h2><?= htmlspecialchars($row['name']); ?></h2>
        </div>

        <div class="article-content">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="article-body">
                        <!-- Image de l'article -->
                        <?php if (!empty($row["image"])) : ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($row["image"]); ?>" class="article-image mb-4" alt="Image">
                        <?php else : ?>
                            <img src="img/default.jpg" class="article-image mb-4" alt="Image par défaut">
                        <?php endif; ?>

                        <!-- Description complète -->
                        <p class="article-text"><?= nl2br(htmlspecialchars($row["description"])); ?></p>

                        <!-- Bouton retour -->
                        <div class="text-center mt-4">
                            <a href="actualite.php" class="btn btn-back">Retour aux actualités</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
