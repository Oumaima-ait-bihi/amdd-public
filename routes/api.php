<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Specialite;
use App\Http\Controllers\ChatbotController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes pour le chatbot Ollama
Route::prefix('chatbot')->group(function () {
    Route::post('/send', [ChatbotController::class, 'sendMessage']);
    Route::get('/status', [ChatbotController::class, 'checkStatus']);
    Route::get('/history', [ChatbotController::class, 'getHistory']);
});
