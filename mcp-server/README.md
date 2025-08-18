# Serveur MCP AMDD

## Architecture MCP (Model Context Protocol)

```
Frontend (JavaScript) 
    ↓ (fetch API)
Laravel API (/api/chatbot/*)
    ↓ (HTTP client)
Serveur MCP (Node.js)
    ↓ (HTTP client)
Ollama API (localhost:11434)
    ↓
Modèle amdd-chatbot personnalisé
```

## Avantages de MCP

### ✅ **Standardisation**
- Protocole ouvert et interopérable
- Compatible avec différents modèles d'IA
- API REST standardisée

### ✅ **Sécurité**
- Contrôle granulaire des permissions
- Validation des requêtes
- Gestion des erreurs centralisée

### ✅ **Performance**
- Communication optimisée
- Fallback automatique vers Ollama direct
- Timeout configurable

### ✅ **Extensibilité**
- Facile d'ajouter de nouveaux outils
- Support multi-modèles
- Architecture modulaire

## Installation

### 1. Prérequis
```bash
# Node.js 18+
node --version

# Ollama installé et en cours d'exécution
ollama serve
```

### 2. Installation des dépendances
```bash
cd mcp-server
npm install
```

### 3. Configuration
Créer un fichier `.env` :
```env
PORT=3001
OLLAMA_URL=http://localhost:11434
AMDD_MODEL=amdd-chatbot
NODE_ENV=development
```

### 4. Démarrage
```bash
# Script automatique
chmod +x start.sh
./start.sh

# Ou manuellement
npm start
```

## API Endpoints

### POST `/api/chatbot/send`
Envoie un message au modèle IA.

**Request:**
```json
{
  "message": "Qu'est-ce que l'AMDD ?"
}
```

**Response:**
```json
{
  "success": true,
  "response": "L'AMDD est l'Association Marocaine pour le Développement Durable...",
  "model": "amdd-chatbot",
  "protocol": "MCP"
}
```

### GET `/api/chatbot/status`
Vérifie le statut des services.

**Response:**
```json
{
  "available": true,
  "models": [...],
  "current_model": "amdd-chatbot",
  "protocol": "MCP with Fallback",
  "mcp_server_url": "http://localhost:3001",
  "ollama_url": "http://localhost:11434"
}
```

## Fallback System

Le système utilise un mécanisme de fallback intelligent :

1. **Tentative MCP** : Appel au serveur MCP
2. **Fallback Ollama** : Si MCP échoue, appel direct à Ollama
3. **Erreur finale** : Message d'erreur informatif

## Monitoring

### Logs
```bash
# Logs du serveur MCP
tail -f mcp-server/logs/server.log

# Logs Laravel
tail -f storage/logs/laravel.log
```

### Statut des services
```bash
# Vérifier Ollama
curl http://localhost:11434/api/tags

# Vérifier MCP
curl http://localhost:3001/api/chatbot/status
```

## Développement

### Structure des fichiers
```
mcp-server/
├── server.js          # Serveur MCP principal
├── package.json       # Dépendances Node.js
├── .env              # Configuration
├── start.sh          # Script de démarrage
└── README.md         # Documentation
```

### Variables d'environnement
- `PORT` : Port du serveur MCP (défaut: 3001)
- `OLLAMA_URL` : URL d'Ollama (défaut: http://localhost:11434)
- `AMDD_MODEL` : Nom du modèle (défaut: amdd-chatbot)
- `NODE_ENV` : Environnement (development/production)

## Troubleshooting

### Problème : Timeout
```bash
# Augmenter le timeout dans server.js
timeout: 300000 // 5 minutes
```

### Problème : Modèle non trouvé
```bash
# Vérifier les modèles disponibles
ollama list

# Recréer le modèle si nécessaire
ollama create amdd-chatbot -f backend/Modelfile
```

### Problème : CORS
```bash
# Vérifier la configuration CORS dans server.js
app.use(cors({
  origin: 'http://localhost:8000'
}));
```

## Sécurité

- ✅ Validation des entrées
- ✅ Gestion des erreurs
- ✅ Timeout configurable
- ✅ Logs d'audit
- ✅ Fallback sécurisé 