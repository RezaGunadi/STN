<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use ;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/qr-scanner', [App\Http\Controllers\HomeController::class, 'qrScanner'])->name('qr_scanner');


Route::get('/input-event', [App\Http\Controllers\EventController::class, 'input'])->name('input_event');
Route::get('/close-event/{id}', [App\Http\Controllers\EventController::class, 'close'])->name('close_event_detail');
Route::post('/close-event', [App\Http\Controllers\EventController::class, 'submitClose'])->name('close_submit_event');
Route::get('/edit-event/{id}', [App\Http\Controllers\EventController::class, 'edit'])->name('edit_event');
Route::get('/detail-event/{id}', [App\Http\Controllers\EventController::class, 'detail'])->name('detail_event');
Route::get('/list-event', [App\Http\Controllers\EventController::class, 'list'])->name('list_event');
Route::post('/submit-event', [App\Http\Controllers\EventController::class, 'submit'])->name('submit_event');
Route::post('/submit-event-edit', [App\Http\Controllers\EventController::class, 'submitEdit'])->name('submit_edit_event');

Route::get('/reports', [App\Http\Controllers\ReportController::class, 'list'])->name('report_list');

Route::get('/input-history', [App\Http\Controllers\HistoryController::class, 'input'])->name('input_history');
Route::get('/edit-history/{id}', [App\Http\Controllers\HistoryController::class, 'edit'])->name('edit_history');
Route::get('/list-history', [App\Http\Controllers\HistoryController::class, 'list'])->name('list_history');
Route::post('/submit-history', [App\Http\Controllers\HistoryController::class, 'submit'])->name('submit_history');
Route::post('/submit-history-edit', [App\Http\Controllers\HistoryController::class, 'submitEdit'])->name('submit_edit_history');

Route::get('/input-product', [App\Http\Controllers\ProductController::class, 'input'])->name('input_product');
Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit_product');
Route::get('/list-product', [App\Http\Controllers\ProductController::class, 'list'])->name('list_product');
Route::post('/submit-product', [App\Http\Controllers\ProductController::class, 'submit'])->name('submit_product');
Route::post('/submit-product-edit', [App\Http\Controllers\ProductController::class, 'submitEdit'])->name('submit_edit_product');

Route::post('/submit-user', [App\Http\Controllers\UserController::class, 'submit'])->name('submit_user');
Route::post('/input-user', [App\Http\Controllers\UserController::class, 'input'])->name('input_user');
Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
Route::get('/list-user', [App\Http\Controllers\UserController::class, 'list'])->name('list_user');

Route::get('/integration', [App\Http\Controllers\IntegrationController::class, 'integration'])->name('integration');
Route::get('/integration-menu', [App\Http\Controllers\IntegrationController::class, 'menu'])->name('integrationMenu');
Route::post('/input-integration', [App\Http\Controllers\IntegrationController::class, 'input'])->name('input_integration');
Route::get('/closing-integration', [App\Http\Controllers\IntegrationController::class, 'closeIntegration'])->name('closing_integration');
Route::post('/close-integration', [App\Http\Controllers\IntegrationController::class, 'close'])->name('close_integration');


Route::get('/generate-qr', [App\Http\Controllers\IntegrationController::class, 'generateQr'])->name('generate_qr');
Route::get('/auto-complete-qr', [App\Http\Controllers\IntegrationController::class, 'autoCompleteQr'])->name('auto_complete_qr');
Route::get('/auto-complete-user', [App\Http\Controllers\IntegrationController::class, 'autoCompleteUser'])->name('auto_complete_user');
Route::get('/auto-complete-product', [App\Http\Controllers\IntegrationController::class, 'autoCompleteProduct'])->name('auto_complete_product');


Route::get('/my-profile', [App\Http\Controllers\UserController::class, 'myProfile'])->name('myProfile');
Route::get('/change-password', [App\Http\Controllers\UserController::class, 'changePasswordView'])->name('changePasswordView');
Route::post('/update-profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('updateProfile');
Route::post('/change-pass', [App\Http\Controllers\UserController::class, 'changePassword'])->name('changePassword');
Route::get('/reset-pass', [App\Http\Controllers\UserController::class, 'resetPass'])->name('resetPass');
Route::get('/reset-pass', [App\Http\Controllers\UserController::class, 'emailTest'])->name('emailTest');

Route::get('/my-item', [App\Http\Controllers\ProductController::class, 'myItem'])->name('myItem');

// Route::get('/autocomplete', array('as' => 'autocomplete', 'uses' => 'App\Http\Controllers\SearchController@autocomplete'));


// Route::post('/regist-new-user', [App\Http\Controllers\AuthController::class, 'register'])->name('register_new');
// Route::post('/regist-new-user', 'App\Http\Controllers\AuthController@register')->name('register_new');

// Route::middleware('auth')
//     ->post('logout', 'AuthController@logout')
//     ->name('logout');
