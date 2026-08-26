<?php
/**
 * ROYPAGE - Tournament List View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournois - ROYPAGE</title>
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
            <h2>Liste des Tournois</h2>
            <a href="?page=tournament&action=create" class="btn btn-primary">+ Créer un tournoi</a>
        </div>

        <?php if ($tournaments && count($tournaments) > 0): ?>
            <div class="grid grid-2">
                <?php foreach ($tournaments as $tournament): ?>
                    <div class="card">
                        <h3 class="card-title"><?= htmlspecialchars($tournament['name']); ?></h3>
                        <p class="card-subtitle"><?= htmlspecialchars($tournament['tournament_type']); ?></p>
                        <p><?= htmlspecialchars(substr($tournament['description'], 0, 100)); ?>...</p>
                        <p><strong>Statut:</strong> <span class="badge badge-<?= $tournament['status']; ?>"><?= ucfirst($tournament['status']); ?></span></p>
                        <p><strong>Joueurs max:</strong> <?= $tournament['max_players']; ?></p>
                        <p><strong>Créé:</strong> <?= date('d/m/Y', strtotime($tournament['created_at'])); ?></p>
                        <a href="?page=tournament&action=view&id=<?= $tournament['id']; ?>" class="btn btn-primary mt-2">Voir détails</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                <p>Aucun tournoi disponible pour le moment.</p>
                <a href="?page=tournament&action=create" class="btn btn-primary mt-2">Créer le premier tournoi</a>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>