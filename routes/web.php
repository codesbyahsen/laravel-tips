<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HandleCache\CacheController;

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

// Clear Cache using callback route
Route::get('/clear-cache', function () {
    $cacheCommands = array(
        'event:clear',
        'view:clear',
        'cache:clear',
        'route:clear',
        'config:clear',
        'clear-compiled',
        'optimize:clear'
    );

    foreach ($cacheCommands as $command) {
        Artisan::call($command);
    }

   return "Cache cleared successfully";
});


// Clear Cache using controller route
Route::get('/cache/{command}', [CacheController::class, 'cacheClear']);
