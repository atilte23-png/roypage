<?php
/**
 * ROYPAGE - Finish Match View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminer le Match - ROYPAGE</title>
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
        <h2>Terminer le Match #<?= $match['id']; ?></h2>

        <div class="card" style="background: rgba(0,0,0,0.05); margin: 2rem 0;">
            <p style="text-align: center;">
                <strong style="color: #FFD700; font-size: 1.2rem;">Joueur #<?= $match['player1_id']; ?></strong>
                <span style="margin: 0 2rem; color: #FFD700; font-size: 1.2rem;">VS</span>
                <strong style="color: #FFD700; font-size: 1.2rem;">Joueur #<?= $match['player2_id']; ?></strong>
            </p>
        </div>

        <form method="POST" action="?page=match&action=finish&id=<?= $match['id']; ?>">
            <h3 class="card-title">Résultat du Match</h3>

            <div>
                <label for="player1_score">Score Joueur 1 *</label>
                <input type="number" id="player1_score" name="player1_score" min="0" required>
            </div>

            <div>
                <label for="player2_score">Score Joueur 2 *</label>
                <input type="number" id="player2_score" name="player2_score" min="0" required>
            </div>

            <div>
                <label for="winner_id">Vainqueur *</label>
                <select id="winner_id" name="winner_id" required>
                    <option value="">-- Sélectionner le vainqueur --</option>
                    <option value="<?= $match['player1_id']; ?>">Joueur #<?= $match['player1_id']; ?></option>
                    <option value="<?= $match['player2_id']; ?>">Joueur #<?= $match['player2_id']; ?></option>
                </select>
            </div>

            <div class="alert alert-info mt-3">
                <p><strong>ℹ️ Note:</strong> L'ELO sera calculé automatiquement selon le système ELO (K-factor = 32).</p>
            </div>

            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-danger">Terminer le match</button>
                <a href="?page=match&action=view&id=<?= $match['id']; ?>" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>