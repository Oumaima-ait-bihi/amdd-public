<?php

namespace App\Http\Controllers;

use App\Services\MCPClientService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatbotController extends Controller
{
    protected $mcpService;

    public function __construct(MCPClientService $mcpService)
    {
        $this->mcpService = $mcpService;
    }

    /**
     * Envoyer un message au chatbot
     */
    public function sendMessage(Request $request): JsonResponse
    {
        // Augmenter le timeout PHP pour cette requête
        set_time_limit(300); // 5 minutes
        
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $message = $request->input('message');
        $result = $this->mcpService->sendMessage($message);

        return response()->json($result);
    }

    /**
     * Vérifier si le service Ollama est disponible
     */
    public function checkStatus(): JsonResponse
    {
        $status = $this->mcpService->checkStatus();
        $serverInfo = $this->mcpService->getServerInfo();

        return response()->json(array_merge($status, $serverInfo));
    }

    /**
     * Obtenir l'historique des conversations (optionnel)
     */
    public function getHistory(): JsonResponse
    {
        // Ici tu peux implémenter la logique pour récupérer l'historique
        // depuis la base de données si tu veux sauvegarder les conversations
        
        return response()->json([
            'history' => [],
            'message' => 'Historique non implémenté pour le moment'
        ]);
    }
}
