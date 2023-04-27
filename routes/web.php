<?php

use App\Http\Controllers\Auth\TwoFaController;
use App\Http\Controllers\Dados;
use App\Http\Controllers\DadosAnime;
use App\Http\Controllers\DadosSerie;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\AddAnime;
use App\Http\Livewire\AddFilme;
use App\Http\Livewire\AddSerie;
use App\Http\Livewire\Admin\AuditTrails;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Roles\Edit;
use App\Http\Livewire\Admin\Roles\Roles;
use App\Http\Livewire\Admin\SentEmails\SentEmails;
use App\Http\Livewire\Admin\SentEmails\SentEmailsBody;
use App\Http\Livewire\Admin\Settings\Settings;
use App\Http\Livewire\Admin\Users\EditUser;
use App\Http\Livewire\Admin\Users\ShowUser;
use App\Http\Livewire\Admin\Users\Users;
use App\Http\Livewire\EditAnime;
use App\Http\Livewire\EditFilme;
use App\Http\Livewire\EditSerie;
use App\Http\Livewire\ListAnime;
use App\Http\Livewire\ListFilme;
use App\Http\Livewire\ListSerie;
use App\Http\Livewire\ViewAnime;
use App\Http\Livewire\ViewEditA;
use App\Http\Livewire\ViewEditF;
use App\Http\Livewire\ViewEditS;
use App\Http\Livewire\ViewFilme;
use App\Http\Livewire\ViewSerie;
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

Route::get('/', WelcomeController::class);

Route::prefix(config('admintw.prefix'))->middleware(['auth', 'verified', 'activeUser', 'IpCheckMiddleware'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    //Rota de catalogo
    Route::prefix('catalogo')->group(function () {
        Route::get('filmes', ListFilme::class)->name('catalogo.filmes');
        Route::get('series', ListSerie::class)->name('catalogo.series');
        Route::get('animes', ListAnime::class)->name('catalogo.animes');
    });

    //Rota de adicionar
    Route::prefix('adicionar')->group(function () {
        Route::get('filme', AddFilme::class)->name('adicionar.filme');
        Route::post('/dados-filme', [Dados::class, 'dadosFilme'])->name('dados.filme');
        Route::get('serie', AddSerie::class)->name('adicionar.serie');
        Route::post('/dados-serie', [DadosSerie::class, 'dadosSerie'])->name('dados.serie');
        Route::get('anime', AddAnime::class)->name('adicionar.anime');
        Route::post('/dados-anime', [DadosAnime::class, 'dadosAnime'])->name('dados.anime');
    });

    //Rota de visualizar
    Route::get('catalogo/series/viewserie/{id?}',[ViewSerie::class, 'viewserie'])->name('view.serie');
    Route::get('catalogo/filmes/viewfilme/{id?}',[ViewFilme::class, 'viewfilme'])->name('view.filme');
    Route::get('catalogo/animes/viewanime/{id?}',[ViewAnime::class, 'viewanime'])->name('view.anime');

    //Rota de edit
    Route::prefix('editar')->group(function () {
        Route::get('filme', ViewEditF::class)->name('view.edit.filme');
        Route::get('edit-filme/{id}', [EditFilme::class, 'editFilme'])->name('edit.filme');
        Route::post('update-filme/{id}', [EditFilme::class, 'updateFilme'])->name('update.filme');
        Route::delete('delete-filme/{id}', [ViewEditF::class, 'deleteFilme'])->name('delete.filme');

        Route::get('serie', ViewEditS::class)->name('view.edit.serie');
        Route::get('edit-serie/{id}', [EditSerie::class, 'editSerie'])->name('edit.serie');
        Route::post('update-serie/{id}', [EditSerie::class, 'updateSerie'])->name('update.serie');
        Route::delete('delete-serie/{id}', [ViewEditS::class, 'deleteSerie'])->name('delete.serie');

        Route::get('anime', ViewEditA::class)->name('view.edit.anime');
        Route::get('edit-anime/{id}', [EditAnime::class, 'editAnime'])->name('edit.anime');
        Route::post('update-anime/{id}', [EditAnime::class, 'updateAnime'])->name('update.anime');
        Route::delete('delete-anime/{id}', [ViewEditA::class, 'deleteAnime'])->name('delete.anime');
    });

    Route::get('2fa', [TwoFaController::class, 'index'])->name('2fa');
    Route::post('2fa', [TwoFaController::class, 'update'])->name('2fa.update');
    Route::get('2fa-setup', [TwoFaController::class, 'setup'])->name('2fa-setup');
    Route::post('2fa-setup', [TwoFaController::class, 'setupUpdate'])->name('2fa-setup.update');

    Route::prefix('settings')->group(function () {
        Route::get('audit-trails', AuditTrails::class)->name('admin.settings.audit-trails.index');
        Route::get('system-settings', Settings::class)->name('admin.settings');
        Route::get('roles', Roles::class)->name('admin.settings.roles.index');
        Route::get('roles/{role}/edit', Edit::class)->name('admin.settings.roles.edit');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', Users::class)->name('admin.users.index');
        Route::get('{user}/edit', EditUser::class)->name('admin.users.edit');
        Route::get('{user}', ShowUser::class)->name('admin.users.show');
    });
});

require __DIR__.'/auth.php';
