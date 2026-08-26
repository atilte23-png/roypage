<?php
/**
 * ROYPAGE - Tournament Model
 */

class Tournament {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    /**
     * Créer un nouveau tournoi
     */
    public function create($data) {
        $sql = "INSERT INTO tournaments (name, description, tournament_type, status, max_players, min_elo, max_elo, start_date, created_by, created_at, updated_at)
                VALUES (:name, :description, :tournament_type, :status, :max_players, :min_elo, :max_elo, :start_date, :created_by, NOW(), NOW())";

        return Database::execute($sql, [
            ':name' => $data['name'],
            ':description' => $data['description'] ?? '',
            ':tournament_type' => $data['tournament_type'],
            ':status' => 'registration',
            ':max_players' => $data['max_players'],
            ':min_elo' => $data['min_elo'],
            ':max_elo' => $data['max_elo'],
            ':start_date' => $data['start_date'],
            ':created_by' => $data['created_by']
        ]);
    }

    /**
     * Obtenir un tournoi par ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM tournaments WHERE id = :id";
        return Database::fetch($sql, [':id' => $id]);
    }

    /**
     * Obtenir tous les tournois
     */
    public function getAll() {
        $sql = "SELECT * FROM tournaments ORDER BY created_at DESC";
        return Database::fetchAll($sql);
    }

    /**
     * Obtenir les tournois par statut
     */
    public function getByStatus($status) {
        $sql = "SELECT * FROM tournaments WHERE status = :status ORDER BY created_at DESC";
        return Database::fetchAll($sql, [':status' => $status]);
    }

    /**
     * Mettre à jour un tournoi
     */
    public function update($id, $data) {
        $sql = "UPDATE tournaments SET ";
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
     * Supprimer un tournoi
     */
    public function delete($id) {
        $sql = "DELETE FROM tournaments WHERE id = :id";
        return Database::execute($sql, [':id' => $id]);
    }

    /**
     * Compter le nombre de tournois
     */
    public function count() {
        $sql = "SELECT COUNT(*) as count FROM tournaments";
        $result = Database::fetch($sql);
        return $result['count'];
    }

    /**
     * Compter les tournois par statut
     */
    public function countByStatus($status) {
        $sql = "SELECT COUNT(*) as count FROM tournaments WHERE status = :status";
        $result = Database::fetch($sql, [':status' => $status]);
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