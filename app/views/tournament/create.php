<?php
/**
 * ROYPAGE - Create Tournament View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Tournoi - ROYPAGE</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
</head>
<body>
    <header>
        <h1>🎮 ROYPAGE</h1>
        <p>Gestionnaire de Tournois Esports</p>
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
        <h2>Créer un nouveau tournoi</h2>

        <form method="POST" action="?page=tournament&action=create">
            <div>
                <label for="name">Nom du tournoi *</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>

            <div>
                <label for="tournament_type">Type de tournoi *</label>
                <select id="tournament_type" name="tournament_type" required>
                    <option value="single_elimination">Élimination simple</option>
                    <option value="double_elimination">Double élimination</option>
                    <option value="round_robin">Round-robin</option>
                    <option value="pools">Pools</option>
                </select>
            </div>

            <div>
                <label for="max_players">Nombre maximum de joueurs</label>
                <input type="number" id="max_players" name="max_players" value="32">
            </div>

            <div>
                <label for="min_elo">ELO minimum</label>
                <input type="number" id="min_elo" name="min_elo" value="0">
            </div>

            <div>
                <label for="max_elo">ELO maximum</label>
                <input type="number" id="max_elo" name="max_elo" value="3000">
            </div>

            <div>
                <label for="start_date">Date de début</label>
                <input type="datetime-local" id="start_date" name="start_date">
            </div>

            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary">Créer le tournoi</button>
                <a href="?page=tournament&action=list" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>