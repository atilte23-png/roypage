<?php
/**
 * ROYPAGE - Tournament View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Tournoi - ROYPAGE</title>
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
        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 2rem;">
            <div>
                <h2><?= htmlspecialchars($tournament['name']); ?></h2>
                <p class="card-subtitle"><?= htmlspecialchars($tournament['tournament_type']); ?></p>
            </div>
            <span class="badge badge-<?= $tournament['status']; ?>"><?= ucfirst($tournament['status']); ?></span>
        </div>

        <div class="grid grid-2">
            <div class="card">
                <h3 class="card-title">Informations</h3>
                <p><strong>Description:</strong> <?= htmlspecialchars($tournament['description']); ?></p>
                <p><strong>Type:</strong> <?= htmlspecialchars($tournament['tournament_type']); ?></p>
                <p><strong>Max Joueurs:</strong> <?= $tournament['max_players']; ?></p>
                <p><strong>ELO Min/Max:</strong> <?= $tournament['min_elo']; ?> - <?= $tournament['max_elo']; ?></p>
            </div>

            <div class="card">
                <h3 class="card-title">Dates</h3>
                <p><strong>Début:</strong> <?= $tournament['start_date'] ? date('d/m/Y H:i', strtotime($tournament['start_date'])) : 'Non défini'; ?></p>
                <p><strong>Fin:</strong> <?= $tournament['end_date'] ? date('d/m/Y H:i', strtotime($tournament['end_date'])) : 'Non défini'; ?></p>
                <p><strong>Créé le:</strong> <?= date('d/m/Y', strtotime($tournament['created_at'])); ?></p>
            </div>
        </div>

        <div class="mt-4">
            <h3>Matchs du Tournoi</h3>
            <?php if ($matches && count($matches) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Joueur 1</th>
                            <th>Joueur 2</th>
                            <th>Score</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matches as $match): ?>
                            <tr>
                                <td>#<?= $match['player1_id']; ?></td>
                                <td>#<?= $match['player2_id']; ?></td>
                                <td><?= $match['status'] === 'finished' ? $match['player1_score'] . ' - ' . $match['player2_score'] : '-'; ?></td>
                                <td><span class="badge badge-<?= $match['status']; ?>"><?= ucfirst($match['status']); ?></span></td>
                                <td><a href="?page=match&action=view&id=<?= $match['id']; ?>" class="btn btn-primary">Voir</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Aucun match pour ce tournoi.</p>
            <?php endif; ?>
        </div>

        <div class="mt-3">
            <a href="?page=tournament&action=list" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>