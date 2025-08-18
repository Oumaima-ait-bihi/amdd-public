<?php
/**
 * -----------------------------------------------------------------
 * NOTE: There are two routes with the names (user & group),
 * any changes to these two route names may cause issues if not modified
 * in all places that use them (e.g., Chatify class, Controllers,
 * chatify JavaScript file, etc.).
 * -----------------------------------------------------------------
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chatify\MessagesController;  // Correct import for MessagesController

/*
* This is the main app route [Chatify Messenger]
*/
Route::middleware(['language', 'auth', 'verified'])->group(function () {
Route::get('/', [MessagesController::class, 'index'])->name(config('chatify.routes.prefix'));

/**
 * Fetch info for a specific id [user/group]
 */
Route::post('/idInfo', [MessagesController::class, 'idFetchData']);

/**
 * Send message route
 */
Route::post('/sendMessage', [MessagesController::class, 'send'])->name('send.message');

/**
 * Fetch messages
 */
Route::post('/fetchMessages', [MessagesController::class, 'fetch'])->name('fetch.messages');

/**
 * Download attachments route to create downloadable links
 */
Route::get('/download/{fileName}', [MessagesController::class, 'download'])->name(config('chatify.attachments.download_route_name'));

/**
 * Authentication for pusher private channels
 */
Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('pusher.auth');

/**
 * Make messages as seen
 */
Route::post('/makeSeen', [MessagesController::class, 'seen'])->name('messages.seen');

/**
 * Get contacts
 */
Route::get('/getContacts', [MessagesController::class, 'getContacts'])->name('contacts.get');

/**
 * Update contact item data
 */
Route::post('/updateContacts', [MessagesController::class, 'updateContactItem'])->name('contacts.update');

/**
 * Star in the favorite list
 */
Route::post('/star', [MessagesController::class, 'favorite'])->name('star');

/**
 * Get favorites list
 */
Route::post('/favorites', [MessagesController::class, 'getFavorites'])->name('favorites');

/**
 * Search in messenger
 */
Route::get('/search', [MessagesController::class, 'search'])->name('search');

/**
 * Get shared photos
 */
Route::post('/shared', [MessagesController::class, 'sharedPhotos'])->name('shared');

/**
 * Delete Conversation
 */
Route::post('/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('conversation.delete');

/**
 * Delete Message
 */
Route::post('/deleteMessage', [MessagesController::class, 'deleteMessage'])->name('message.delete');

/**
 * Update setting
 */
Route::post('/updateSettings', [MessagesController::class, 'updateSettings'])->name('avatar.update');

/**
 * Set active status
 */
Route::post('/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('activeStatus.set');

/*
* [Group] view by id
*/
Route::get('/group/{id}', [MessagesController::class, 'index'])->name('group');

/*
* User view by id.
* Note: If you added routes after the [User] one below,
* it will be considered as a user id.
*/
Route::get('/{id}', [MessagesController::class, 'index'])->name('user');
});
