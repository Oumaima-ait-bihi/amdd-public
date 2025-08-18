<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MCPClientService
{
    private $mcpServerUrl;
    private $ollamaUrl;
    private $model;

    public function __construct()
    {
        $this->mcpServerUrl = env('MCP_SERVER_URL', 'http://localhost:3001');
        $this->ollamaUrl = env('OLLAMA_URL', 'http://localhost:11434');
        $this->model = env('AMDD_MODEL', 'amdd-chatbot');
    }

    /**
     * Envoyer un message via MCP
     */
    public function sendMessage(string $message): array
    {
        try {
            // Appel direct au serveur MCP
            $response = Http::timeout(120)->post($this->mcpServerUrl . '/api/chatbot/send', [
                'message' => $message
            ]);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'response' => $response->json('response'),
                    'model' => $this->model,
                    'protocol' => 'MCP'
                ];
            }

            return [
                'success' => false,
                'error' => 'Erreur de communication avec le serveur MCP',
                'status' => $response->status()
            ];

        } catch (\Exception $e) {
            Log::error('Erreur MCP: ' . $e->getMessage());
            
            // Fallback vers Ollama direct si MCP échoue
            return $this->fallbackToOllama($message);
        }
    }

    /**
     * Fallback vers Ollama direct
     */
    private function fallbackToOllama(string $message): array
    {
        try {
            $response = Http::timeout(120)->post($this->ollamaUrl . '/api/generate', [
                'model' => $this->model,
                'prompt' => $message,
                'stream' => false,
                'options' => [
                    'num_predict' => 150,
                    'temperature' => 0.7,
                    'top_p' => 0.9,
                    'top_k' => 40
                ]
            ]);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'response' => $response->json('response'),
                    'model' => $this->model,
                    'protocol' => 'Ollama Direct (Fallback)'
                ];
            }

            return [
                'success' => false,
                'error' => 'Erreur de communication avec Ollama',
                'status' => $response->status()
            ];

        } catch (\Exception $e) {
            Log::error('Erreur Ollama fallback: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => 'Impossible de contacter les services IA. Vérifiez que Ollama est en cours d\'exécution.',
                'details' => $e->getMessage()
            ];
        }
    }

    /**
     * Vérifier le statut via MCP
     */
    public function checkStatus(): array
    {
        try {
            $response = Http::timeout(10)->get($this->mcpServerUrl . '/api/chatbot/status');
            
            if ($response->successful()) {
                return $response->json();
            }
            
            return [
                'available' => false,
                'error' => 'Serveur MCP non disponible'
            ];
        } catch (\Exception $e) {
            Log::error('Erreur statut MCP: ' . $e->getMessage());
            
            // Fallback vers Ollama direct
            return $this->checkOllamaStatus();
        }
    }

    /**
     * Vérifier le statut Ollama directement
     */
    private function checkOllamaStatus(): array
    {
        try {
            $response = Http::timeout(10)->get($this->ollamaUrl . '/api/tags');
            
            if ($response->successful()) {
                return [
                    'available' => true,
                    'models' => $response->json('models', []),
                    'current_model' => $this->model,
                    'protocol' => 'Ollama Direct'
                ];
            }
            
            return [
                'available' => false,
                'error' => 'Ollama non disponible'
            ];
        } catch (\Exception $e) {
            return [
                'available' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Obtenir les informations du serveur MCP
     */
    public function getServerInfo(): array
    {
        return [
            'mcp_server_url' => $this->mcpServerUrl,
            'ollama_url' => $this->ollamaUrl,
            'model' => $this->model,
            'protocol' => 'MCP with Fallback'
        ];
    }
} 