<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//Admin routes
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/profile',[AdminController::class,'ViewAdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/password/change',[AdminController::class,'AdminPasswordChangeView'])->name('admin.password.change');
    Route::post('/admin/password/update',[AdminController::class,'UpdateAdminPassword'])->name('admin.password.update');
    Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
});

Route::middleware('auth')->group(function () {
    //CUSTOMR
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/view/customer', 'ViewCustomer')->name('view.customer');
        Route::get('/add/customer', 'AddCustomer')->name('add.customer');
        Route::post('/store/customer', 'StoreCustomer')->name('store.customer');
        Route::get('/edit/customer/{id}', 'EditCustomer')->name('edit.customer');
        Route::post('/update/customer', 'UpdateCustomer')->name('update.customer');
        Route::get('/delete/customer/{id}', 'DeleteCustomer')->name('delete.customer');
        Route::get('/view/customer/measurment', 'ViewCustomerMeasurments')->name('view.customer.measurment');
    });

    //CUSTOMR
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/view/employee', 'ViewEmployee')->name('view.employee');
        Route::get('/add/employee', 'AddEmployee')->name('add.employee');
        Route::post('/store/employee', 'StoreEmployee')->name('store.employee');
        Route::get('/edit/employee/{id}', 'EditEmployee')->name('edit.employee');
        Route::post('/update/employee', 'UpdateEmployee')->name('update.employee');
        Route::get('/delete/employee/{id}', 'DeleteEmployee')->name('delete.employee');
    });
    //Category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/view/category', 'ViewCategory')->name('view.category');
        Route::post('/store/category', 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category', 'UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });
    //Category
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/view/service', 'ViewService')->name('view.service');
        Route::get('/add/service', 'AddService')->name('add.service');
        Route::post('/store/service', 'StoreService')->name('store.service');
        Route::get('/edit/service/{id}', 'EditService')->name('edit.service');
        Route::post('/update/service', 'UpdateService')->name('update.service');
        Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service');
    });
    //POS
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order', 'ViewOrderPage')->name('order');
        Route::post('/addToCart', 'AddToCart')->name('add.to.cart');
        Route::post('/updateCart/{rowId}', 'UpadateItemQuantity')->name('update.cart');
        Route::get('/removeCartItem/{rowId}', 'RemoveItemFromCart')->name('remove.cart');
        Route::post('/createOrder', 'CreateOrder')->name('create.order');
        Route::get('/orders-list','AllOrdersList')->name('all.orders');
    });
    //ORDER INVOICE
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/order/invoice/{orderId}', 'OrderDetailsInvoice')->name('order.invoice');
    });

    //Measurment Guide
    Route::get('/measurment/guide', function () {
        return view('measurment_guide.view_measurment_guide');
    });

});

require __DIR__.'/auth.php';
