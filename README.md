# 🎮 ROYPAGE - Gestionnaire de Tournois Esports

**ROYPAGE** est une plateforme de gestion de tournois esports avec un système de niveaux ELO automatisé et un algorithme d'équilibrage intelligent des matchs pour des pools et brackets équilibrés.

## 📋 Fonctionnalités

- ✅ Gestion de tournois (creation, modification, suppression)
- ✅ Système de classement ELO automatisé
- ✅ Équilibrage intelligent des pools et brackets
- ✅ Gestion des joueurs (profil, niveau, historique)
- ✅ Génération automatique de matchs
- ✅ Tableau des scores en temps réel
- ✅ Admin panel pour la gestion complète
- ✅ Responsive design

## 🛠️ Tech Stack

- **Frontend** : HTML5, CSS3, JavaScript (Vanilla)
- **Backend** : PHP 8+
- **Database** : MySQL/MariaDB
- **Architecture** : MVC

## 🎨 Design

- **Couleur primaire** : Noir (#000000)
- **Titres** : Jaune (#FFD700)
- **Sous-titres & Accents** : Rouge (#FF0000)

## 📁 Structure du Projet

```
roypage/
├── public/
│   ├── index.php
│   ├── css/
│   │   ├── style.css
│   │   └── responsive.css
│   ├── js/
│   │   ├── main.js
│   │   ├── tournament.js
│   │   └── elo.js
│   └── assets/
│       └── images/
├── app/
│   ├── controllers/
│   │   ├── TournamentController.php
│   │   ├── PlayerController.php
│   │   ├── MatchController.php
│   │   └── AdminController.php
│   ├── models/
│   │   ├── Tournament.php
│   │   ├── Player.php
│   │   ├── Match.php
│   │   └── ELOCalculator.php
│   ├── views/
│   │   ├── tournament/
│   │   ├── player/
│   │   ├── admin/
│   │   └── match/
│   └── config/
│       └── database.php
├── database/
│   └── schema.sql
├── docs/
│   └── API.md
└── .gitignore
```

## 🚀 Installation

1. Cloner le repository
2. Créer une base de données MySQL
3. Importer le schema : `database/schema.sql`
4. Configurer `app/config/database.php`
5. Lancer le serveur : `php -S localhost:8000`

## 📖 Documentation

Voir `docs/API.md` pour la documentation complète de l'API.

## 👥 Système ELO

ROYPAGE utilise un système ELO automatisé pour :
- Calculer le classement des joueurs
- Équilibrer automatiquement les pools
- Générer des matchs compétitifs
- Mettre à jour les ratings après chaque match

## 📄 Licence

MIT

---

**ROYPAGE** © 2026 - Gestionnaire de Tournois Esports
