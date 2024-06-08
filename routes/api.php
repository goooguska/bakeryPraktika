<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRecipeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("/auth", function () {
//     return 'Hello from auth!';
// });
// Route::get("/reg", function () {
//     return 'Hello from reg!';
// });
Route::prefix('v1')->group(function () {
    Route::apiResource('news', NewsController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('recipes', RecipeController::class);
    Route::apiResource('ingredients', IngredientController::class);
    Route::apiResource('recipeIngredients', RecipeIngredientController::class);
    Route::apiResource('productRecipes', ProductRecipeController::class);

});

Route::post('/users',StoreController::class);

Route::controller(AuthController::class)->middleware(['api' ])->prefix('auth')
    ->group(function ($router) {

    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::post('me', 'me');

});

