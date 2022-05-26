<?php

use App\Http\Controllers\Admin\AdminDestroyController;
use App\Http\Controllers\Admin\AdminStoreController;
use App\Http\Controllers\Admin\AdminUpdateController;
use App\Http\Controllers\Grant\IndexController;
use App\Http\Controllers\Grant\ShowController;
use App\Http\Controllers\User\CabinetController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Route;

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

/*
 * User routes
 */

Route::post('/register', [RegisterController::class, '__invoke']); // Регистрация
Route::post('/login', [LoginController::class, '__invoke']); // Логин

Route::group(['namespace' => 'User', 'middleware' => 'auth:api'], function (){
    Route::get('/cabinet', [CabinetController::class, '__invoke']); // Личный кабинет пользователя;
});

/*
 * Grant routes
 */

Route::get('/grants', [IndexController::class, '__invoke']); // Получить все гранты
Route::get('/grants/{grant}', [ShowController::class, '__invoke']); // Показать один грант с подробным описанием

/*
 * Admin routes
 */

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::group(['namespace' => 'Grant','middleware' => 'auth:api'], function (){
        Route::post('/grants', [AdminStoreController::class, '__invoke']); // Добавить грант
        Route::patch('/grants/{grant}', [AdminUpdateController::class, '__invoke']); // Изменить грант
        Route::delete('/grants/{grant}', [AdminDestroyController::class, '__invoke']); // Удалить грант
    });
});



