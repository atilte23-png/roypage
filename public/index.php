<?php
/**
 * ROYPAGE - Gestionnaire de Tournois Esports
 * Point d'entrée de l'application
 */

// Définir le répertoire racine de l'application
define('ROOT_PATH', dirname(dirname(__FILE__)));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Charger la configuration de la base de données
require_once APP_PATH . '/config/database.php';

// Router simple
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : 'index';

switch ($page) {
    case 'tournament':
        require_once APP_PATH . '/controllers/TournamentController.php';
        $controller = new TournamentController();
        $controller->$action();
        break;
    
    case 'player':
        require_once APP_PATH . '/controllers/PlayerController.php';
        $controller = new PlayerController();
        $controller->$action();
        break;
    
    case 'match':
        require_once APP_PATH . '/controllers/MatchController.php';
        $controller = new MatchController();
        $controller->$action();
        break;
    
    case 'admin':
        require_once APP_PATH . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->$action();
        break;
    
    default:
        require_once APP_PATH . '/views/home.php';
}
?>