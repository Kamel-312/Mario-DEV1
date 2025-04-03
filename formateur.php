<?php
require('config.php');

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Récupérer les formateurs du plus récent au plus ancien
    $stmt = $pdo->query("SELECT * FROM formateur ORDER BY id DESC");
    $formateurs = $stmt->fetchAll();
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
    <title>Liste des Formateurs</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.png">

    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand img { max-width: 120px; height: auto; }
        .card img { height: 180px; object-fit: cover; }
        .card { transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body>

    <?php include_once 'header.php'; ?>

    <main>
        <div class="container mt-5">
            <h2 class="text-center mb-5 fw-bold text-primary"><i class="bi bi-people"></i> Liste des Formateurs</h2>

            <div class="row g-4">
                <?php if (!empty($formateurs)) : ?>
                    <?php foreach ($formateurs as $row) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                                <?php if (!empty($row["image"])) : ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($row["image"]); ?>" class="card-img-top" alt="Formateur">
                                <?php else : ?>
                                    <img src="img/default.jpg" class="card-img-top" alt="Image par défaut">
                                <?php endif; ?>
                                <div class="card-body text-center bg-light py-4">
                                    <h5 class="card-title fw-bold text-dark mb-2">
                                        <?= htmlspecialchars($row["prenom"]) . " " . htmlspecialchars($row["nom"]); ?>
                                    </h5>
                                    <p class="card-text text-muted mb-3">
                                        <i class="bi bi-mortarboard"></i> <?= htmlspecialchars($row["formation"]); ?>
                                    </p>
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-4">
                                        Voir profil
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12 text-center">
                        <p class="fs-5 text-muted"><i class="bi bi-exclamation-circle"></i> Aucun formateur trouvé.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
