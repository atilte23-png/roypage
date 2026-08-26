<?php
/**
 * ROYPAGE - Admin Dashboard View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ROYPAGE</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
</head>
<body>
    <header>
        <h1>🎮 ROYPAGE</h1>
        <p>Gestionnaire de Tournois Esports - Admin Panel</p>
    </header>

    <nav>
        <ul>
            <li><a href="?page=home">Accueil</a></li>
            <li><a href="?page=tournament&action=list">Tournois</a></li>
            <li><a href="?page=player&action=rankings">Joueurs</a></li>
            <li><a href="?page=admin">Admin</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Dashboard Admin</h2>

        <div class="grid grid-3">
            <div class="card text-center">
                <div style="font-size: 2.5rem; color: #FFD700; margin-bottom: 1rem;">👥</div>
                <h3 class="card-title"><?= $stats['total_players']; ?></h3>
                <p class="card-subtitle">Joueurs Enregistrés</p>
                <a href="?page=admin&action=players" class="btn btn-primary mt-2">Gérer</a>
            </div>

            <div class="card text-center">
                <div style="font-size: 2.5rem; color: #FFD700; margin-bottom: 1rem;">🏆</div>
                <h3 class="card-title"><?= $stats['total_tournaments']; ?></h3>
                <p class="card-subtitle">Tournois Total</p>
                <a href="?page=admin&action=tournaments" class="btn btn-primary mt-2">Gérer</a>
            </div>

            <div class="card text-center">
                <div style="font-size: 2.5rem; color: #FFD700; margin-bottom: 1rem;">⚡</div>
                <h3 class="card-title"><?= $stats['active_tournaments']; ?></h3>
                <p class="card-subtitle">Tournois Actifs</p>
                <a href="?page=admin&action=tournaments" class="btn btn-primary mt-2">Voir</a>
            </div>
        </div>

        <section class="mt-4">
            <h3>Actions rapides</h3>
            <div class="grid grid-2">
                <a href="?page=tournament&action=create" class="card text-center" style="text-decoration: none; cursor: pointer;">
                    <p style="font-size: 2rem;">🎮</p>
                    <p><strong>Créer un tournoi</strong></p>
                </a>
                <a href="?page=player&action=register" class="card text-center" style="text-decoration: none; cursor: pointer;">
                    <p style="font-size: 2rem;">👤</p>
                    <p><strong>Enregistrer un joueur</strong></p>
                </a>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>