<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BakedProductController;
use App\Http\Controllers\BakerController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRecipeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeIngredientController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('news', NewsController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('recipes', RecipeController::class);
    Route::apiResource('ingredients', IngredientController::class);
    Route::apiResource('recipeIngredients', RecipeIngredientController::class);
    Route::apiResource('productRecipes', ProductRecipeController::class);
    Route::apiResource('providers', ProviderController::class);
    Route::apiResource('bakers', BakerController::class);
    Route::apiResource('bakedProducts', BakedProductController::class);
});

Route::post('/users',StoreController::class);
// Route::post('/mail',StoreController::class);
Route::post('/mail', [MailController::class, 'send']);


Route::controller(AuthController::class)->middleware(['api' ])->prefix('auth')
    ->group(function ($router) {

    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::post('me', 'me');

});

