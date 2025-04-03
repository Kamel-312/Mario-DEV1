<?php
require('config.php');

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Récupérer toutes les formations
    $stmt = $pdo->query("SELECT * FROM formations");
    $formations = $stmt->fetchAll();
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
    <title>Liste des Formations</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.png">

    <style>
        body { background-color: #f8f9fa; }
        .card { transition: transform 0.5s ease-in-out; }
        .card:hover { transform: scale(1.06); }
        .feature { border-left: 5px solid #007bff; transition: 0.3s; }
        .feature:hover { background: rgba(0, 0, 0, 0.05); transform: translateY(-3px); }
    </style>
</head>
<body>

    <?php include_once 'header.php'; ?>

    <main>
        <div class="container mt-4">
            <h2 class="text-center mb-4">Liste des Formations</h2>

            <div class="row">
                <?php if (!empty($formations)) : ?>
                    <?php foreach ($formations as $row) : ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-lg mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($row["nom"]); ?></h5>
                                    <p><strong>Programme :</strong> <?= nl2br(htmlspecialchars($row["programme"])); ?></p>
                                    <p><strong>Durée :</strong> <?= htmlspecialchars($row["duree"]); ?></p>
                                    <p><strong>Objectif :</strong> <?= nl2br(htmlspecialchars($row["objectif"])); ?></p>
                                    <p><strong>Localisation :</strong> <?= htmlspecialchars($row["localisation"]); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center">Aucune formation disponible.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
