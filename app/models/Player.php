<?php
/**
 * ROYPAGE - Player Model
 */

class Player {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    /**
     * Créer un nouveau joueur
     */
    public function create($data) {
        $sql = "INSERT INTO players (username, email, password, first_name, last_name, elo, level, created_at, updated_at)
                VALUES (:username, :email, :password, :first_name, :last_name, :elo, :level, NOW(), NOW())";

        $level = 'Bronze';
        return Database::execute($sql, [
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':first_name' => $data['first_name'] ?? '',
            ':last_name' => $data['last_name'] ?? '',
            ':elo' => $data['elo'] ?? 1200,
            ':level' => $level
        ]);
    }

    /**
     * Obtenir un joueur par ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM players WHERE id = :id";
        return Database::fetch($sql, [':id' => $id]);
    }

    /**
     * Obtenir tous les joueurs
     */
    public function getAll() {
        $sql = "SELECT * FROM players ORDER BY username ASC";
        return Database::fetchAll($sql);
    }

    /**
     * Obtenir tous les joueurs triés par ELO (rankings)
     */
    public function getAllByElo() {
        $sql = "SELECT * FROM players ORDER BY elo DESC";
        return Database::fetchAll($sql);
    }

    /**
     * Mettre à jour un joueur
     */
    public function update($id, $data) {
        $sql = "UPDATE players SET ";
        $updates = [];
        $params = [':id' => $id];

        foreach ($data as $key => $value) {
            $updates[] = "$key = :$key";
            $params[":$key"] = $value;
        }

        $sql .= implode(", ", $updates) . ", updated_at = NOW() WHERE id = :id";
        return Database::execute($sql, $params);
    }

    /**
     * Mettre à jour l'ELO d'un joueur
     */
    public function updateElo($id, $newElo) {
        $level = $this->getEloLevel($newElo);
        $sql = "UPDATE players SET elo = :elo, level = :level, updated_at = NOW() WHERE id = :id";
        return Database::execute($sql, [
            ':elo' => $newElo,
            ':level' => $level,
            ':id' => $id
        ]);
    }

    /**
     * Obtenir le niveau à partir de l'ELO
     */
    private function getEloLevel($elo) {
        $levelInfo = ELOCalculator::getLevelFromElo($elo);
        return $levelInfo['level'];
    }

    /**
     * Supprimer un joueur
     */
    public function delete($id) {
        $sql = "DELETE FROM players WHERE id = :id";
        return Database::execute($sql, [':id' => $id]);
    }

    /**
     * Compter le nombre de joueurs
     */
    public function count() {
        $sql = "SELECT COUNT(*) as count FROM players";
        $result = Database::fetch($sql);
        return $result['count'];
    }

    /**
     * Obtenir le dernier ID inséré
     */
    public function getLastInsertId() {
        return Database::lastInsertId();
    }
}
?>