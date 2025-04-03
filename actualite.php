<?php 
require('config.php');

try {
    // Connexion avec PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Récupération des catégories pour le filtre
    $categoriesStmt = $pdo->query("SELECT DISTINCT categorie FROM detail ORDER BY categorie ASC");
    $categories = $categoriesStmt->fetchAll();

    // Gestion de la pagination
    $articlesParPage = 5;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $articlesParPage;

    // Filtre par catégorie
    $categorieFiltre = isset($_GET['categorie']) ? $_GET['categorie'] : '';

    // Requête SQL avec filtre catégorie
    if ($categorieFiltre) {
        $stmt = $pdo->prepare("SELECT id, name, description, image, date_publication, categorie 
                               FROM detail 
                               WHERE categorie = :categorie 
                               ORDER BY date_publication DESC 
                               LIMIT :offset, :articlesParPage");
        $stmt->bindValue(':categorie', $categorieFiltre, PDO::PARAM_STR);
    } else {
        $stmt = $pdo->prepare("SELECT id, name, description, image, date_publication, categorie 
                               FROM detail 
                               ORDER BY date_publication DESC 
                               LIMIT :offset, :articlesParPage");
    }

    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':articlesParPage', $articlesParPage, PDO::PARAM_INT);
    $stmt->execute();
    $articles = $stmt->fetchAll();

    // Nombre total d'articles (pour la pagination)
    if ($categorieFiltre) {
        $countStmt = $pdo->prepare("SELECT COUNT(*) FROM detail WHERE categorie = :categorie");
        $countStmt->bindValue(':categorie', $categorieFiltre, PDO::PARAM_STR);
    } else {
        $countStmt = $pdo->query("SELECT COUNT(*) FROM detail");
    }

    $countStmt->execute();
    $totalArticles = $countStmt->fetchColumn();
    $totalPages = ceil($totalArticles / $articlesParPage);
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
    <title>Actualités</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.png">

    <style>
        body { background-color: #f8f9fa; }
        .card img { height: 180px; object-fit: cover; }
        .icon { display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; margin-right: 10px; background: #007bff; color: white; border-radius: 50%; font-size: 1.2rem; }
        .feature { transition: all 0.3s ease-in-out; border-radius: 10px; padding: 20px; border-left: 5px solid #007bff; }
        .feature:hover { background: rgba(0, 0, 0, 0.05); transform: translateY(-3px); box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); }
        .card-title { display: flex; align-items: center; color: #2c3e50; font-weight: bold; }
        .card-footer { background: transparent; border-top: none; }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <main class="container my-5">
        <h2 class="text-center mb-4 fw-bold text-primary">Actualités</h2>

        <!-- Filtre par catégorie -->
        <div class="text-center mb-4">
            <form method="GET" class="d-inline-block">
                <label for="categorie" class="fw-bold">Filtrer par catégorie :</label>
                <select name="categorie" id="categorie" class="form-select d-inline-block w-auto">
                    <option value="">Toutes les catégories</option>
                    <?php foreach ($categories as $cat) : ?>
                        <option value="<?= htmlspecialchars($cat['categorie']); ?>" <?= $cat['categorie'] == $categorieFiltre ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($cat['categorie']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Filtrer</button>
            </form>
        </div>

        <div class="row">
            <?php if (!empty($articles)) : ?>
                <?php foreach ($articles as $row) : ?>
                    <div class="col-md-4">
                        <div class="card feature shadow-sm border-0 mb-4">
                            <?php if (!empty($row["image"])) : ?>
                                <img src="data:image/jpeg;base64,<?= base64_encode($row["image"]); ?>" class="card-img-top" alt="Image">
                            <?php else : ?>
                                <img src="img/default.jpg" class="card-img-top" alt="Image par défaut">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <span class="icon"><i class="bi bi-newspaper"></i></span> 
                                    <?= htmlspecialchars($row["name"]); ?>
                                </h5>
                                <p class="text-muted mb-1"><i class="bi bi-calendar"></i> <?= date("d/m/Y", strtotime($row["date_publication"])); ?></p>
                                <p class="text-muted"><i class="bi bi-folder"></i> <?= htmlspecialchars($row["categorie"]); ?></p>
                                <p class="card-text text-muted">
                                    <?= nl2br(htmlspecialchars(mb_strimwidth($row["description"], 0, 150, '...'))); ?>
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="article.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-primary btn-sm">Lire plus</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center text-muted">Aucune actualité trouvée.</p>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $i; ?><?= $categorieFiltre ? '&categorie=' . urlencode($categorieFiltre) : ''; ?>">
                            <?= $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </main>

    <?php include_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
