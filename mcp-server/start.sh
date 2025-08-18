#!/bin/bash

# Script de démarrage du serveur MCP AMDD

echo "🚀 Démarrage du serveur MCP AMDD..."

# Vérifier si Node.js est installé
if ! command -v node &> /dev/null; then
    echo "❌ Node.js n'est pas installé. Veuillez l'installer d'abord."
    exit 1
fi

# Vérifier si les dépendances sont installées
if [ ! -d "node_modules" ]; then
    echo "📦 Installation des dépendances..."
    npm install
fi

# Vérifier si Ollama est en cours d'exécution
echo "🔍 Vérification d'Ollama..."
if ! curl -s http://localhost:11434/api/tags > /dev/null; then
    echo "⚠️  Ollama ne semble pas être en cours d'exécution."
    echo "   Démarrez Ollama avec: ollama serve"
    echo "   Puis relancez ce script."
    exit 1
fi

echo "✅ Ollama est disponible"

# Démarrer le serveur MCP
echo "🔌 Démarrage du serveur MCP..."
node server.js 