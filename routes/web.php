<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\LienController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ParagrapheController;
use App\Http\Controllers\ActualitesController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ValideController;


use App\Http\Controllers\FormationsController;
use App\Http\Controllers\FormulaireController;
use App\Models\Prof;

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



// --------------------------------------------------------------------------
// le site pour les visiteurs
// inscription
// --------------------------------------------------------------------------
Route::get('/', [App\Http\Controllers\WebsiteController::class, 'readfromdatabase'])->name('HOME');
Route::get('/inscription/nouveau', [App\Http\Controllers\WebsiteController::class, 'form_inscription'])->name('FORMULAIRE-INSCRIPTION');
Route::get('/inscription/{id}', [App\Http\Controllers\WebsiteController::class, 'form_inscription_parformation'])->name('FORMULAIRE-INSCRIPTION');
Route::post('/inscription/save', [App\Http\Controllers\WebsiteController::class, 'save_inscription'])->name('SAUVEGARDER-INSCRIPTION');
// message
Route::post('/message', [App\Http\Controllers\WebsiteController::class, 'send_the_message'])->name('SAUVEGARDER-LEMESSAGE');
// --------------------------------------------------------------------------
// dashbord pour les admins
// --------------------------------------------------------------------------
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('DASHBORD');
Route::get('/connexion', [App\Http\Controllers\AdminController::class, 'connecter'])->name('CONNEXION');
Route::get('/compte', [App\Http\Controllers\AdminController::class, 'inscrir'])->name('INSCRIPTION');
//messages
Route::controller(MessageController::class)->group(function () {
    Route::get('/admin/messages','index');
    Route::get('/admin/messages/{id}/show','show');
    Route::delete('/admin/messages/{id}/delete','destroy');
    });
                                        // inscriptions
Route::controller(InscriptionController::class)->group(function () {
    Route::get('/admin/inscriptions','index');
    Route::get('/admin/inscriptions/nouveau','create');
    Route::post('/admin/inscriptions/save','store');
    Route::get('/admin/inscriptions/{id}/edit','edit');
    Route::put('/admin/inscriptions/{id}/update','update');
    Route::delete('/admin/inscriptions/{id}/delete','destroy');
    Route::get('/admin/inscriptions/filtrer','filtrer');
    Route::get('/admin/inscriptions/recherche','recherche')->name('recherche');
    // creer le pdf de la liste des inscriptions
    Route::get('/admin/inscriptions/imprimer','imprimertout');
    // Route::get('/admin/inscriptions/imprimer', [InscriptionController::class, 'imprimer'])->header('Content-Type', 'application/pdf');
    
    
    // les route pour validation :
    Route::get('/admin/inscriptions/{id}/valide','validepage');
    Route::put('/admin/inscriptions/{id}/valideupdate','validesave');

    // les route pour la page voir de session sup_ins_sesion
    Route::delete('/admin/inscriptions/{id}/sup_ins_sesion','sup_ins_sesion');
    Route::get('/admin/inscriptions/{id}/imprime1','imprime1');
    Route::get('/admin/inscriptions/{id}/imprimertout','imprimer_tout');
});


// formations
Route::controller(FormationController::class)->group(function () {
    Route::get('/admin/formations','index');
    Route::get('/admin/formation/nouveau','create');
    Route::post('/admin/formation/save','store');
    Route::get('/admin/formation/{id}/edit','edit');
    Route::put('/admin/formation/{id}/update','update');
    Route::delete('/admin/formation/{id}/delete','destroy');
    });
// --------------------------------------------------------------------------
// ---------                Route pour etudiants                   ----------
// --------------------------------------------------------------------------
Route::controller(EtudiantController::class)->group(function () {
    Route::get('/admin/etudiant','index');
    Route::get('/admin/etudiant/nouveau','create');
    Route::post('/admin/etudiant/save','store');
    Route::get('/admin/etudiant/{id}/edit','edit');
    Route::put('/admin/etudiant/{id}/update','update');
    Route::delete('/admin/etudiant/{id}/delete','destroy');
    });
// --------------------------------------------------------------------------
// ---------                Route pour Profs                   ----------
// --------------------------------------------------------------------------
Route::controller(ProfController::class)->group(function () {
    Route::get('/admin/prof','index');
    Route::get('/admin/prof/ajouter','create');
    Route::post('/admin/prof/save','store');
    Route::get('/admin/prof/{id}/edit','edit');
    Route::put('/admin/prof/{id}/update','update');
    Route::delete('/admin/prof/{id}/delete','destroy');
    });
// --------------------------------------------------------------------------
// ---------                Route pour session                  ----------
// --------------------------------------------------------------------------
Route::controller(SessionController::class)->group(function () {
    Route::get('/admin/session','index');
    Route::get('/admin/session/ajouter','create');
    Route::post('/admin/session/save','store');
    Route::get('/admin/session/{id}/edit','edit');
    Route::put('/admin/session/{id}/update','update');
    Route::delete('/admin/session/{id}/delete','destroy');
    Route::get('/admin/session/{id}/statutatt','statut_enattente');
    Route::get('/admin/session/{id}/statutcour','statut_encours');
    Route::get('/admin/session/{id}/statutterm','statut_termine');

                    // pour session voir 
                    Route::get('/admin/session/voir/{id}','voir');
    });



// gallerie
Route::controller(PhotoController::class)->group(function () {
    Route::get('/admin/gallerie','index');
    Route::get('/admin/gallerie/nouveau','create');
    Route::post('/admin/gallerie/save','store');
    Route::get('/admin/gallerie/{id}/edit','edit');
    Route::put('/admin/gallerie/{id}/update','update');
    Route::delete('/admin/gallerie/{id}/delete','destroy');
    });
// temoignages
Route::controller(TemoignageController::class)->group(function () {
    Route::get('/admin/temoignages','index');
    Route::get('/admin/temoignages/nouveau','create');
    Route::post('/admin/temoignages/save','store');
    Route::get('/admin/temoignages/{id}/edit','edit');
    Route::put('/admin/temoignages/{id}/update','update');
    Route::delete('/admin/temoignages/{id}/delete','destroy');
    });
// banners
Route::controller(BannerController::class)->group(function () {
    Route::get('/admin/banners','index');
    Route::get('/admin/banners/nouveau','create');
    Route::post('/admin/banners/save','store');
    Route::get('/admin/banners/{id}/edit','edit');
    Route::put('/admin/banners/{id}/update','update');
    Route::delete('/admin/banners/{id}/delete','destroy');
    });
// questions
Route::controller(QuestionController::class)->group(function () {
    Route::get('/admin/faq','index');
    Route::get('/admin/faq/nouveau','create');
    Route::post('/admin/faq/save','store');
    Route::get('/admin/faq/{id}/edit','edit');
    Route::put('/admin/faq/{id}/update','update');
    Route::delete('/admin/faq/{id}/delete','destroy');
    });
    // informations
Route::controller(InformationController::class)->group(function () {
    Route::get('/admin/ecole','index');
    Route::get('/admin/ecole/{id}/edit','edit');
    Route::put('/admin/ecole/{id}/update','update');
    });
    // telephones
    Route::controller(TelephoneController::class)->group(function () {
        Route::get('/admin/tel/nouveau','create');
        Route::post('/admin/tel/save','store');
        Route::get('/admin/tel/{id}/edit','edit');
        Route::put('/admin/tel/{id}/update','update');
        Route::delete('/admin/tel/{id}/delete','destroy');
        });

            // liens
    Route::controller(LienController::class)->group(function () {
        // TWITTER
        Route::get('/admin/lien/{id}/Twitter','edittwitter');
        Route::put('/admin/lien/{id}/Twittersave','updatetwitter');
        // FACEBOOK
        Route::get('/admin/lien/{id}/Facebook','editfacebook');
        Route::put('/admin/lien/{id}/Facebooksave','updatefacebook');
        // INSTAGRAM
        Route::get('/admin/lien/{id}/Instagram','editinstagram');
        Route::put('/admin/lien/{id}/Instagramsave','updateinstagram');
        // YOUTUBE
        Route::get('/admin/lien/{id}/Youtube','edityoutube');
        Route::put('/admin/lien/{id}/Youtubesave','updateyoutube');
        // LINKEDIN
        Route::get('/admin/lien/{id}/Linkedin','editlinkedin');
        Route::put('/admin/lien/{id}/Linkedinsave','updatelinkedin');
        // TIKTOK
        Route::get('/admin/lien/{id}/Tiktok','edittiktok');
        Route::put('/admin/lien/{id}/Tiktoksave','updatetiktok');
        });

    // acceuil photo
    Route::controller(AcceuilController::class)->group(function () {
        Route::get('/admin/ecole/acceuil','index');
        Route::get('/admin/ecole/acceuil/{id}/edit','edit');
        Route::put('/admin/ecole/acceuil/{id}/update','update');
        });

    // presentation
    Route::controller(ParagrapheController::class)->group(function () {
        Route::get('/admin/ecole/presentation','index');
        Route::get('/admin/ecole/presentation/nouveau','create');
        Route::post('/admin/ecole/presentation/save','store');
        Route::get('/admin/ecole/presentation/{id}/edit','edit');
        Route::put('/admin/ecole/presentation/{id}/update','update');
        Route::delete('/admin/ecole/presentation/{id}/delete','destroy');
        });


// --------------------------------------------------------------------------
// ---------                Route pour la page Actualites          ----------
// --------------------------------------------------------------------------
Route::get('/actualites', [ActualitesController::class, 'index'])->name('actualites');


Auth::routes();






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/formations', [App\Http\Controllers\FormationsController::class, 'index'])->name('formations');

Route::get('/voirplus/{id}', [App\Http\Controllers\WebsiteController::class, 'voir_formation'])->name('voir_plus_de_la_formation');

// formulaire en pdf 
Route::get('/formulaire', [App\Http\Controllers\FormulaireController::class, 'showformulaire'])->name('showformulaire');
Route::post('/pdf', [App\Http\Controllers\FormulaireController::class, 'pdf'])->name('pdf');