<?php

use App\Http\Controllers\Api\Admin\AdminDestroyController;
use App\Http\Controllers\Api\Admin\AdminStoreController;
use App\Http\Controllers\Api\Admin\AdminUpdateController;
use App\Http\Controllers\Api\Grant\IndexController;
use App\Http\Controllers\Api\Grant\ShowController;
use App\Http\Controllers\Api\User\CabinetController;
use App\Http\Controllers\Api\User\StoreController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

/*
 * User routes
 */

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::group(['namespace' => 'Grant'], function (){
            Route::get('/grants', [IndexController::class, '__invoke']); // Получить все гранты
            Route::get('/grants/{grant}', [ShowController::class, '__invoke']); // Показать один грант с подробным описанием
        });

        Route::group(['namespace' => 'User'], function (){
            Route::get('/cabinet', [CabinetController::class, '__invoke']); // Личный кабинет пользователя;
        });

        Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function (){
            Route::post('/grants', [AdminStoreController::class, '__invoke']); // Добавить грант
            Route::patch('/grants/{grant}', [AdminUpdateController::class, '__invoke']); // Изменить грант
            Route::delete('/grants/{grant}', [AdminDestroyController::class, '__invoke']); // Удалить грант
        });
    });
});

Route::group(['namespace' => 'User'], function (){
    Route::post('/users', [StoreController::class , '__invoke']);
});



/*
 * Admin routes
 */

//Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function (){
//        Route::post('/grants', [AdminStoreController::class, '__invoke']); // Добавить грант
//        Route::patch('/grants/{grant}', [AdminUpdateController::class, '__invoke']); // Изменить грант
//        Route::delete('/grants/{grant}', [AdminDestroyController::class, '__invoke']); // Удалить грант
//});

//Route::group(['namespace' => 'Grant','middleware' => 'auth:api'], function (){
//    Route::post('/grants', [AdminStoreController::class, '__invoke']); // Добавить грант
//    Route::patch('/grants/{grant}', [AdminUpdateController::class, '__invoke']); // Изменить грант
//    Route::delete('/grants/{grant}', [AdminDestroyController::class, '__invoke']); // Удалить грант
//});





