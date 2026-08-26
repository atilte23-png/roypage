<?php
/**
 * ROYPAGE - Page d'accueil
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROYPAGE - Gestionnaire de Tournois Esports</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>🎮 ROYPAGE</h1>
        <p>Gestionnaire de Tournois Esports - Système ELO Automatisé</p>
    </header>

    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="?page=home">Accueil</a></li>
            <li><a href="?page=tournament&action=list">Tournois</a></li>
            <li><a href="?page=player&action=list">Joueurs</a></li>
            <li><a href="?page=admin">Admin</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <section class="hero">
            <h2>Bienvenue sur ROYPAGE</h2>
            <p>La plateforme complète pour organiser des tournois esports avec équilibrage automatique des matchs basé sur le système ELO.</p>
        </section>

        <!-- Features Grid -->
        <div class="grid grid-3">
            <div class="card">
                <h3 class="card-title">🏆 Tournois Intelligents</h3>
                <p class="card-subtitle">Créez et gérez des tournois</p>
                <p>Organisez des tournois avec différents formats : élimination simple/double, round-robin, et pools équilibrés.</p>
                <a href="?page=tournament&action=create" class="btn btn-primary mt-2">Créer un tournoi</a>
            </div>

            <div class="card">
                <h3 class="card-title">📊 Système ELO Automatique</h3>
                <p class="card-subtitle">Classement en temps réel</p>
                <p>Les ratings ELO des joueurs se mettent à jour automatiquement après chaque match pour un classement juste et équitable.</p>
                <a href="?page=player&action=rankings" class="btn btn-primary mt-2">Voir les rankings</a>
            </div>

            <div class="card">
                <h3 class="card-title">⚙️ Équilibrage Intelligent</h3>
                <p class="card-subtitle">Matchs compétitifs</p>
                <p>L'algorithme d'équilibrage regroupe les joueurs par niveau pour créer des matchs justes et excitants.</p>
                <a href="?page=tournament&action=list" class="btn btn-primary mt-2">Voir les matchs</a>
            </div>
        </div>

        <!-- Quick Stats -->
        <section class="mt-4">
            <h2>Statistiques Globales</h2>
            <div class="grid grid-3">
                <div class="card text-center">
                    <div style="font-size: 2rem; color: #FFD700;">127</div>
                    <p class="card-subtitle">Joueurs Enregistrés</p>
                </div>
                <div class="card text-center">
                    <div style="font-size: 2rem; color: #FFD700;">23</div>
                    <p class="card-subtitle">Tournois Organisés</p>
                </div>
                <div class="card text-center">
                    <div style="font-size: 2rem; color: #FFD700;">1,247</div>
                    <p class="card-subtitle">Matchs Joués</p>
                </div>
            </div>
        </section>

        <!-- Getting Started -->
        <section class="mt-4">
            <h2>Démarrer</h2>
            <div class="card">
                <h3 class="card-title">Premiers pas avec ROYPAGE</h3>
                <ol style="margin-left: 2rem;">
                    <li><strong>Créez un compte</strong> - Inscrivez-vous en tant que joueur</li>
                    <li><strong>Rejoignez un tournoi</strong> - Cherchez un tournoi et inscrivez-vous</li>
                    <li><strong>Jouez des matchs</strong> - Participez aux matchs de votre pool ou bracket</li>
                    <li><strong>Montez au classement</strong> - Vos ratings ELO augmentent avec vos victoires</li>
                </ol>
                <a href="?page=player&action=register" class="btn btn-primary mt-3">S'inscrire maintenant</a>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
        <p>Développé avec ❤️ pour les compétiteurs</p>
        <p><a href="#">Documentation</a> | <a href="#">Contact</a> | <a href="#">Conditions d'utilisation</a></p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>