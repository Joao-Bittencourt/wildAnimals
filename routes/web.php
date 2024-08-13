<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
Route::get('/up', function () {
    return response('up', 200);
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'welcome'])
    ->name('welcome');

Route::get('/animals', [\App\Http\Controllers\AnimalsController::class, 'list'])
    ->name('animals.list');

Route::get('/login', [\App\Http\Controllers\UsersController::class, 'login'])
    ->name('users.login');
Route::get('/logout', [\App\Http\Controllers\UsersController::class, 'logout'])
    ->name('users.logout');
Route::get('/users/register', [\App\Http\Controllers\UsersController::class, 'register'])
    ->name('users.register');
Route::post('/users/store', [\App\Http\Controllers\UsersController::class, 'store'])
    ->name('users.store');
Route::post('/authenticate', [\App\Http\Controllers\UsersController::class, 'authenticate'])
    ->name('users.authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('/animals/create', [\App\Http\Controllers\AnimalsController::class, 'create'])
        ->name('animals.create');
    Route::post('/animals/store', [\App\Http\Controllers\AnimalsController::class, 'store'])
        ->name('animals.store');

    Route::get('/animal-families', [\App\Http\Controllers\AnimalFamiliesController::class, 'list'])
        ->name('animalFamilies.list');
    Route::get('/animal-families/create', [\App\Http\Controllers\AnimalFamiliesController::class, 'create'])
        ->name('animalFamilies.create');
    Route::post('/animal-families/store', [\App\Http\Controllers\AnimalFamiliesController::class, 'store'])
        ->name('animalFamilies.store');

    Route::get('/animal-especies', [\App\Http\Controllers\AnimalEspeciesController::class, 'list'])
        ->name('animalEspecies.list');
    Route::get('/animal-especies/create', [\App\Http\Controllers\AnimalEspeciesController::class, 'create'])
        ->name('animalEspecies.create');
    Route::post('/animal-especies/store', [\App\Http\Controllers\AnimalEspeciesController::class, 'store'])
        ->name('animalEspecies.store');

    Route::get('/player-animals', [\App\Http\Controllers\PlayerAnimalsController::class, 'list'])
        ->name('playerAnimals.list');

    Route::get('/player-animals/show/{playerAnimal}', [\App\Http\Controllers\PlayerAnimalsController::class, 'show'])
        ->name('playerAnimals.show');

    Route::get('/player-animals/explorer', [\App\Http\Controllers\PlayerAnimalsController::class, 'explorer'])
        ->name('playerAnimals.explorer');
    Route::post('/player-animals/explor', [\App\Http\Controllers\PlayerAnimalsController::class, 'explor'])
        ->name('playerAnimals.explor');

    Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index'])
        ->name('users.list');
    Route::get('/users/profile/{user}', [\App\Http\Controllers\UsersController::class, 'profile'])
        ->name('users.profile');

    Route::get('/activity-logs', [\App\Http\Controllers\ActivityLogsController::class, 'index'])
        ->name('activityLogs.list');
    Route::get('/activity-logs/{activityLogId}', [\App\Http\Controllers\ActivityLogsController::class, 'show'])
        ->name('activityLogs.show');
});

Route::get('/run-migrations', function () {
    Artisan::call('migrate');

    return 'sucesso!';
});

Route::get('/optimize', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('optimize');

    return 'sucesso!';
});
