<?php

use App\Http\Controllers\AbscenceController;
use App\Http\Controllers\Agentcontroller;
use App\Http\Controllers\clent_controller;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Contratscontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EquipementsController;
use App\Http\Controllers\FichedepaieController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitesController;
use App\Models\Fichedepaie;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();



Route::group(['middleware' => 'auth'], function () {
    Route::get('/GRH', function () {
        return redirect('dashboard');
    });
    Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send-email');

    Route::get('/stock', function () {
        return view('clientview');
    });
    Route::get('/markAllRead', [NotificationController::class, 'markAllRead'])->name('markAllRead');
    Route::post('/commande/{id}/incrementer', [CommandeController::class, 'increment'])->name('commande.incrementer');
    Route::post('/storage', [EquipementsController::class, 'storage'])->name('storage');
    Route::post('/validecommande', [CommandeController::class, 'validecommande'])->name('validecommande');
    Route::get('/historique', [CommandeController::class, 'historique'])->name('historique');
    Route::resource('/commande', CommandeController::class);
    Route::resource('/equipement', EquipementsController::class);
    Route::resource('/fournisseur', FournisseurController::class);
    Route::resource('/planning', PlanningController::class);
    Route::resource('/abscence', AbscenceController::class);
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/agents', Agentcontroller::class);
    Route::resource('/clients', clent_controller::class)->middleware('checkRole:Admin');
    Route::resource('/contrats', Contratscontroller::class)->middleware('checkRole:Admin');
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/sites', SitesController::class);
    Route::get('/searchi', [Agentcontroller::class, 'search']);
    Route::get('/autocomplete', [Agentcontroller::class, 'autocomplete']);
    Route::get('/aposte', [Agentcontroller::class, 'aposte']);
    Route::get('/pdf', [Agentcontroller::class, 'createPDF']);
    Route::controller(FullCalenderController::class)->group(function () {
        Route::get('fullcalender', 'index');
        Route::post('fullcalenderAjax', 'ajax');
    });
    Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
    Route::resource('/fichedepaie', FichedepaieController::class);
    Route::get('send-mail', [ContactController::class, 'index']);
    Route::get('/DG', function () {
        return view('direction');
    });
    Route::get('/Cli', function () {
        return view('clientview');
    });
});
