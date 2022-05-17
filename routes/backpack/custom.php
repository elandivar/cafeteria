<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('employee', 'EmployeeCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('product-price', 'ProductPriceCrudController');
    Route::crud('stocktaking', 'StocktakingCrudController');
    Route::crud('supplier', 'SupplierCrudController');
    Route::crud('supplier-request', 'SupplierRequestCrudController');
    Route::get('charts/rotation', 'Charts\RotationChartController@response')->name('charts.rotation.index');
    Route::crud('stocktaking-product', 'StocktakingProductCrudController');
    Route::crud('supplier-request-product', 'SupplierRequestProductCrudController');
    Route::crud('account-transactions', 'AccountTransactionsCrudController');
    Route::crud('cash-register-closure', 'CashRegisterClosureCrudController');
    Route::crud('chart-account', 'ChartAccountCrudController');
    Route::crud('payment', 'PaymentCrudController');
    Route::crud('contact', 'ContactCrudController');
    Route::crud('employee-workinghours', 'EmployeeWorkinghoursCrudController');
    Route::crud('configuration', 'ConfigurationCrudController');
}); // this should be the absolute last line of this file