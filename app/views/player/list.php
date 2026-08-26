<?php
/**
 * ROYPAGE - Player List View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joueurs - ROYPAGE</title>
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
            <h2>Liste des Joueurs</h2>
            <a href="?page=player&action=register" class="btn btn-primary">+ Enregistrer un joueur</a>
        </div>

        <?php if ($players && count($players) > 0): ?>
            <div class="grid grid-2">
                <?php foreach ($players as $player): ?>
                    <div class="card">
                        <h3 class="card-title"><?= htmlspecialchars($player['username']); ?></h3>
                        <p class="card-subtitle"><?= htmlspecialchars($player['first_name'] . ' ' . $player['last_name']); ?></p>
                        
                        <div style="margin: 1rem 0;">
                            <p><strong>ELO:</strong> <span style="color: #FFD700; font-size: 1.2rem;"><?= $player['elo']; ?></span></p>
                            <p><strong>Niveau:</strong> <span style="color: #FF0000;"><?= htmlspecialchars($player['level']); ?></span></p>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem; text-align: center; margin: 1rem 0;">
                            <div>
                                <p style="font-size: 1.2rem; color: #FFD700;"><strong><?= $player['wins']; ?></strong></p>
                                <p style="font-size: 0.8rem;">Victoires</p>
                            </div>
                            <div>
                                <p style="font-size: 1.2rem; color: #FF0000;"><strong><?= $player['losses']; ?></strong></p>
                                <p style="font-size: 0.8rem;">Défaites</p>
                            </div>
                            <div>
                                <p style="font-size: 1.2rem; color: #808080;"><strong><?= $player['draws']; ?></strong></p>
                                <p style="font-size: 0.8rem;">Nuls</p>
                            </div>
                        </div>

                        <a href="?page=player&action=view&id=<?= $player['id']; ?>" class="btn btn-primary">Voir profil</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                <p>Aucun joueur enregistré pour le moment.</p>
                <a href="?page=player&action=register" class="btn btn-primary mt-2">Enregistrer le premier joueur</a>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>