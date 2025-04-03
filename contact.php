<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ESCGM - Un établissement ancré à Mayotte offrant un enseignement exigeant et professionnalisant avec un accompagnement individualisé.">
    <meta name="keywords" content="ESCGM, Mayotte, formation, enseignement, entreprise, alternance, diplôme d'État">
    <meta name="author" content="ESCGM">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Contact</title>
    <link rel="icon" href="img/favicon.png">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }


        .footer_backgr {
            background: #2c3e50;
            color: white;
        }
        .footer_backgr .list-unstyled li a {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease-in-out;
        }
        .footer_backgr .list-unstyled li a:hover {
            color: #007bff;
        }
        .footer_backgr i {
            font-size: 1.2rem;
        }
        footer .btn-outline-light {
            border-color: #fff;
            color: #fff;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        footer .btn-outline-light:hover {
            background-color: #fff;
            color: #007bff;
        }
        footer .text-center p a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        footer .text-center p a:hover {
            color: #007bff;
        }
        
        footer a:hover {
            color: white;
            text-decoration: none;
        }

        .card-group .card {
            margin: 15px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card-group .card:hover {
            transform: translateY(-10px);
        }

        .card-img-top {
            font-size: 4rem;
            text-align: center;
            padding-top: 30px;
        }

        .card-body {
            background-color: #ffffff;
            padding: 30px;
        }

        .card-title {
            font-weight: 600;
            font-size: 1.25rem;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .container h2 {
            text-align: center;
            font-weight: 600;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'?>

    <div class="container py-5">
        <h2>Pour nous contacter, veuillez choisir si vous êtes :</h2>
        
        <div class="card-group mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title bi bi-person-circle">Je suis client</h5>
                    <p class="card-text">Si vous êtes un particulier ou un consommateur souhaitant en savoir plus sur nos services, choisissez cette option.</p>
                    <a href="formulaire-client.php" class="btn btn-primary">Choisir cette option</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title bi bi-building">Je suis une entreprise</h5>
                    <p class="card-text">Si vous représentez une entreprise et souhaitez collaborer avec nous, choisissez cette option.</p>
                    <a href="formulaire-entreprise.php" class="btn btn-primary">Choisir cette option</a>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'?>
</body>
</html>
