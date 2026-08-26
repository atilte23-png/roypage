<?php
/**
 * ROYPAGE - Match List View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matchs - ROYPAGE</title>
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
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2>Liste des Matchs</h2>
            <a href="?page=match&action=create" class="btn btn-primary">+ Créer un match</a>
        </div>

        <?php if ($matches && count($matches) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Tournoi</th>
                        <th>Joueur 1</th>
                        <th>Joueur 2</th>
                        <th>Score</th>
                        <th>Statut</th>
                        <th>Changement ELO</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matches as $match): ?>
                        <tr>
                            <td><?= htmlspecialchars($match['tournament_id']); ?></td>
                            <td><?= htmlspecialchars($match['player1_id']); ?></td>
                            <td><?= htmlspecialchars($match['player2_id']); ?></td>
                            <td>
                                <?php if ($match['status'] === 'finished'): ?>
                                    <strong><?= $match['player1_score']; ?> - <?= $match['player2_score']; ?></strong>
                                <?php else: ?>
                                    <em>-</em>
                                <?php endif; ?>
                            </td>
                            <td><span class="badge badge-<?= $match['status']; ?>"><?= ucfirst($match['status']); ?></span></td>
                            <td>
                                <?php if ($match['status'] === 'finished'): ?>
                                    <span style="color: <?= $match['player1_elo_change'] > 0 ? 'green' : 'red'; ?>">
                                        <?= $match['player1_elo_change'] > 0 ? '+' : ''; ?><?= $match['player1_elo_change']; ?>
                                    </span>
                                    /
                                    <span style="color: <?= $match['player2_elo_change'] > 0 ? 'green' : 'red'; ?>">
                                        <?= $match['player2_elo_change'] > 0 ? '+' : ''; ?><?= $match['player2_elo_change']; ?>
                                    </span>
                                <?php else: ?>
                                    <em>-</em>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="?page=match&action=view&id=<?= $match['id']; ?>" class="btn btn-primary">Voir</a>
                                <?php if ($match['status'] === 'pending'): ?>
                                    <a href="?page=match&action=finish&id=<?= $match['id']; ?>" class="btn btn-danger">Terminer</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">
                <p>Aucun match pour le moment.</p>
                <a href="?page=match&action=create" class="btn btn-primary mt-2">Créer un match</a>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>