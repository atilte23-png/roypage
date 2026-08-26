<?php
/**
 * ROYPAGE - Create Match View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Match - ROYPAGE</title>
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
        <h2>Créer un nouveau match</h2>

        <form method="POST" action="?page=match&action=create">
            <div>
                <label for="tournament_id">Tournoi *</label>
                <select id="tournament_id" name="tournament_id" required>
                    <option value="">-- Sélectionner un tournoi --</option>
                    <!-- Les tournois seront chargés dynamiquement -->
                </select>
            </div>

            <div>
                <label for="pool_id">Pool (optionnel)</label>
                <select id="pool_id" name="pool_id">
                    <option value="">-- Aucune pool --</option>
                    <!-- Les pools seront chargés dynamiquement -->
                </select>
            </div>

            <div>
                <label for="player1_id">Joueur 1 *</label>
                <select id="player1_id" name="player1_id" required>
                    <option value="">-- Sélectionner un joueur --</option>
                    <!-- Les joueurs seront chargés dynamiquement -->
                </select>
            </div>

            <div>
                <label for="player2_id">Joueur 2 *</label>
                <select id="player2_id" name="player2_id" required>
                    <option value="">-- Sélectionner un joueur --</option>
                    <!-- Les joueurs seront chargés dynamiquement -->
                </select>
            </div>

            <div>
                <label for="scheduled_at">Date programmée</label>
                <input type="datetime-local" id="scheduled_at" name="scheduled_at">
            </div>

            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary">Créer le match</button>
                <a href="?page=match&action=list" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>