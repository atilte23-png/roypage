<?php
/**
 * ROYPAGE - Player Controller
 */

require_once APP_PATH . '/models/Player.php';
require_once APP_PATH . '/models/ELOCalculator.php';

class PlayerController {
    private $player;

    public function __construct() {
        $this->player = new Player();
    }

    /**
     * Lister tous les joueurs
     */
    public function list() {
        $players = $this->player->getAll();
        require_once APP_PATH . '/views/player/list.php';
    }

    /**
     * Afficher les rankings (par ELO)
     */
    public function rankings() {
        $players = $this->player->getAllByElo();
        require_once APP_PATH . '/views/player/rankings.php';
    }

    /**
     * Enregistrer un nouveau joueur
     */
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'username' => $_POST['username'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT),
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'elo' => 1200
            ];

            if ($this->player->create($data)) {
                header('Location: ?page=player&action=view&id=' . $this->player->getLastInsertId());
                exit;
            }
        }

        require_once APP_PATH . '/views/player/register.php';
    }

    /**
     * Afficher le profil d'un joueur
     */
    public function view() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ?page=player&action=list');
            exit;
        }

        $player = $this->player->getById($id);
        if (!$player) {
            die('Joueur non trouvé');
        }

        require_once APP_PATH . '/views/player/view.php';
    }

    /**
     * Éditer le profil d'un joueur
     */
    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ?page=player&action=list');
            exit;
        }

        $player = $this->player->getById($id);
        if (!$player) {
            die('Joueur non trouvé');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'bio' => $_POST['bio'] ?? ''
            ];

            $this->player->update($id, $data);
            header('Location: ?page=player&action=view&id=' . $id);
            exit;
        }

        require_once APP_PATH . '/views/player/edit.php';
    }

    /**
     * Index (par défaut, redirige vers rankings)
     */
    public function index() {
        $this->rankings();
    }
}
?>