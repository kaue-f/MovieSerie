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
use App\Http\Livewire\ListAnime;
use App\Http\Livewire\ListFilme;
use App\Http\Livewire\ListSerie;
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


    Route::prefix('catalogo')->group(function () {
        Route::get('filmes', ListFilme::class)->name('catalogo.filmes');
        Route::get('series', ListSerie::class)->name('catalogo.series');
        Route::get('animes', ListAnime::class)->name('catalogo.animes');
    });
        

    Route::prefix('adicionar')->group(function () {
        Route::get('filme', AddFilme::class)->name('adicionar.filme');
        Route::post('/dados-filme', [Dados::class, 'dadosFilme'])->name('dados.filme');
        Route::get('serie', AddSerie::class)->name('adicionar.serie');
        Route::post('/dados-serie', [DadosSerie::class, 'dadosSerie'])->name('dados.serie');
        Route::get('anime', AddAnime::class)->name('adicionar.anime');
        Route::post('/dados-anime', [DadosAnime::class, 'dadosAnime'])->name('dados.anime');
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
