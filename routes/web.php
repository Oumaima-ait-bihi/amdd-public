<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdhesionInscriptionController;
use App\Http\Controllers\Frontend\AdhesionController;
use App\Http\Controllers\Frontend\AnnonceController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\MembreController;
use Illuminate\Support\Facades\Auth;
use League\Csv\Query\Row;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('language')->group(function () {
    Route::post('/locale', function () {

        session(['lang' => app('request')->input('locale')]);

        return redirect()->back();
    });
    Route::get('/', 'App\Http\Controllers\Frontend\HomeController@index')->name('frontend.home');
    Route::view('organigramme', 'frontend.organigramme')->name('organigramme');
    //presentation
    Route::get('/presentation', 'App\Http\Controllers\Frontend\PresentationController@index')->name('frontend.presentation');
    //association
    Route::get('/association', 'App\Http\Controllers\Frontend\AssociationController@index')->name('frontend.association');
    //events
    Route::get('/events', 'App\Http\Controllers\Frontend\EventController@index')->name('frontend.events');
    Route::get('/activités', 'App\Http\Controllers\Frontend\ActiviteController@index')->name('frontend.activites');
    Route::get('/events/{id}', 'App\Http\Controllers\Frontend\EventController@details')->name('events.details');
    Route::get('/activité/{id}', 'App\Http\Controllers\Frontend\ActiviteController@details')->name('activites.details');
    //contact
    Route::get('/contact', 'App\Http\Controllers\Frontend\HomeController@contact')->name('frontend.contact');
    Route::post('/contact/contact_mail', 'App\Http\Controllers\ContactController@contact_mail')->name('contact.mail');
    Route::post('/contact', 'App\Http\Controllers\ContactController@store')->name('contact.store');
    //adhesion
    Route::get('/adhesion', [AdhesionController::class, 'index'])->name('frontend.adhesion');
    Route::post('save_pre', [AdhesionInscriptionController::class, 'store'])->name('storeInscription');
    Route::get('/get-specialites/{id}', [AdhesionController::class, 'getSpecialiteByComiteID']);
    Route::post('/adhesion/create', 'App\Http\Controllers\Frontend\AdhesionController@create')->name('adhesion.create');
    Route::view('/inscription', 'frontend.adhesion.adhesionPre')->name('adhesionInscri');
    Route::view('/inscription_formation', 'frontend.adhesion.adhesionFormation')->name('adhesionFormation');
    Route::view('/inscription_paiement', 'frontend.adhesion.adhesionPaiment')->name('adhesionPaiement');
    Route::view('/stage', 'frontend.adhesion.adhesionStage')->name('adhesionStage');
    Route::view('/adhesion_old', 'frontend.adhesion2');
    // Annonces
    Route::get('annonces', [AnnonceController::class, 'index'])->name('frontend.annonces');
    Route::get('annonces/{id}', [AnnonceController::class, 'show'])->name('frontend.show');

    Route::get('/espace-membre', [MembreController::class, 'login'])->name('frontend.espace-membre');
    Route::post('/login-membre', [MembreController::class, 'verifyLogin'])->name('login-membre');
    Route::get('/verify-certificate', [CertificateController::class, 'verify'])->name('certificates.verify');
    
    // Route pour tester le chatbot
    Route::get('/chatbot', function () {
        return view('chatbot');
    })->name('chatbot');
});


require __DIR__.'/auth.php';



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();

// Route::middleware('language')->group(function () {
//     Route::post('/locale', function () {

//         session(['lang' => app('request')->input('locale')]);

//         return redirect()->back();
//     });
//     Route::get('/', 'App\Http\Controllers\Frontend\HomeController@index')->name('frontend.home');
//     Route::view('organigramme', 'frontend.organigramme')->name('organigramme');
//     //presentation
//     Route::get('/presentation', 'App\Http\Controllers\Frontend\PresentationController@index')->name('frontend.presentation');
//     //association
//     Route::get('/association', 'App\Http\Controllers\Frontend\AssociationController@index')->name('frontend.association');
//     //events
//     Route::get('/events', 'App\Http\Controllers\Frontend\EventController@index')->name('frontend.events');
//     Route::get('/activités', 'App\Http\Controllers\Frontend\ActiviteController@index')->name('frontend.activites');
//     Route::get('/events/{id}', 'App\Http\Controllers\Frontend\EventController@details')->name('events.details');
//     Route::get('/activité/{id}', 'App\Http\Controllers\Frontend\ActiviteController@details')->name('activites.details');
//     //contact
//     Route::get('/contact', 'App\Http\Controllers\Frontend\HomeController@contact')->name('frontend.contact');
//     Route::post('/contact/contact_mail', 'App\Http\Controllers\ContactController@contact_mail')->name('contact.mail');
//     Route::post('/contact', 'App\Http\Controllers\ContactController@store')->name('contact.store');
//     //adhesion
//     Route::get('/adhesion', [AdhesionController::class, 'index'])->name('frontend.adhesion');
//     Route::post('save_pre', [AdhesionController::class, 'store'])->name('store');
//     Route::post('save_formation', [AdhesionController::class, 'store_formation'])->name('save_formation');
//     Route::post('paiement', [AdhesionController::class, 'store_paiement'])->name('paiement');
//     Route::post('stage_save', [AdhesionController::class, 'store_stage'])->name('stage_save');
//     Route::get('/get-specialites/{id}', [AdhesionController::class, 'getSpecialiteByComiteID']);
//     Route::post('/adhesion/create', 'App\Http\Controllers\Frontend\AdhesionController@create')->name('adhesion.create');
//     Route::view('/inscription', 'frontend.adhesion.adhesionPre')->name('adhesionInscri');
//     Route::view('/inscription_formation', 'frontend.adhesion.adhesionFormation')->name('adhesionFormation');
//     Route::view('/inscription_paiement', 'frontend.adhesion.adhesionPaiment')->name('adhesionPaiement');
//     Route::view('/stage', 'frontend.adhesion.adhesionStage')->name('adhesionStage');
//     Route::view('/adhesion_old', 'frontend.adhesion2');
//     // Annonces
//     Route::get('annonces', [AnnonceController::class, 'index'])->name('frontend.annonces');
//     Route::get('annonces/{id}', [AnnonceController::class, 'show'])->name('frontend.show');
// });
