<?php
/**
 * ROYPAGE - Player Edit View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer Profil - ROYPAGE</title>
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
        <div style="max-width: 600px; margin: 2rem auto;">
            <h2>Éditer le Profil</h2>

            <form method="POST" action="?page=player&action=edit&id=<?= $player['id']; ?>">
                <div>
                    <label for="username">Pseudo (non modifiable)</label>
                    <input type="text" id="username" value="<?= htmlspecialchars($player['username']); ?>" disabled>
                </div>

                <div>
                    <label for="email">Email (non modifiable)</label>
                    <input type="email" id="email" value="<?= htmlspecialchars($player['email']); ?>" disabled>
                </div>

                <div>
                    <label for="first_name">Prénom</label>
                    <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($player['first_name']); ?>">
                </div>

                <div>
                    <label for="last_name">Nom</label>
                    <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($player['last_name']); ?>">
                </div>

                <div>
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio" rows="4"><?= htmlspecialchars($player['bio'] ?? ''); ?></textarea>
                </div>

                <div class="alert alert-info mt-2">
                    <p><strong>ℹ️ Note:</strong> Vous ne pouvez pas modifier votre pseudo ou email.</p>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    <a href="?page=player&action=view&id=<?= $player['id']; ?>" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>