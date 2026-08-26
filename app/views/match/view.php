<?php
/**
 * ROYPAGE - Match View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Match - ROYPAGE</title>
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
        <h2>Détails du Match</h2>

        <div class="grid grid-2">
            <div class="card">
                <h3 class="card-title">Match #<?= $match['id']; ?></h3>
                <p class="card-subtitle">Statut: <span class="badge badge-<?= $match['status']; ?>"><?= ucfirst($match['status']); ?></span></p>
                
                <div style="margin: 1rem 0;">
                    <p><strong>Tournoi:</strong> #<?= $match['tournament_id']; ?></p>
                    <p><strong>Pool:</strong> <?= $match['pool_id'] ? '#' . $match['pool_id'] : 'Aucune'; ?></p>
                </div>
            </div>

            <div class="card">
                <h3 class="card-title">Résultat</h3>
                <?php if ($match['status'] === 'finished'): ?>
                    <p style="font-size: 1.5rem; text-align: center;">
                        <strong style="color: #FFD700;"><?= $match['player1_score']; ?></strong>
                        <span style="margin: 0 1rem;">-</span>
                        <strong style="color: #FFD700;"><?= $match['player2_score']; ?></strong>
                    </p>
                    <p style="text-align: center;">
                        <strong style="color: #FF0000;">Vainqueur:</strong>
                        <?php if ($match['winner_id']): ?>
                            Joueur #<?= $match['winner_id']; ?>
                        <?php else: ?>
                            Non défini
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <p style="text-align: center; color: #FFD700;">En attente...</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="grid grid-2 mt-3">
            <div class="card">
                <h3 class="card-title">Joueur 1</h3>
                <p class="card-subtitle">#<?= $match['player1_id']; ?></p>
                <?php if ($match['status'] === 'finished'): ?>
                    <p>
                        <strong>Score:</strong> <?= $match['player1_score']; ?>
                    </p>
                    <p>
                        <strong>Changement ELO:</strong>
                        <span style="color: <?= $match['player1_elo_change'] > 0 ? 'green' : 'red'; ?>; font-size: 1.2rem;">
                            <?= $match['player1_elo_change'] > 0 ? '+' : ''; ?><?= $match['player1_elo_change']; ?>
                        </span>
                    </p>
                <?php endif; ?>
            </div>

            <div class="card">
                <h3 class="card-title">Joueur 2</h3>
                <p class="card-subtitle">#<?= $match['player2_id']; ?></p>
                <?php if ($match['status'] === 'finished'): ?>
                    <p>
                        <strong>Score:</strong> <?= $match['player2_score']; ?>
                    </p>
                    <p>
                        <strong>Changement ELO:</strong>
                        <span style="color: <?= $match['player2_elo_change'] > 0 ? 'green' : 'red'; ?>; font-size: 1.2rem;">
                            <?= $match['player2_elo_change'] > 0 ? '+' : ''; ?><?= $match['player2_elo_change']; ?>
                        </span>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <div class="mt-3">
            <?php if ($match['status'] === 'pending'): ?>
                <a href="?page=match&action=finish&id=<?= $match['id']; ?>" class="btn btn-primary">Terminer ce match</a>
            <?php endif; ?>
            <a href="?page=match&action=list" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>