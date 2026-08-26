<?php
/**
 * ROYPAGE - Player View (Profil)
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Joueur - ROYPAGE</title>
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
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: start;">
                <div>
                    <h2 style="margin: 0;"><?= htmlspecialchars($player['username']); ?></h2>
                    <p class="card-subtitle"><?= htmlspecialchars($player['first_name'] . ' ' . $player['last_name']); ?></p>
                </div>
                <a href="?page=player&action=edit&id=<?= $player['id']; ?>" class="btn btn-secondary">Éditer</a>
            </div>

            <div style="margin: 2rem 0; padding: 2rem; background: rgba(0,0,0,0.05); border-radius: 8px;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; text-align: center;">
                    <div>
                        <p style="font-size: 2rem; color: #FFD700;"><strong><?= $player['elo']; ?></strong></p>
                        <p style="color: #FF0000;"><strong>ELO Rating</strong></p>
                    </div>
                    <div>
                        <p style="font-size: 1.5rem; color: #FFD700;"><strong><?= htmlspecialchars($player['level']); ?></strong></p>
                        <p style="color: #FF0000;"><strong>Niveau</strong></p>
                    </div>
                    <div>
                        <p style="font-size: 1.5rem; color: #FFD700;"><strong><?= $player['wins']; ?></strong></p>
                        <p style="color: #FF0000;"><strong>Victoires</strong></p>
                    </div>
                    <div>
                        <p style="font-size: 1.5rem; color: #FFD700;"><strong><?= $player['losses']; ?></strong></p>
                        <p style="color: #FF0000;"><strong>Défaites</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-2 mt-3">
            <div class="card">
                <h3 class="card-title">Statistiques</h3>
                <p><strong>Email:</strong> <?= htmlspecialchars($player['email']); ?></p>
                <p><strong>Inscrit le:</strong> <?= date('d/m/Y', strtotime($player['created_at'])); ?></p>
                <p><strong>Dernier accès:</strong> <?= date('d/m/Y', strtotime($player['updated_at'])); ?></p>
                
                <?php
                $total = $player['wins'] + $player['losses'] + $player['draws'];
                if ($total > 0) {
                    $winRate = round(($player['wins'] / $total) * 100, 1);
                    echo "<p><strong>Taux de victoire:</strong> {$winRate}%</p>";
                }
                ?>
            </div>

            <div class="card">
                <h3 class="card-title">Bio</h3>
                <p><?= htmlspecialchars($player['bio'] ?? 'Aucune bio'); ?></p>
            </div>
        </div>

        <div style="margin-top: 2rem;">
            <a href="?page=player&action=rankings" class="btn btn-secondary">Retour aux rankings</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>