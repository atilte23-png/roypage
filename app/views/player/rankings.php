<?php
/**
 * ROYPAGE - Player Rankings View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rankings - ROYPAGE</title>
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
        <h2>Classement des Joueurs (Système ELO)</h2>

        <?php if ($players && count($players) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Rang</th>
                        <th>Pseudo</th>
                        <th>ELO</th>
                        <th>Niveau</th>
                        <th>Victoires</th>
                        <th>Défaites</th>
                        <th>Nuls</th>
                        <th>Taux de victoire</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($players as $index => $player): ?>
                        <tr>
                            <td><strong><?= $index + 1; ?></strong></td>
                            <td><?= htmlspecialchars($player['username']); ?></td>
                            <td><strong><?= $player['elo']; ?></strong></td>
                            <td><span style="color: <?= $player['level']; ?>;"><?= htmlspecialchars($player['level']); ?></span></td>
                            <td><?= $player['wins']; ?></td>
                            <td><?= $player['losses']; ?></td>
                            <td><?= $player['draws']; ?></td>
                            <td>
                                <?php 
                                $total = $player['wins'] + $player['losses'] + $player['draws'];
                                $wr = $total > 0 ? round(($player['wins'] / $total) * 100, 1) : 0;
                                echo $wr . '%';
                                ?>
                            </td>
                            <td><a href="?page=player&action=view&id=<?= $player['id']; ?>" class="btn btn-primary">Voir</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">
                <p>Aucun joueur enregistré pour le moment.</p>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>