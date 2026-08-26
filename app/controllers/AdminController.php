<?php
/**
 * ROYPAGE - Admin Controller
 */

require_once APP_PATH . '/models/Tournament.php';
require_once APP_PATH . '/models/Player.php';

class AdminController {
    private $tournament;
    private $player;

    public function __construct() {
        $this->tournament = new Tournament();
        $this->player = new Player();
    }

    /**
     * Dashboard Admin
     */
    public function index() {
        $stats = [
            'total_players' => $this->player->count(),
            'total_tournaments' => $this->tournament->count(),
            'active_tournaments' => $this->tournament->countByStatus('in_progress')
        ];

        require_once APP_PATH . '/views/admin/dashboard.php';
    }

    /**
     * Gestion des tournois
     */
    public function tournaments() {
        $tournaments = $this->tournament->getAll();
        require_once APP_PATH . '/views/admin/tournaments.php';
    }

    /**
     * Gestion des joueurs
     */
    public function players() {
        $players = $this->player->getAll();
        require_once APP_PATH . '/views/admin/players.php';
    }

    /**
     * Supprimer un tournoi
     */
    public function deleteTournament() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die('ID manquant');
        }

        $this->tournament->delete($id);
        header('Location: ?page=admin&action=tournaments');
    }

    /**
     * Supprimer un joueur
     */
    public function deletePlayer() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die('ID manquant');
        }

        $this->player->delete($id);
        header('Location: ?page=admin&action=players');
    }
}
?>