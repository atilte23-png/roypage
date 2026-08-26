<?php
/**
 * ROYPAGE - Admin Tournaments View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Tournois - ROYPAGE</title>
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
        <h2>Gestion des Tournois</h2>

        <?php if ($tournaments && count($tournaments) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Statut</th>
                        <th>Max Joueurs</th>
                        <th>Créé le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tournaments as $tournament): ?>
                        <tr>
                            <td><?= htmlspecialchars($tournament['name']); ?></td>
                            <td><?= htmlspecialchars($tournament['tournament_type']); ?></td>
                            <td><span class="badge badge-<?= $tournament['status']; ?>"><?= ucfirst($tournament['status']); ?></span></td>
                            <td><?= $tournament['max_players']; ?></td>
                            <td><?= date('d/m/Y', strtotime($tournament['created_at'])); ?></td>
                            <td>
                                <a href="?page=tournament&action=view&id=<?= $tournament['id']; ?>" class="btn btn-primary">Voir</a>
                                <a href="?page=admin&action=deleteTournament&id=<?= $tournament['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun tournoi.</p>
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