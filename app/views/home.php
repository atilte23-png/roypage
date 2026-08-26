<?php
/**
 * ROYPAGE - Page d'accueil
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROYPAGE - Gestionnaire de Tournois Esports</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            border-top: 5px solid #FFD700;
            border-bottom: 5px solid #FF0000;
            padding: 4rem 2rem;
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -50%;
            left: -50%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 0, 0, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-section h2 {
            font-size: 3rem;
            color: #FFD700;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .hero-section p {
            font-size: 1.3rem;
            color: #FF0000;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            margin-bottom: 2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            transition: all 0.3s ease;
            border-top: 3px solid #FFD700;
            background: white;
        }

        .card:hover {
            box-shadow: 0 8px 24px rgba(255, 215, 0, 0.3);
            transform: translateY(-5px);
            border-top-color: #FF0000;
        }

        .card-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .feature-grid {
            margin: 3rem 0;
        }

        .stats-container {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            border-radius: 8px;
            padding: 3rem;
            margin: 2rem 0;
            border-left: 5px solid #FFD700;
            border-right: 5px solid #FF0000;
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
        }

        .stat-number {
            font-size: 3rem;
            color: #FFD700;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .stat-label {
            color: #FF0000;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 0.5rem;
        }

        .getting-started {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            border-radius: 8px;
            padding: 2rem;
            border-left: 5px solid #FF0000;
        }

        .getting-started h3 {
            color: #FFD700;
            text-transform: uppercase;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #FF0000;
            padding-bottom: 0.5rem;
        }

        .getting-started ol {
            margin-left: 2rem;
            color: #ffffff;
        }

        .getting-started li {
            margin-bottom: 1rem;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .getting-started strong {
            color: #FFD700;
        }

        .section-title {
            font-size: 2rem;
            color: #FFD700;
            border-bottom: 3px solid #FF0000;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .quick-action-card {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: white;
            border: 2px solid #FFD700;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quick-action-card:hover {
            background: #FFD700;
            color: #000000;
            box-shadow: 0 8px 24px rgba(255, 215, 0, 0.4);
            transform: scale(1.05);
        }

        .quick-action-card p {
            font-size: 1.3rem;
            color: inherit;
        }

        .quick-action-card strong {
            font-size: 1.2rem;
            margin-top: 0.5rem;
        }

        .decorative-line {
            height: 3px;
            background: linear-gradient(90deg, #FFD700 0%, transparent 50%, #FF0000 100%);
            margin: 2rem 0;
            border-radius: 2px;
        }

        @media (max-width: 768px) {
            .hero-section h2 {
                font-size: 2rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>🎮 ROYPAGE</h1>
        <p>Gestionnaire de Tournois Esports - Système ELO Automatisé</p>
    </header>

    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="?page=home">Accueil</a></li>
            <li><a href="?page=tournament&action=list">Tournois</a></li>
            <li><a href="?page=player&action=rankings">Classement</a></li>
            <li><a href="?page=match&action=list">Matchs</a></li>
            <li><a href="?page=admin">Admin</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h2>Bienvenue sur ROYPAGE</h2>
            <p>La plateforme complète pour organiser des tournois esports avec équilibrage automatique basé sur le système ELO</p>
            <div class="cta-buttons">
                <a href="?page=tournament&action=list" class="btn btn-primary">Voir les Tournois</a>
                <a href="?page=player&action=register" class="btn btn-danger">S'Inscrire</a>
                <a href="?page=player&action=rankings" class="btn btn-primary">Classement</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Features Grid -->
        <h2 class="section-title">🏆 Fonctionnalités Principales</h2>
        <div class="grid grid-3 feature-grid">
            <div class="card">
                <span class="card-icon">🎯</span>
                <h3 class="card-title">Tournois Intelligents</h3>
                <p class="card-subtitle">Gestion complète</p>
                <p>Créez et organisez des tournois avec différents formats : élimination simple/double, round-robin, et pools équilibrées automatiquement.</p>
                <a href="?page=tournament&action=create" class="btn btn-primary mt-2">Créer</a>
            </div>

            <div class="card">
                <span class="card-icon">📊</span>
                <h3 class="card-title">Système ELO Automatique</h3>
                <p class="card-subtitle">Classement en temps réel</p>
                <p>Les ratings ELO des joueurs se mettent à jour automatiquement après chaque match pour un classement juste et équitable.</p>
                <a href="?page=player&action=rankings" class="btn btn-primary mt-2">Voir</a>
            </div>

            <div class="card">
                <span class="card-icon">⚙️</span>
                <h3 class="card-title">Équilibrage Intelligent</h3>
                <p class="card-subtitle">Matchs compétitifs</p>
                <p>L'algorithme d'équilibrage regroupe les joueurs par niveau pour créer des matchs justes, équilibrés et excitants.</p>
                <a href="?page=match&action=list" class="btn btn-primary mt-2">Matchs</a>
            </div>
        </div>

        <div class="decorative-line"></div>

        <!-- Quick Stats -->
        <h2 class="section-title">📈 Statistiques Globales</h2>
        <div class="stats-container">
            <div class="grid grid-3">
                <div class="stat-item">
                    <div class="stat-number">127</div>
                    <div class="stat-label">Joueurs</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">23</div>
                    <div class="stat-label">Tournois</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1,247</div>
                    <div class="stat-label">Matchs Joués</div>
                </div>
            </div>
        </div>

        <div class="decorative-line"></div>

        <!-- Getting Started -->
        <h2 class="section-title">🚀 Démarrer</h2>
        <div class="getting-started">
            <h3>Premiers pas avec ROYPAGE</h3>
            <ol>
                <li><strong>📝 Créez un compte</strong> - Inscrivez-vous en tant que joueur</li>
                <li><strong>🏆 Rejoignez un tournoi</strong> - Cherchez un tournoi et inscrivez-vous</li>
                <li><strong>⚡ Jouez des matchs</strong> - Participez aux matchs de votre pool ou bracket</li>
                <li><strong>📊 Montez au classement</strong> - Vos ratings ELO augmentent avec vos victoires</li>
            </ol>
            <div style="margin-top: 2rem; display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="?page=player&action=register" class="btn btn-primary">S'inscrire maintenant</a>
                <a href="?page=tournament&action=list" class="btn btn-secondary">Voir les tournois</a>
            </div>
        </div>

        <div class="decorative-line"></div>

        <!-- Quick Actions -->
        <h2 class="section-title">⚡ Actions Rapides</h2>
        <div class="grid grid-3">
            <a href="?page=tournament&action=create" class="quick-action-card">
                <p style="font-size: 2.5rem;">🎮</p>
                <strong>Créer un Tournoi</strong>
            </a>
            <a href="?page=player&action=register" class="quick-action-card">
                <p style="font-size: 2.5rem;">👤</p>
                <strong>S'Inscrire</strong>
            </a>
            <a href="?page=player&action=rankings" class="quick-action-card">
                <p style="font-size: 2.5rem;">🏅</p>
                <strong>Classement</strong>
            </a>
        </div>

        <div class="decorative-line"></div>

        <!-- Info Section -->
        <div class="grid grid-2" style="margin-bottom: 3rem;">
            <div class="card">
                <h3 class="card-title">À propos du Système ELO</h3>
                <p>ROYPAGE utilise le système ELO standard (K-factor = 32) pour calculer les ratings des joueurs. Chaque joueur commence à 1200 points (niveau Bronze) et progresse en fonction de ses victoires et défaites.</p>
                <p style="margin-top: 1rem; font-size: 0.9rem;"><strong>Niveaux :</strong> Débutant → Bronze → Argent → Or → Platine → Diamant → Elite</p>
            </div>

            <div class="card">
                <h3 class="card-title">Support & Documentation</h3>
                <p>Besoin d'aide ? Consultez notre documentation complète ou contactez l'équipe support.</p>
                <div style="margin-top: 1.5rem;">
                    <p><strong>📚 Documentation :</strong> <a href="#" style="color: #FF0000;">Voir les guides</a></p>
                    <p><strong>📧 Contact :</strong> <a href="mailto:support@roypage.com" style="color: #FF0000;">support@roypage.com</a></p>
                    <p><strong>🐛 Signaler un bug :</strong> <a href="#" style="color: #FF0000;">GitHub Issues</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 ROYPAGE - Gestionnaire de Tournois Esports</p>
        <p>Développé avec ❤️ pour les compétiteurs</p>
        <div style="margin-top: 1rem; border-top: 1px solid #FFD700; padding-top: 1rem;">
            <p><a href="#" style="color: #FFD700; text-decoration: none; margin: 0 1rem;">Documentation</a> | 
               <a href="#" style="color: #FFD700; text-decoration: none; margin: 0 1rem;">Contact</a> | 
               <a href="#" style="color: #FFD700; text-decoration: none; margin: 0 1rem;">CGU</a></p>
        </div>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>