<?php
/**
 * ROYPAGE - Match Controller
 */

require_once APP_PATH . '/models/GameMatch.php';
require_once APP_PATH . '/models/Player.php';
require_once APP_PATH . '/models/ELOCalculator.php';

class MatchController {
    private $gameMatch;
    private $player;

    public function __construct() {
        $this->gameMatch = new GameMatch();
        $this->player = new Player();
    }

    /**
     * Créer un nouveau match
     */
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'tournament_id' => $_POST['tournament_id'] ?? '',
                'pool_id' => $_POST['pool_id'] ?? null,
                'player1_id' => $_POST['player1_id'] ?? '',
                'player2_id' => $_POST['player2_id'] ?? '',
                'scheduled_at' => $_POST['scheduled_at'] ?? null
            ];

            if ($this->gameMatch->create($data)) {
                header('Location: ?page=match&action=list');
                exit;
            }
        }

        require_once APP_PATH . '/views/match/create.php';
    }

    /**
     * Lister tous les matchs
     */
    public function list() {
        $matches = $this->gameMatch->getAll();
        require_once APP_PATH . '/views/match/list.php';
    }

    /**
     * Terminer un match et mettre à jour les ELO
     */
    public function finish() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die('ID du match manquant');
        }

        $match = $this->gameMatch->getById($id);
        if (!$match) {
            die('Match non trouvé');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $winner_id = $_POST['winner_id'] ?? null;
            $player1_score = $_POST['player1_score'] ?? 0;
            $player2_score = $_POST['player2_score'] ?? 0;

            // Récupérer les ELO actuels
            $player1 = $this->player->getById($match['player1_id']);
            $player2 = $this->player->getById($match['player2_id']);

            // Déterminer le résultat
            $result = ($winner_id == $match['player1_id']) ? 1 : 0;

            // Calculer les nouveaux ELO
            $p1_new_elo = ELOCalculator::calculateNewElo(
                $player1['elo'],
                $player2['elo'],
                $result
            );

            $p2_new_elo = ELOCalculator::calculateNewElo(
                $player2['elo'],
                $player1['elo'],
                1 - $result
            );

            $p1_change = $p1_new_elo - $player1['elo'];
            $p2_change = $p2_new_elo - $player2['elo'];

            // Mettre à jour le match
            $this->gameMatch->finish(
                $id,
                $winner_id,
                $player1_score,
                $player2_score,
                $p1_change,
                $p2_change
            );

            // Mettre à jour les ELO des joueurs
            $this->player->updateElo($match['player1_id'], $p1_new_elo);
            $this->player->updateElo($match['player2_id'], $p2_new_elo);

            header('Location: ?page=match&action=view&id=' . $id);
            exit;
        }

        require_once APP_PATH . '/views/match/finish.php';
    }

    /**
     * Afficher un match
     */
    public function view() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ?page=match&action=list');
            exit;
        }

        $match = $this->gameMatch->getById($id);
        if (!$match) {
            die('Match non trouvé');
        }

        require_once APP_PATH . '/views/match/view.php';
    }

    /**
     * Index (par défaut, redirige vers list)
     */
    public function index() {
        $this->list();
    }
}
?>
