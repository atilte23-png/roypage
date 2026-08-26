<?php
/**
 * ROYPAGE - Match Model
 */

class Match {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    /**
     * Créer un nouveau match
     */
    public function create($data) {
        $sql = "INSERT INTO matches (tournament_id, pool_id, player1_id, player2_id, status, scheduled_at, created_at, updated_at)
                VALUES (:tournament_id, :pool_id, :player1_id, :player2_id, :status, :scheduled_at, NOW(), NOW())";

        return Database::execute($sql, [
            ':tournament_id' => $data['tournament_id'],
            ':pool_id' => $data['pool_id'],
            ':player1_id' => $data['player1_id'],
            ':player2_id' => $data['player2_id'],
            ':status' => 'pending',
            ':scheduled_at' => $data['scheduled_at']
        ]);
    }

    /**
     * Obtenir un match par ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM matches WHERE id = :id";
        return Database::fetch($sql, [':id' => $id]);
    }

    /**
     * Obtenir tous les matchs
     */
    public function getAll() {
        $sql = "SELECT * FROM matches ORDER BY created_at DESC";
        return Database::fetchAll($sql);
    }

    /**
     * Obtenir les matchs d'un tournoi
     */
    public function getByTournament($tournamentId) {
        $sql = "SELECT * FROM matches WHERE tournament_id = :tournament_id ORDER BY created_at DESC";
        return Database::fetchAll($sql, [':tournament_id' => $tournamentId]);
    }

    /**
     * Obtenir les matchs d'une pool
     */
    public function getByPool($poolId) {
        $sql = "SELECT * FROM matches WHERE pool_id = :pool_id ORDER BY created_at DESC";
        return Database::fetchAll($sql, [':pool_id' => $poolId]);
    }

    /**
     * Terminer un match et mettre à jour les scores
     */
    public function finish($id, $winner_id, $player1_score, $player2_score, $player1_elo_change, $player2_elo_change) {
        $sql = "UPDATE matches 
                SET winner_id = :winner_id, 
                    player1_score = :player1_score, 
                    player2_score = :player2_score,
                    player1_elo_change = :player1_elo_change,
                    player2_elo_change = :player2_elo_change,
                    status = 'finished', 
                    finished_at = NOW(),
                    updated_at = NOW() 
                WHERE id = :id";

        return Database::execute($sql, [
            ':id' => $id,
            ':winner_id' => $winner_id,
            ':player1_score' => $player1_score,
            ':player2_score' => $player2_score,
            ':player1_elo_change' => $player1_elo_change,
            ':player2_elo_change' => $player2_elo_change
        ]);
    }

    /**
     * Supprimer un match
     */
    public function delete($id) {
        $sql = "DELETE FROM matches WHERE id = :id";
        return Database::execute($sql, [':id' => $id]);
    }
}
?>