<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamGroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTransferController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductTypeController;
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

// Public routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authentication routes
Auth::routes();

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Admin/Owner routes
    Route::middleware(['check.role:admin,owner,staff,staff_stn,gudang'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::get('/qr-scanner', [App\Http\Controllers\HomeController::class, 'qrScanner'])->name('qr_scanner');

        // Event routes
        Route::get('/input-event', [App\Http\Controllers\EventController::class, 'input'])->name('input_event');
        Route::get('/close-event/{id}', [App\Http\Controllers\EventController::class, 'close'])->name('close_event_detail');
        Route::post('/close-event', [App\Http\Controllers\EventController::class, 'submitClose'])->name('close_submit_event');
        Route::get('/edit-event/{id}', [App\Http\Controllers\EventController::class, 'edit'])->name('edit_event');
        Route::get('/detail-event/{id}', [App\Http\Controllers\EventController::class, 'detail'])->name('detail_event');
        Route::get('/list-event', [App\Http\Controllers\EventController::class, 'list'])->name('list_event');
        Route::post('/submit-event', [App\Http\Controllers\EventController::class, 'submit'])->name('submit_event');
        Route::post('/submit-event-edit', [App\Http\Controllers\EventController::class, 'submitEdit'])->name('submit_edit_event');
        Route::get('/start-event/{id}', [App\Http\Controllers\EventController::class, 'startEvent'])->name('start_event');
        Route::post('/close-event-action/{id}', [App\Http\Controllers\EventController::class, 'closeEvent'])->name('close_event');
        Route::get('/finalize-event/{id}', [App\Http\Controllers\EventController::class, 'finalizeEvent'])->name('finalize_event');
        Route::post('/finalize-submit-event', [App\Http\Controllers\EventController::class, 'finalizeSubmitEvent'])->name('finalize_submit_event');
        Route::post('/mark-product-installed', [App\Http\Controllers\EventController::class, 'markProductAsInstalled'])->name('mark_product_installed');
        Route::post('/save-signature', [App\Http\Controllers\EventController::class, 'saveSignature'])->name('save_signature');
        Route::post('/save-photo', [App\Http\Controllers\EventController::class, 'savePhoto'])->name('save_photo');

        // Report routes
        Route::get('/reports', [App\Http\Controllers\ReportController::class, 'list'])->name('report_list');

        // History routes
        Route::get('/input-history', [App\Http\Controllers\HistoryController::class, 'input'])->name('input_history');
        Route::get('/edit-history/{id}', [App\Http\Controllers\HistoryController::class, 'edit'])->name('edit_history');
        Route::get('/list-history', [App\Http\Controllers\HistoryController::class, 'list'])->name('list_history');
        Route::post('/submit-history', [App\Http\Controllers\HistoryController::class, 'submit'])->name('submit_history');
        Route::post('/submit-history-edit', [App\Http\Controllers\HistoryController::class, 'submitEdit'])->name('submit_edit_history');

        // Product routes
        Route::get('/input-product', [App\Http\Controllers\ProductController::class, 'input'])->name('input_product');
        Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit_product');
        Route::get('/list-product', [App\Http\Controllers\ProductController::class, 'list'])->name('list_product');
        Route::post('/submit-product', [App\Http\Controllers\ProductController::class, 'submit'])->name('submit_product');
        Route::post('/submit-product-edit', [App\Http\Controllers\ProductController::class, 'submitEdit'])->name('submit_edit_product');

        // Management routes
        Route::get('/input-management-product/{type}', [App\Http\Controllers\ProductController::class, 'inputManage'])->name('input_management_product');
        Route::get('/detail-management-product', [App\Http\Controllers\ProductController::class, 'detailManage'])->name('detail_management_product');
        Route::get('/list-management-product', [App\Http\Controllers\ProductController::class, 'listManage'])->name('list_management_product');
        Route::post('/submit-management-product', [App\Http\Controllers\ProductController::class, 'submitManage'])->name('submit_management_product');
        Route::post('/delete-management-product/{id}', [App\Http\Controllers\ProductController::class, 'deleteManage'])->name('delete_management_product');

        // User management routes
        Route::post('/submit-user', [App\Http\Controllers\UserController::class, 'submit'])->name('submit_user');
        Route::post('/input-user', [App\Http\Controllers\UserController::class, 'input'])->name('input_user');
        Route::get('/add-user', [App\Http\Controllers\UserController::class, 'addUser'])->name('add_user');
        Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
        Route::get('/list-user', [App\Http\Controllers\UserController::class, 'list'])->name('list_user');

        // Integration routes
        Route::get('/integration', [App\Http\Controllers\IntegrationController::class, 'integration'])->name('integration');
        Route::get('/integration-menu', [App\Http\Controllers\IntegrationController::class, 'menu'])->name('integrationMenu');
        Route::post('/input-integration', [App\Http\Controllers\IntegrationController::class, 'input'])->name('input_integration');
        Route::get('/closing-integration', [App\Http\Controllers\IntegrationController::class, 'closeIntegration'])->name('closing_integration');
        Route::post('/close-integration', [App\Http\Controllers\IntegrationController::class, 'close'])->name('close_integration');


        // Order routes
        Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
        Route::get('/api/orders/history', [App\Http\Controllers\OrderController::class, 'getOrderHistory'])->name('orders.history');
        Route::post('/orders/{id}/process', [OrderController::class, 'process'])->name('orders.process');
    });

    // User routes
    Route::get('/user-dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user_dashboard');
    Route::get('/my-profile', [App\Http\Controllers\UserController::class, 'myProfile'])->name('myProfile');
    Route::get('/change-password', [App\Http\Controllers\UserController::class, 'changePasswordView'])->name('changePasswordView');
    Route::post('/update-profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/change-pass', [App\Http\Controllers\UserController::class, 'changePassword'])->name('changePassword');
    Route::get('/reset-pass', [App\Http\Controllers\UserController::class, 'resetPass'])->name('resetPass');
    Route::get('/my-item', [App\Http\Controllers\ProductController::class, 'myItem'])->name('myItem');

    // Signature routes
    Route::get('/signature', [App\Http\Controllers\SignatureController::class, 'show']);
    Route::post('/signature', [App\Http\Controllers\SignatureController::class, 'store'])->name('signature.store');
});


// Auto-complete routes
Route::get('/generate-qr', [App\Http\Controllers\IntegrationController::class, 'generateQr'])->name('generate_qr');
Route::get('/generate-qr-product', [App\Http\Controllers\IntegrationController::class, 'generateQrProduct'])->name('generate_qr_product');
Route::get('/auto-complete-qr', [App\Http\Controllers\IntegrationController::class, 'autoCompleteQr'])->name('auto_complete_qr');
Route::get('/auto-complete-user', [App\Http\Controllers\IntegrationController::class, 'autoCompleteUser'])->name('auto_complete_user');
Route::get('/auto-complete-product', [App\Http\Controllers\IntegrationController::class, 'autoCompleteProduct'])->name('auto_complete_product');
Route::get('/auto-complete-product-event', [App\Http\Controllers\IntegrationController::class, 'autoCompleteProductEvent'])->name('auto_complete_product_event');
Route::get('/auto-complete-category', [App\Http\Controllers\IntegrationController::class, 'autoCompleteCategory'])->name('auto_complete_category');
Route::get('/auto-complete-brand', [App\Http\Controllers\IntegrationController::class, 'autoCompleteBrand'])->name('auto_complete_brand');
Route::get('/auto-complete-type', [App\Http\Controllers\IntegrationController::class, 'autoCompleteType'])->name('auto_complete_type');

// Route::get('/autocomplete', array('as' => 'autocomplete', 'uses' => 'App\Http\Controllers\SearchController@autocomplete'));


// Route::post('/regist-new-user', [App\Http\Controllers\AuthController::class, 'register'])->name('register_new');
// Route::post('/regist-new-user', 'App\Http\Controllers\AuthController@register')->name('register_new');

// Route::middleware('auth')
//     ->post('logout', 'AuthController@logout')
//     ->name('logout');

Route::prefix('team-group')->group(function () {
    Route::get('/', [TeamGroupController::class, 'index'])->name('team_group.index');
    Route::get('/create', [TeamGroupController::class, 'create'])->name('team_group.create');
    Route::post('/', [TeamGroupController::class, 'store'])->name('team_group.store');
    Route::get('/{group_id}/edit', [TeamGroupController::class, 'edit'])->name('team_group.edit');
    Route::put('/{group_id}', [TeamGroupController::class, 'update'])->name('team_group.update');
    Route::delete('/{group_id}', [TeamGroupController::class, 'destroy'])->name('team_group.destroy');
    Route::get('/{group_id}', [TeamGroupController::class, 'show'])->name('team_group.show');
});

Route::prefix('product')->group(function () {
    // Route::get('/', [ProductController::class, 'index'])->name('list_product');
    Route::get('/create', [ProductController::class, 'create'])->name('create_product');
    Route::post('/', [ProductController::class, 'store'])->name('store_product');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit_product');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update_product');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy_product');
    Route::post('/transfer', [ProductController::class, 'transfer'])->name('product.transfer');
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');
});

// Product Transfer Routes
Route::get('/product-transfers', [ProductTransferController::class, 'index'])->name('product-transfers.index');
Route::get('/product-transfers/search', [ProductTransferController::class, 'search'])->name('product-transfers.search');
Route::post('/product-transfers/transfer', [ProductTransferController::class, 'transfer'])->name('product-transfers.transfer');
Route::get('/product-transfers/create', [ProductTransferController::class, 'create'])->name('product-transfers.create');
Route::post('/product-transfers', [ProductTransferController::class, 'store'])->name('product-transfers.store');
Route::get('/product-transfers/{productTransfer}', [ProductTransferController::class, 'show'])->name('product-transfers.show');
Route::get('/product-transfers/{productTransfer}/edit', [ProductTransferController::class, 'edit'])->name('product-transfers.edit');
Route::put('/product-transfers/{productTransfer}', [ProductTransferController::class, 'update'])->name('product-transfers.update');
Route::delete('/product-transfers/{productTransfer}', [ProductTransferController::class, 'destroy'])->name('product-transfers.destroy');

// Integration Routes
Route::get('/integrations', [IntegrationController::class, 'index'])->name('integrations.index');
Route::get('/integrations/create', [IntegrationController::class, 'create'])->name('integrations.create');
Route::post('/integrations', [IntegrationController::class, 'store'])->name('integrations.store');
Route::get('/integrations/{integration}', [IntegrationController::class, 'show'])->name('integrations.show');
Route::get('/integrations/{integration}/edit', [IntegrationController::class, 'edit'])->name('integrations.edit');
Route::put('/integrations/{integration}', [IntegrationController::class, 'update'])->name('integrations.update');
Route::delete('/integrations/{integration}', [IntegrationController::class, 'destroy'])->name('integrations.destroy');
Route::post('/integrations/{integration}/sync', [IntegrationController::class, 'sync'])->name('integrations.sync');

// User Routes
Route::get('/user-home', [UserController::class, 'home'])->name('users.home');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.changePassword');

// User Cart Routes
Route::get('/catalog', [UserCartController::class, 'index'])->name('catalog');
Route::get('/my-cart', [UserCartController::class, 'myCart'])->name('my-cart');
Route::post('/add-to-cart', [UserCartController::class, 'addToCart'])->name('add-to-cart');
Route::delete('/remove-from-cart/{id}', [UserCartController::class, 'removeFromCart'])->name('remove-from-cart');
Route::post('/approve-cart/{id}', [UserCartController::class, 'approveCart'])->name('approve-cart');
Route::post('/reject-cart/{id}', [UserCartController::class, 'rejectCart'])->name('reject-cart');

// Vendor routes
Route::resource('vendors', VendorController::class);
Route::get('/auto-complete-vendor', [VendorController::class, 'autoComplete'])->name('auto-complete-vendor');
Route::get('/auto-complete-size', [ProductTypeController::class, 'autoCompleteSize'])->name('auto-complete-size');
