import { Server } from '@modelcontextprotocol/sdk/server/index.js';
import { StdioServerTransport } from '@modelcontextprotocol/sdk/server/stdio.js';
import axios from 'axios';
import express from 'express';
import cors from 'cors';
import dotenv from 'dotenv';

dotenv.config();

// Configuration
const OLLAMA_BASE_URL = process.env.OLLAMA_URL || 'http://localhost:11434';
const AMDD_MODEL = process.env.AMDD_MODEL || 'amdd-chatbot';

// Serveur Express pour l'API REST
const app = express();
app.use(cors());
app.use(express.json());

// Serveur MCP
const server = new Server(
  {
    name: 'amdd-ollama-server',
    version: '1.0.0',
  },
  {
    capabilities: {
      tools: {},
    },
  }
);

// Outil MCP pour communiquer avec Ollama
server.setRequestHandler('tools/call', async (request) => {
  const { name, arguments: args } = request.params;
  
  try {
    switch (name) {
      case 'send_message':
        return await sendMessageToOllama(args.message);
      
      case 'get_models':
        return await getAvailableModels();
      
      case 'check_status':
        return await checkOllamaStatus();
      
      default:
        throw new Error(`Outil non reconnu: ${name}`);
    }
  } catch (error) {
    console.error('Erreur MCP:', error);
    return {
      content: [
        {
          type: 'text',
          text: `Erreur: ${error.message}`
        }
      ]
    };
  }
});

// Fonction pour envoyer un message à Ollama
async function sendMessageToOllama(message) {
  try {
    const response = await axios.post(`${OLLAMA_BASE_URL}/api/generate`, {
      model: AMDD_MODEL,
      prompt: message,
      stream: false,
      options: {
        num_predict: 150,
        temperature: 0.7,
        top_p: 0.9,
        top_k: 40
      }
    }, {
      timeout: 10000 // 2 minutes
    });

    return {
      content: [
        {
          type: 'text',
          text: response.data.response
        }
      ]
    };
  } catch (error) {
    console.error('Erreur Ollama:', error);
    throw new Error(`Erreur de communication avec Ollama: ${error.message}`);
  }
}

// Fonction pour obtenir les modèles disponibles
async function getAvailableModels() {
  try {
    const response = await axios.get(`${OLLAMA_BASE_URL}/api/tags`);
    return {
      content: [
        {
          type: 'text',
          text: JSON.stringify(response.data, null, 2)
        }
      ]
    };
  } catch (error) {
    throw new Error(`Erreur lors de la récupération des modèles: ${error.message}`);
  }
}

// Fonction pour vérifier le statut d'Ollama
async function checkOllamaStatus() {
  try {
    const response = await axios.get(`${OLLAMA_BASE_URL}/api/tags`);
    return {
      content: [
        {
          type: 'text',
          text: JSON.stringify({
            available: true,
            models: response.data.models,
            current_model: AMDD_MODEL
          }, null, 2)
        }
      ]
    };
  } catch (error) {
    return {
      content: [
        {
          type: 'text',
          text: JSON.stringify({
            available: false,
            error: error.message
          }, null, 2)
        }
      ]
    };
  }
}

// API REST pour Laravel
app.post('/api/chatbot/send', async (req, res) => {
  try {
    const { message } = req.body;
    
    if (!message) {
      return res.status(400).json({
        success: false,
        error: 'Message requis'
      });
    }

    const result = await sendMessageToOllama(message);
    
    res.json({
      success: true,
      response: result.content[0].text,
      model: AMDD_MODEL
    });
  } catch (error) {
    console.error('Erreur API:', error);
    res.status(500).json({
      success: false,
      error: error.message
    });
  }
});

app.get('/api/chatbot/status', async (req, res) => {
  try {
    const result = await checkOllamaStatus();
    const status = JSON.parse(result.content[0].text);
    res.json(status);
  } catch (error) {
    res.status(500).json({
      available: false,
      error: error.message
    });
  }
});

// Démarrage des serveurs
const PORT = process.env.PORT || 3001;

// Serveur Express
app.listen(PORT, () => {
  console.log(`🚀 Serveur MCP AMDD démarré sur le port ${PORT}`);
  console.log(`📡 API REST disponible sur http://localhost:${PORT}`);
  console.log(`🤖 Modèle Ollama: ${AMDD_MODEL}`);
});

// Serveur MCP (stdio)
const transport = new StdioServerTransport();
server.connect(transport);

console.log('🔌 Serveur MCP connecté via stdio'); 