<?php

use App\Http\Controllers\Admin\CartItemController;
use App\Http\Controllers\Admin\ContentCategoryController;
use App\Http\Controllers\Admin\ContentPageController;
use App\Http\Controllers\Admin\ContentTagController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqQuestionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\PaymentDetailController;
use App\Http\Controllers\Admin\PaymenttypeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductInventoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ShoppingSessionController;
use App\Http\Controllers\Admin\TaskCalendarController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TaskStatusController;
use App\Http\Controllers\Admin\TaskTagController;
use App\Http\Controllers\Admin\UserAddressController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserpaymentController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // User Address
    Route::resource('user-addresses', UserAddressController::class, ['except' => ['store', 'update', 'destroy']]);

    // Paymenttype
    Route::post('paymenttypes/media', [PaymenttypeController::class, 'storeMedia'])->name('paymenttypes.storeMedia');
    Route::resource('paymenttypes', PaymenttypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Userpayment
    Route::resource('userpayments', UserpaymentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product Category
    Route::post('product-categories/media', [ProductCategoryController::class, 'storeMedia'])->name('product-categories.storeMedia');
    Route::resource('product-categories', ProductCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product Inventory
    Route::resource('product-inventories', ProductInventoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Discount
    Route::resource('discounts', DiscountController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product
    Route::post('products/media', [ProductController::class, 'storeMedia'])->name('products.storeMedia');
    Route::resource('products', ProductController::class, ['except' => ['store', 'update', 'destroy']]);

    // Shopping Session
    Route::resource('shopping-sessions', ShoppingSessionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Cart Item
    Route::resource('cart-items', CartItemController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payment Details
    Route::resource('payment-details', PaymentDetailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Order Details
    Route::resource('order-details', OrderDetailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Order Items
    Route::resource('order-items', OrderItemController::class, ['except' => ['store', 'update', 'destroy']]);

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Content Category
    Route::resource('content-categories', ContentCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Content Tag
    Route::resource('content-tags', ContentTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Content Page
    Route::post('content-pages/media', [ContentPageController::class, 'storeMedia'])->name('content-pages.storeMedia');
    Route::resource('content-pages', ContentPageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task Status
    Route::resource('task-statuses', TaskStatusController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task Tag
    Route::resource('task-tags', TaskTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task
    Route::post('tasks/media', [TaskController::class, 'storeMedia'])->name('tasks.storeMedia');
    Route::resource('tasks', TaskController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task Calendar
    Route::resource('task-calendars', TaskCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Faq Category
    Route::resource('faq-categories', FaqCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Faq Question
    Route::resource('faq-questions', FaqQuestionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
