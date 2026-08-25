# 📚 ROYPAGE API Documentation

## Endpoints

### Players (Joueurs)

#### Lister tous les joueurs
```
GET /api/players
```

Réponse:
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "username": "player1",
      "elo": 1300,
      "level": "Or",
      "wins": 15,
      "losses": 3
    }
  ]
}
```

#### Obtenir un joueur par ID
```
GET /api/players/{id}
```

#### Créer un joueur
```
POST /api/players
Content-Type: application/json

{
  "username": "newplayer",
  "email": "player@example.com",
  "password": "secure_password"
}
```

#### Mettre à jour un joueur
```
PUT /api/players/{id}
Content-Type: application/json

{
  "first_name": "John",
  "last_name": "Doe"
}
```

---

### Tournaments (Tournois)

#### Lister les tournois
```
GET /api/tournaments?status=in_progress
```

#### Créer un tournoi
```
POST /api/tournaments
Content-Type: application/json

{
  "name": "Championship 2026",
  "description": "Major tournament",
  "tournament_type": "single_elimination",
  "max_players": 32,
  "min_elo": 1000,
  "max_elo": 2000,
  "start_date": "2026-09-01T10:00:00"
}
```

#### Inscrire un joueur
```
POST /api/tournaments/{id}/register
Content-Type: application/json

{
  "player_id": 5
}
```

#### Équilibrer les pools automatiquement
```
POST /api/tournaments/{id}/balance-pools
```

---

### Matches (Matchs)

#### Créer un match
```
POST /api/matches
Content-Type: application/json

{
  "tournament_id": 1,
  "player1_id": 2,
  "player2_id": 5,
  "pool_id": 1
}
```

#### Terminer un match et mettre à jour les ELO
```
POST /api/matches/{id}/finish
Content-Type: application/json

{
  "winner_id": 2,
  "player1_score": 3,
  "player2_score": 1
}
```

#### Lister les matchs d'un tournoi
```
GET /api/tournaments/{id}/matches
```

---

### ELO System

#### Obtenir l'historique ELO d'un joueur
```
GET /api/players/{id}/elo-history
```

#### Recalculer les ELO (Admin)
```
POST /api/admin/recalculate-elo
```

---

## Error Responses

### 400 Bad Request
```json
{
  "success": false,
  "error": "Invalid input",
  "details": "Username is required"
}
```

### 401 Unauthorized
```json
{
  "success": false,
  "error": "Unauthorized",
  "details": "Authentication required"
}
```

### 404 Not Found
```json
{
  "success": false,
  "error": "Not Found",
  "details": "Player not found"
}
```

### 500 Server Error
```json
{
  "success": false,
  "error": "Internal Server Error",
  "details": "Database error"
}
```
