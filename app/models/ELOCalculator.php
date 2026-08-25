<?php
/**
 * ROYPAGE - Calculateur ELO
 * Gère le calcul automatique des ratings ELO
 */

class ELOCalculator {
    const K_FACTOR = 32; // Facteur K standard
    const INITIAL_ELO = 1200; // Rating initial

    /**
     * Calculer le nouveau rating ELO après un match
     * 
     * @param float $playerElo Rating du joueur
     * @param float $opponentElo Rating de l'adversaire
     * @param int $result Résultat (1 = victoire, 0 = défaite, 0.5 = nul)
     * @return float Nouveau rating
     */
    public static function calculateNewElo($playerElo, $opponentElo, $result) {
        $expectedScore = self::getExpectedScore($playerElo, $opponentElo);
        $newElo = $playerElo + self::K_FACTOR * ($result - $expectedScore);
        
        return round($newElo, 1);
    }

    /**
     * Calculer le score attendu
     * 
     * @param float $playerElo Rating du joueur
     * @param float $opponentElo Rating de l'adversaire
     * @return float Score attendu (0 à 1)
     */
    public static function getExpectedScore($playerElo, $opponentElo) {
        $diff = $opponentElo - $playerElo;
        $expectedScore = 1 / (1 + pow(10, $diff / 400));
        
        return round($expectedScore, 4);
    }

    /**
     * Obtenir le niveau basé sur le rating ELO
     * 
     * @param float $elo Rating ELO
     * @return array ['level' => string, 'color' => string]
     */
    public static function getLevelFromElo($elo) {
        if ($elo < 800) {
            return ['level' => 'Débutant', 'color' => '#808080'];
        } elseif ($elo < 1000) {
            return ['level' => 'Bronze', 'color' => '#CD7F32'];
        } elseif ($elo < 1200) {
            return ['level' => 'Argent', 'color' => '#C0C0C0'];
        } elseif ($elo < 1400) {
            return ['level' => 'Or', 'color' => '#FFD700'];
        } elseif ($elo < 1600) {
            return ['level' => 'Platine', 'color' => '#E5E4E2'];
        } elseif ($elo < 1800) {
            return ['level' => 'Diamant', 'color' => '#B9F2FF'];
        } else {
            return ['level' => 'Élite', 'color' => '#FF0000'];
        }
    }

    /**
     * Calculer les gains/pertes d'ELO
     * 
     * @param float $playerElo Rating du joueur
     * @param float $opponentElo Rating de l'adversaire
     * @param int $result Résultat (1 = victoire, 0 = défaite, 0.5 = nul)
     * @return int Gain/perte d'ELO
     */
    public static function calculateEloChange($playerElo, $opponentElo, $result) {
        $expectedScore = self::getExpectedScore($playerElo, $opponentElo);
        $eloChange = self::K_FACTOR * ($result - $expectedScore);
        
        return round($eloChange);
    }
}
?>