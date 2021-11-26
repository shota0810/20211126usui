<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


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

// お問合せ
Route::get('/', [ContactController::class,'index']);
// 内容確認
Route::post('/confirm', [ContactController::class,'confirm']);
// DBへ挿入
Route::post('/process', [ContactController::class,'process']);
// サンクスページ
Route::get('/complete', [ContactController::class,'complete']);

// 管理ページ
Route::get('/manegement', [ContactController::class,'manegement']);
// 検索結果
Route::get('/find', [ContactController::class,'find']);
// 削除
Route::post('/delete',[ContactController::class,'delete']);


