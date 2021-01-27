<?php

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// user management
Route::group(['middleware'=>'linkprotected'],function(){
    //users
    Route::prefix('users')->group(function(){
        Route::get('/view', 'User\UserController@view')->name('users.view');
        Route::get('/add', 'User\UserController@add')->name('users.add');
        Route::post('/store', 'User\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'User\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'User\UserController@update')->name('users.update');
        Route::get('/delete/{id}', 'User\UserController@delete')->name('users.delete');
     });


     // profiler
     Route::prefix('profiles')->group(function(){
        Route::get('/view', 'Profile\ProfileController@view')->name('profiles.view');
        Route::get('/edit', 'Profile\ProfileController@edit')->name('profiles.edit');
        Route::post('/update', 'Profile\ProfileController@update')->name('profiles.update');
    
        Route::get('/passwoard/view', 'Profile\ProfileController@passwordView')->name('password.view');
        Route::post('/passwoard/update', 'Profile\ProfileController@passwordUpdate')->name('password.update');
      
     });
    // Suppliers
     Route::prefix('suppliers')->group(function(){
        Route::get('/view', 'Suppliers\SuppliersController@view')->name('suppliers.view');
        Route::get('/add', 'Suppliers\SuppliersController@add')->name('suppliers.add');
        Route::post('/store', 'Suppliers\SuppliersController@store')->name('suppliers.store');
        Route::get('/edit/{id}', 'Suppliers\SuppliersController@edit')->name('suppliers.edit');
        Route::post('/update/{id}', 'Suppliers\SuppliersController@update')->name('suppliers.update');
        Route::get('/delete/{id}', 'Suppliers\SuppliersController@delete')->name('suppliers.delete');
      
     });


      // Customers
      Route::prefix('customers')->group(function(){
         Route::get('/view', 'Customers\CustomersController@view')->name('customers.view');
         Route::get('/add', 'Customers\CustomersController@add')->name('customers.add');
         Route::post('/store', 'Customers\CustomersController@store')->name('customers.store');
         Route::get('/edit/{id}', 'Customers\CustomersController@edit')->name('customers.edit');
         Route::post('/update/{id}', 'Customers\CustomersController@update')->name('customers.update');
         Route::get('/delete/{id}', 'Customers\CustomersController@delete')->name('customers.delete');
         Route::get('/credit', 'Customers\CustomersController@creditCustomer')->name('customers.credit');
         Route::get('/credit/pdf', 'Customers\CustomersController@creditCustomerPdf')->name('customers.credit.pdf');
         Route::get('/invoice/edit/{invoice_id}', 'Customers\CustomersController@editInvoice')->name('customers.edit.invoice');
         Route::post('/invoice/update/{invoice_id}', 'Customers\CustomersController@updateInvoice')->name('customers.update.invoice');
         Route::get('/invoice/details/{invoice_id}', 'Customers\CustomersController@invoiceDetailsPdf')->name('invoice.details.pdf');
         Route::get('/paid', 'Customers\CustomersController@paidCustomer')->name('customers.paid');
         Route::get('/paid/pdf/{invoice_id}', 'Customers\CustomersController@padiCustomerPdfDetails')->name('paid.customer.pdf');
         Route::get('/paid/pdf', 'Customers\CustomersController@paidCustomerPdf')->name('customers.paid.pdf');
         Route::get('/wise/report', 'Customers\CustomersController@customerWiseReport')->name('customers.wise.report');
         
      });

      // UNITS
      Route::prefix('units')->group(function(){
         Route::get('/view', 'Units\UnitsController@view')->name('units.view');
         Route::get('/add', 'Units\UnitsController@add')->name('units.add');
         Route::post('/store', 'Units\UnitsController@store')->name('units.store');
         Route::get('/edit/{id}', 'Units\UnitsController@edit')->name('units.edit');
         Route::post('/update/{id}', 'Units\UnitsController@update')->name('units.update');
         Route::get('/delete/{id}', 'Units\UnitsController@delete')->name('units.delete');
         
      });

      // Categories
      Route::prefix('categoris')->group(function(){
         Route::get('/view', 'Categories\CategoryController@view')->name('categories.view');
         Route::get('/add', 'Categories\CategoryController@add')->name('categories.add');
         Route::post('/store', 'Categories\CategoryController@store')->name('categories.store');
         Route::get('/edit/{id}', 'Categories\CategoryController@edit')->name('categories.edit');
         Route::post('/update/{id}', 'Categories\CategoryController@update')->name('categories.update');
         Route::get('/delete/{id}', 'Categories\CategoryController@delete')->name('categories.delete');
         
      });

      // Products
      Route::prefix('products')->group(function(){
         Route::get('/view', 'Products\ProductController@view')->name('products.view');
         Route::get('/add', 'Products\ProductController@add')->name('products.add');
         Route::post('/store', 'Products\ProductController@store')->name('products.store');
         Route::get('/edit/{id}', 'Products\ProductController@edit')->name('products.edit');
         Route::post('/update/{id}', 'Products\ProductController@update')->name('products.update');
         Route::get('/delete/{id}', 'Products\ProductController@delete')->name('products.delete');
         
      });


         // Purchase
         Route::prefix('purchases')->group(function(){
            Route::get('/view', 'Purchases\PurchasesController@view')->name('purchases.view');
            Route::get('/add', 'Purchases\PurchasesController@add')->name('purchases.add');
            Route::post('/store', 'Purchases\PurchasesController@store')->name('purchases.store');
            Route::get('/delete/{id}', 'Purchases\PurchasesController@delete')->name('purchases.delete');
            Route::get('/pending', 'Purchases\PurchasesController@pendingList')->name('purchases.pending.list');
            Route::get('/approved/{id}', 'Purchases\PurchasesController@purchasedApproved')->name('purchases.approved');
            Route::get('/report', 'Purchases\PurchasesController@purchaseReport')->name('purchases.report');
            Route::get('/report/pdf', 'Purchases\PurchasesController@purchaseReportPdf')->name('purchases.report.pdf');
            
         });


            // Purchase
         Route::prefix('invoice')->group(function()
         {
            Route::get('/view', 'Invoice\InvoiceController@view')->name('invoice.view');
            Route::get('/add', 'Invoice\InvoiceController@add')->name('invoice.add');
            Route::post('/store', 'Invoice\InvoiceController@store')->name('invoice.store');
            Route::get('/delete/{id}', 'Invoice\InvoiceController@delete')->name('invoice.delete');
            Route::get('/pending', 'Invoice\InvoiceController@pendingList')->name('invoice.pending.list');
            Route::get('/approved/{id}', 'Invoice\InvoiceController@invoiceApproved')->name('invoice.approved');  
            Route::post('/approved/store/{id}', 'Invoice\InvoiceController@approvalStore')->name('approval.store');  
            Route::get('/list', 'Invoice\InvoiceController@invoiceList')->name('invoice.list');  
            Route::get('/print/{id}', 'Invoice\InvoiceController@invoicePrint')->name('invoice.print'); 
            Route::get('/daily/report', 'Invoice\InvoiceController@dailyReport')->name('invoice.daily.report');   
            Route::get('/daily/report/pdf', 'Invoice\InvoiceController@dailyReportPDF')->name('invoice.daily.report.pdf');   
          
           
         }); 
         
         
         // Stock
         Route::prefix('stock')->group(function()
         {
            Route::get('/report', 'Stock\StockController@StockReport')->name('stock.report');
            Route::get('/report/pdf', 'Stock\StockController@StockReportPdf')->name('stock.report.pdf');
            Route::get('/report/supplier/product/wise', 'Stock\StockController@supplierProductWise')->name('stock.report.supplier.product.wise');
            Route::get('/report/supplier/wise/pdf', 'Stock\StockController@supplierWisePdf')->name('report.supplier.wise.pdf');
            Route::get('/report/product/wise/pdf', 'Stock\StockController@productWisePdf')->name('report.product.wise.pdf');
         });  
         // default controller
         
         Route::get('/get-category', 'DefaultController@getCategory')->name('get-category');
         Route::get('/get-product', 'DefaultController@getProduct')->name('get-product');
         Route::get('/get-stock', 'DefaultController@getStock')->name('check-product-stock');


});




