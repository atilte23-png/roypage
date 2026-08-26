<?php
/**
 * ROYPAGE - Tournament Controller
 */

require_once APP_PATH . '/models/Tournament.php';
require_once APP_PATH . '/models/GameMatch.php';

class TournamentController {
    private $tournament;
    private $gameMatch;

    public function __construct() {
        $this->tournament = new Tournament();
        $this->gameMatch = new GameMatch();
    }

    /**
     * Lister tous les tournois
     */
    public function list() {
        $tournaments = $this->tournament->getAll();
        require_once APP_PATH . '/views/tournament/list.php';
    }

    /**
     * Créer un nouveau tournoi
     */
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'tournament_type' => $_POST['tournament_type'] ?? 'single_elimination',
                'max_players' => $_POST['max_players'] ?? 32,
                'min_elo' => $_POST['min_elo'] ?? 0,
                'max_elo' => $_POST['max_elo'] ?? 3000,
                'start_date' => $_POST['start_date'] ?? '',
                'created_by' => null // Sans créateur (peut être NULL)
            ];

            if ($this->tournament->create($data)) {
                header('Location: ?page=tournament&action=list');
                exit;
            }
        }

        require_once APP_PATH . '/views/tournament/create.php';
    }

    /**
     * Afficher un tournoi
     */
    public function view() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ?page=tournament&action=list');
            exit;
        }

        $tournament = $this->tournament->getById($id);
        if (!$tournament) {
            die('Tournoi non trouvé');
        }

        $matches = $this->gameMatch->getByTournament($id);
        require_once APP_PATH . '/views/tournament/view.php';
    }

    /**
     * Équilibrer les pools automatiquement
     */
    public function balancePools() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die('ID du tournoi manquant');
        }

        // Appeler l'algorithme d'équilibrage
        // TODO: Implémenter la logique
        header('Location: ?page=tournament&action=view&id=' . $id);
    }

    /**
     * Index (par défaut, redirige vers list)
     */
    public function index() {
        $this->list();
    }
}
?>
