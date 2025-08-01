<?php

use App\Http\Controllers\changePasswordController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\settingController;
use Illuminate\Support\Facades\Route;


// Login Route 
Route::get('/login', [loginController::class, 'showLogin'])->middleware('RedirectIfLoggedIn')->name('show.login.page');
Route::post('/checkAdmin', [loginController::class, 'authUser'])->name('check.Admin');




// here we implements the middleware ->middleware('checkAdmin')
Route::middleware(['checkAdmin'])->group(
    function () {
        Route::get('/', function () {
            return view('welcome');
        });

        // show view 
        Route::get('/brand', [settingController::class, 'showBrand'])->name('show.brand.page');
        Route::get('/subcategory', [settingController::class, 'showSubCategory'])->name('show.subcategory.page');
        Route::get('/unit', [settingController::class, 'showUnit'])->name('show.unit.page');
        Route::get('/company', [settingController::class, 'showCompany'])->name('show.companyInfo.page');
        Route::get('/category', [settingController::class, 'showCategory'])->name('show.category.page');


        // Add Brand 
        Route::post('/brand', [settingController::class, 'addBrand'])->name('add.Brand');
        // Add Category
        Route::post('/category', [settingController::class, 'addCategory'])->name('add.Category');
        // Add Unit 
        Route::post('/unit', [settingController::class, 'addUnit'])->name('add.Unit');
        // Add Sub Category
        Route::post('/subcategory', [settingController::class, 'addSubCategory'])->name('add.Sub.Category');
        // logout 
        Route::get('/logout', [settingController::class, 'logout'])->name('logout.Admin');


        // Edit pages serve 
        Route::get('/brand/edit/{id}', [settingController::class, 'EditBrandPage'])->name('edit.brand.page');
        Route::get('/category/edit/{id}', [settingController::class, 'EditCategoryPage'])->name('edit.category.page');
        Route::get('/subcategory/edit/{id}', [settingController::class, 'EditshowSubCategory'])->name('edit.subcategory.page');
        Route::get('/unit/edit/{id}', [settingController::class, 'EditshowUnit'])->name('edit.unit.page');


        // Update Brand route 
        Route::put('/brand/{id}', [settingController::class, 'updateBrand'])->name('upadte.brand');
        Route::put('/category/{id}', [settingController::class, 'updateCategory'])->name('update.category');
        Route::put('/subcategory/{id}', [settingController::class, 'updateSubCategory'])->name('update.sabCategory');
        Route::put('/unit/{id}', [settingController::class, 'updateUnit'])->name('update.unit');
        Route::put('/company/{id}', [settingController::class, 'updateCompany'])->name('update.company');


        Route::get('/change-password', [changePasswordController::class, 'showPassword'])->name('show.Password');
        // update Password 
        Route::post('/update-password', [changePasswordController::class, 'updatePassword'])->name('update.password');




        //--------------------------------- contact form --------------------------------------------------->
        Route::get('/add-contact', [contactController::class, 'showContact'])->name('show.contact');
        // add contact form 
        Route::post('/add-contact', [contactController::class, 'addContact'])->name('add.contact');
        // show table form 
        Route::get('/manage-contact', [contactController::class, 'contactData'])->name('contact.data');
        // show update form 
        Route::get('/update-contact/{id}', [contactController::class, 'showUpdateContact'])->name('show.update.contact');
        // update contact
        Route::put('/update-contact/{id}', [contactController::class, 'update'])->name('update.contact');
    }
);


//item
Route::get('/items', [ItemsController::class, 'showItems'])->name('show.Items');
//add items 
Route::get('/items/create', [ItemsController::class, 'createItems'])->name('add.Items');
//store items
Route::post('/items/store', [ItemsController::class, 'storeItem'])->name('store.Item');
// edit form 
Route::get('/items/edit/{id}', [ItemsController::class, 'editItem'])->name('edit.Items');
// items category 
Route::get('/get-subcategories/{category_id}', [ItemsController::class, 'getSubcategories']);
// update items 
Route::post('/items/update/{id}', [ItemsController::class, 'updateItem'])->name('update.Items');





// Route::get('/insertPassword', [changePasswordController::class, 'insertUser'])->name('insert.password');
// Route::get('/store', [changePasswordController::class, 'storeSampleItems']);