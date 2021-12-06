<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
//     return view('frontend.index');
// });

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login',[AdminController::class, 'loginForm']); 
    Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

//admin al route
Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout'); 

Route::get('/admin/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile'); 
Route::get('/admin/profile/edit',[AdminProfileController::class, 'profileEdit'])->name('admin.profile.edit'); 
Route::post('/admin/profile/update',[AdminProfileController::class, 'profileUpdate'])->name('admin.profile.update'); 
Route::get('/admin/change/password',[AdminProfileController::class, 'changePassword'])->name('admin.change.password'); 
Route::post('/admin/update/password',[AdminProfileController::class, 'passwordUpdate'])->name('admin.password.update'); 


//user all route

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $user = User::find(Auth::user()->id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/',[IndexController::class, 'index'])->name('home'); 
Route::get('/user/logout',[IndexController::class, 'userLogout'])->name('user.logout'); 
Route::get('/user/profile',[IndexController::class, 'userProfile'])->name('user.profile'); 
Route::post('/user/profile/update',[IndexController::class, 'userUpdate'])->name('user.profile.update'); 
Route::get('/user/change/password',[IndexController::class, 'userPass'])->name('user.change.password'); 
Route::post('/user/update/password',[IndexController::class, 'passwordUpdate'])->name('user.password.update'); 

//admin brand route
Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class, 'brandView'])->name('all.brand'); 
    Route::post('/store',[BrandController::class, 'brandStore'])->name('store.brand'); 
    Route::get('/edit/{id}',[BrandController::class, 'brandEdit'])->name('edit.brand'); 
    Route::post('/update',[BrandController::class, 'brandUpdate'])->name('update.brand'); 
    Route::get('/delete/{id}',[BrandController::class, 'brandDelete'])->name('delete.brand'); 
});

//admin category route
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class, 'categoryView'])->name('all.category');  
    Route::post('/store',[CategoryController::class, 'categoryStore'])->name('store.category'); 
    Route::get('/edit/{id}',[CategoryController::class, 'categoryEdit'])->name('edit.category'); 
    Route::post('/update',[CategoryController::class, 'categoryUpdate'])->name('update.category'); 
    Route::get('/delete/{id}',[CategoryController::class, 'categoryDelete'])->name('delete.category'); 

    //subcategory
    Route::get('/sub/view',[SubCategoryController::class, 'subCategoryView'])->name('all.subcategory');  
    Route::post('/sub/store',[SubCategoryController::class, 'subCategoryStore'])->name('store.subcategory'); 
    Route::get('/sub/edit/{id}',[SubCategoryController::class, 'subCategoryEdit'])->name('edit.subcategory'); 
    Route::post('/sub/update',[SubCategoryController::class, 'subCategoryUpdate'])->name('update.subcategory'); 
    Route::get('/sub/delete/{id}',[SubCategoryController::class, 'subCategoryDelete'])->name('delete.subcategory'); 

      //Sub subcategory
      Route::get('/sub/sub/view',[SubCategoryController::class, 'subSubCategoryView'])->name('all.subsubcategory');  
      Route::get('/subcategory/ajax/{category_id}',[SubCategoryController::class, 'getSubCat']);  
      Route::get('/subsubcategory/ajax/{subcategory_id}',[SubCategoryController::class, 'getSubSubCat']);  
      Route::post('/sub/sub/store',[SubCategoryController::class, 'subSubCategoryStore'])->name('store.subsubcategory'); 
      Route::get('/sub/sub/edit/{id}',[SubCategoryController::class, 'subSubCategoryEdit'])->name('edit.subsubcategory'); 
      Route::post('/sub/sub/update',[SubCategoryController::class, 'subSubCategoryUpdate'])->name('update.subsubcategory'); 
      Route::get('/sub/sub/delete/{id}',[SubCategoryController::class, 'subSubCategoryDelete'])->name('delete.subsubcategory'); 
});



// //admin product route
Route::prefix('product')->group(function(){
    Route::get('/add',[ProductController::class, 'productAdd'])->name('add.product'); 
    Route::post('/store',[ProductController::class, 'productStore'])->name('store.product'); 
    Route::get('/view',[ProductController::class, 'productView'])->name('all.product');  
    Route::get('/edit/{id}',[ProductController::class, 'productEdit'])->name('edit.product'); 
    Route::get('/detail/{id}',[ProductController::class, 'productDetail'])->name('detail.product'); 
    Route::get('/delete/{id}',[ProductController::class, 'productDelete'])->name('delete.product'); 
    Route::post('/data/update',[ProductController::class, 'productDataUpdate'])->name('update.product'); 
    Route::post('/multi/update',[ProductController::class, 'productMultiUpdate'])->name('update.multi'); 
    Route::post('/thumbnail/update',[ProductController::class, 'productThumbnailUpdate'])->name('update.thumbnail'); 
    Route::get('/multi/delete/{id}',[ProductController::class, 'productMultiDelete'])->name('delete.multi'); 
    Route::get('/inactive/{id}',[ProductController::class, 'productInactive'])->name('inactive.product'); 
    Route::get('/active/{id}',[ProductController::class, 'productActive'])->name('active.product'); 
});


// //admin product route
Route::prefix('slider')->group(function(){
    Route::get('/view',[SliderController::class, 'sliderView'])->name('all.slider');  
    Route::post('/store',[SliderController::class, 'sliderStore'])->name('store.slider'); 
    Route::get('/edit/{id}',[SliderController::class, 'sliderEdit'])->name('edit.slider'); 
    Route::post('/update',[SliderController::class, 'sliderUpdate'])->name('update.slider'); 
    Route::get('/delete/{id}',[SliderController::class, 'sliderDelete'])->name('delete.slider'); 
    Route::get('/inactive/{id}',[SliderController::class, 'sliderInactive'])->name('inactive.slider'); 
    Route::get('/active/{id}',[SliderController::class, 'sliderActive'])->name('active.slider'); 
});
   