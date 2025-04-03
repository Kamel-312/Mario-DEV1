<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ESCGM - Un établissement ancré à Mayotte offrant un enseignement exigeant et professionnalisant avec un accompagnement individualisé.">
    <meta name="keywords" content="ESCGM, Mayotte, formation, enseignement, entreprise, alternance, diplôme d'État">
    <meta name="author" content="ESCGM">
    <link href="css/stylee.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Mentions légales | ESCGM</title>
    <link rel="icon" href="img/favicon.png">
    <style>
        .logo {
        height: auto;
        width: 100px;
        }
        .navbar-nav .nav-link {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: color 0.3s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.2rem;
        }
        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-nav {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        gap: 8px; /* Réduit l'espacement entre les éléments */
        }

        .nav-item {
            white-space: nowrap; /* Empêche le retour à la ligne */
        }

        .navbar-nav .nav-link {
            font-size: 0.9rem; /* Réduit la taille de la police */
            padding: 5px 10px; /* Réduit l'espace autour du texte */
        }

        .dropdown-menu {
            font-size: 0.85rem; /* Réduit la taille de la police dans les menus déroulants */
        }



        .footer_backgr {
        background: #2c3e50; /* Fond plus sombre pour contraster avec le header */
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
    
    
        /* Optionnel : Ajouter un léger effet de survol à tous les liens de texte */
        footer a:hover {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php include_once 'header.php'?>

<main class="container my-5">
<p>Quand vous laissez un commentaire sur notre site web, les données inscrites dans le formulaire de commentaire, mais aussi votre adresse IP et l’agent utilisateur de votre navigateur sont collectés pour nous aider à la détection des commentaires indésirables.</p>
    <p>Une chaîne anonymisée créée à partir de votre adresse de messagerie (également appelée hash) peut être envoyée au service Gravatar pour vérifier si vous utilisez ce dernier. Les clauses de confidentialité du service Gravatar sont disponibles ici : https://automattic.com/privacy/. Après validation de votre commentaire, votre photo de profil sera visible publiquement à coté de votre commentaire.</p>
    <p>Si vous déposez un commentaire sur notre site, il vous sera proposé d’enregistrer votre nom, adresse de messagerie et site web dans des cookies. C’est uniquement pour votre confort afin de ne pas avoir à saisir ces informations si vous déposez un autre commentaire plus tard. Ces cookies expirent au bout d’un an.</p>
    <p>Si vous avez un compte et que vous vous connectez sur ce site, un cookie temporaire sera créé afin de déterminer si votre navigateur accepte les cookies. Il ne contient pas de données personnelles et sera supprimé automatiquement à la fermeture de votre navigateur.</p>
    <p>Lorsque vous vous connecterez, nous mettrons en place un certain nombre de cookies pour enregistrer vos informations de connexion et vos préférences d’écran. La durée de vie d’un cookie de connexion est de deux jours, celle d’un cookie d’option d’écran est d’un an. Si vous cochez « Se souvenir de moi », votre cookie de connexion sera conservé pendant deux semaines. Si vous vous déconnectez de votre compte, le cookie de connexion sera effacé.</p>
    <p>En modifiant ou en publiant une publication, un cookie supplémentaire sera enregistré dans votre navigateur. Ce cookie ne comprend aucune donnée personnelle. Il indique simplement l’ID de la publication que vous venez de modifier. Il expire au bout d’un jour.</p>
</main>
<?php include_once 'footer.php'?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
