<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OllamaService
{
    private $baseUrl = 'http://localhost:11434';
    private $model = 'amdd-chatbot'; // Modèle personnalisé pour l'AMDD

    /**
     * Envoyer un message au modèle Ollama
     */
    public function sendMessage(string $message): array
    {
        try {
            $response = Http::timeout(120)->post($this->baseUrl . '/api/generate', [
                'model' => $this->model,
                'prompt' => $message,
                'stream' => false,
                'options' => [
                    'num_predict' => 100, // Limiter la longueur de la réponse
                    'temperature' => 0.7, // Réduire la température pour des réponses plus cohérentes
                    'top_p' => 0.9,
                    'top_k' => 40
                ]
            ]);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'response' => $response->json('response'),
                    'model' => $this->model
                ];
            }

            return [
                'success' => false,
                'error' => 'Erreur de communication avec Ollama',
                'status' => $response->status()
            ];

        } catch (\Exception $e) {
            Log::error('Erreur Ollama: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => 'Impossible de contacter le service Ollama. Vérifiez que Ollama est en cours d\'exécution.',
                'details' => $e->getMessage()
            ];
        }
    }

    /**
     * Vérifier si Ollama est disponible
     */
    public function isAvailable(): bool
    {
        try {
            $response = Http::timeout(10)->get($this->baseUrl . '/api/tags');
            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Obtenir la liste des modèles disponibles
     */
    public function getAvailableModels(): array
    {
        try {
            $response = Http::timeout(10)->get($this->baseUrl . '/api/tags');
            
            if ($response->successful()) {
                return $response->json('models', []);
            }
            
            return [];
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des modèles: ' . $e->getMessage());
            return [];
        }
    }
} 