-- ROYPAGE - Schéma de Base de Données
-- MySQL/MariaDB

CREATE DATABASE IF NOT EXISTS roypage;
USE roypage;

-- Table des utilisateurs/joueurs
CREATE TABLE IF NOT EXISTS players (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    elo INT DEFAULT 1200,
    level VARCHAR(50),
    avatar_url VARCHAR(255),
    bio TEXT,
    wins INT DEFAULT 0,
    losses INT DEFAULT 0,
    draws INT DEFAULT 0,
    is_admin BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX (elo),
    INDEX (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des tournois
CREATE TABLE IF NOT EXISTS tournaments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    tournament_type ENUM('single_elimination', 'double_elimination', 'round_robin', 'pools') DEFAULT 'single_elimination',
    status ENUM('draft', 'registration', 'in_progress', 'finished', 'cancelled') DEFAULT 'draft',
    max_players INT,
    min_elo INT,
    max_elo INT,
    start_date DATETIME,
    end_date DATETIME,
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES players(id),
    INDEX (status),
    INDEX (tournament_type),
    INDEX (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des inscriptions au tournoi
CREATE TABLE IF NOT EXISTS tournament_registrations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tournament_id INT NOT NULL,
    player_id INT NOT NULL,
    elo_at_registration INT,
    seed_position INT,
    pool_id INT,
    status ENUM('registered', 'checked_in', 'withdrawn', 'eliminated') DEFAULT 'registered',
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tournament_id) REFERENCES tournaments(id),
    FOREIGN KEY (player_id) REFERENCES players(id),
    UNIQUE KEY unique_registration (tournament_id, player_id),
    INDEX (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des pools
CREATE TABLE IF NOT EXISTS pools (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tournament_id INT NOT NULL,
    pool_name VARCHAR(100),
    pool_number INT,
    status ENUM('pending', 'active', 'finished') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tournament_id) REFERENCES tournaments(id),
    INDEX (tournament_id),
    INDEX (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des matchs
CREATE TABLE IF NOT EXISTS matches (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tournament_id INT NOT NULL,
    pool_id INT,
    player1_id INT NOT NULL,
    player2_id INT NOT NULL,
    winner_id INT,
    player1_score INT,
    player2_score INT,
    player1_elo_change INT,
    player2_elo_change INT,
    status ENUM('pending', 'in_progress', 'finished', 'cancelled') DEFAULT 'pending',
    scheduled_at DATETIME,
    started_at DATETIME,
    finished_at DATETIME,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tournament_id) REFERENCES tournaments(id),
    FOREIGN KEY (pool_id) REFERENCES pools(id),
    FOREIGN KEY (player1_id) REFERENCES players(id),
    FOREIGN KEY (player2_id) REFERENCES players(id),
    FOREIGN KEY (winner_id) REFERENCES players(id),
    INDEX (tournament_id),
    INDEX (status),
    INDEX (pool_id),
    INDEX (finished_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des brackets (pour les single/double elimination)
CREATE TABLE IF NOT EXISTS brackets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tournament_id INT NOT NULL,
    round_number INT,
    bracket_position INT,
    match_id INT,
    parent_bracket_id INT,
    winner_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tournament_id) REFERENCES tournaments(id),
    FOREIGN KEY (match_id) REFERENCES matches(id),
    FOREIGN KEY (parent_bracket_id) REFERENCES brackets(id),
    INDEX (tournament_id),
    INDEX (round_number)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table de l'historique ELO
CREATE TABLE IF NOT EXISTS elo_history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL,
    match_id INT,
    elo_before INT,
    elo_after INT,
    elo_change INT,
    opponent_id INT,
    result ENUM('win', 'loss', 'draw') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (player_id) REFERENCES players(id),
    FOREIGN KEY (match_id) REFERENCES matches(id),
    FOREIGN KEY (opponent_id) REFERENCES players(id),
    INDEX (player_id),
    INDEX (created_at),
    INDEX (match_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index de performance
CREATE INDEX idx_tournament_status ON tournaments(status, created_at);
CREATE INDEX idx_player_elo ON players(elo DESC);
CREATE INDEX idx_match_finished ON matches(tournament_id, status, finished_at);
