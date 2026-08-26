<?php
/**
 * ROYPAGE - Admin Players View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Joueurs - ROYPAGE</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
</head>
<body>
    <header>
        <h1>🎮 ROYPAGE</h1>
        <p>Gestionnaire de Tournois Esports - Admin</p>
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
        <h2>Gestion des Joueurs</h2>

        <?php if ($players && count($players) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>ELO</th>
                        <th>Niveau</th>
                        <th>V/D/N</th>
                        <th>Inscrit le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($players as $player): ?>
                        <tr>
                            <td><?= htmlspecialchars($player['username']); ?></td>
                            <td><?= htmlspecialchars($player['email']); ?></td>
                            <td><?= $player['elo']; ?></td>
                            <td><?= htmlspecialchars($player['level']); ?></td>
                            <td><?= $player['wins']; ?>/<?= $player['losses']; ?>/<?= $player['draws']; ?></td>
                            <td><?= date('d/m/Y', strtotime($player['created_at'])); ?></td>
                            <td>
                                <a href="?page=player&action=view&id=<?= $player['id']; ?>" class="btn btn-primary">Voir</a>
                                <a href="?page=admin&action=deletePlayer&id=<?= $player['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun joueur enregistré.</p>
        <?php endif; ?>

        <div class="mt-3">
            <a href="?page=admin" class="btn btn-secondary">Retour au dashboard</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>