
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylee.css">

<header>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/R.png" alt="Logo ESCGM" class="logo">
            </a>
            <button class="navbar-toggler" type="button" onclick="toggleMenu()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <button class="close-menu d-lg-none" onclick="toggleMenu()">&times;</button>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-danger dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-house-door"></i> ESCGM
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="mot-du-directeur.php"><i class="bi bi-person"></i> MOT DU DIRECTEUR</a></li>
                            <li><a class="dropdown-item" href="presentation.php"><i class="bi bi-info-circle"></i> PRESENTATION</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-question-circle"></i> POURQUOI NOUS CHOISIR ?</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-tools"></i> METHODES & OUTILS PEDAGOGIQUES</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-people"></i> VIE ETUDIANTE</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-universal-access"></i> HANDICAP</a></li>
                            <li><a class="dropdown-item" href="contact.php"><i class="bi bi-envelope"></i> CONTACT</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="formation.php" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-book"></i> FORMATION
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-journal"></i> Programme 1</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-journal-text"></i> Programme 2</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-briefcase"></i> APPRENTISSAGE
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check"></i> Alternance</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-building"></i> Stages</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-handshake"></i> RELATION ENTREPRISE
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-3"></i> Partenariats</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-people"></i> Collaborations</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-briefcase-fill"></i> OFFRES D’EMPLOI DE NOS PARTENAIRES</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actualite"><i class="bi bi-newspaper"></i> ACTUALITÉS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    function toggleMenu() {
        document.getElementById('navbarNav').classList.toggle('show');
    }
</script>
