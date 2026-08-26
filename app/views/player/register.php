<?php
/**
 * ROYPAGE - Player Register View
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire - ROYPAGE</title>
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
        <div style="max-width: 500px; margin: 2rem auto;">
            <h2>S'inscrire sur ROYPAGE</h2>

            <form method="POST" action="?page=player&action=register">
                <div>
                    <label for="username">Pseudo *</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div>
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label for="password">Mot de passe *</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <label for="first_name">Prénom</label>
                    <input type="text" id="first_name" name="first_name">
                </div>

                <div>
                    <label for="last_name">Nom</label>
                    <input type="text" id="last_name" name="last_name">
                </div>

                <div class="alert alert-info mt-2">
                    <p><strong>ℹ️ Note:</strong> Vous commencerez avec un rating ELO de 1200 (niveau Bronze).</p>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                    <a href="?page=home" class="btn btn-secondary">Retour</a>
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