<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LouerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;

Route::get('/',[GuestController::class,'home']);
Route::get('/product/details/{id}',[GuestController::class,'productDetails']);
Route::get('/products/{idcategory}/liste',[GuestController::class,'shop']);
Route::post('/products/search',[GuestController::class,'search']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware('auth','admin');
#route categories
Route::get('/admin/categories',[CategorieController::class,'index'])->middleware('auth','admin');
Route::post('/admin/categories/store',[CategorieController::class,'store'])->middleware('auth','admin');
Route::post('/admin/categories/update',[CategorieController::class,'update'])->middleware('auth','admin');
Route::get('/admin/categories/{id}/delete',[CategorieController::class,'destroy'])->middleware('auth','admin');
#route products
Route::get('/admin/products',[ProductController::class,'index'])->middleware('auth','admin');
Route::post('/admin/products/store',[ProductController::class,'store'])->middleware('auth','admin');
Route::post('/admin/products/update',[ProductController::class,'update'])->middleware('auth','admin');
Route::get('/admin/products/{id}/delete',[ProductController::class,'destroy'])->middleware('auth','admin');
#profile admine 
Route::get('/admin/profile',[AdminController::class,'profile'])->middleware('auth','admin');
Route::post('/admin/profile/update',[AdminController::class,'updateProfile'])->middleware('auth','admin');

Route::get('/admin/clients',[AdminController::class,'clients'])->middleware('auth','admin');
Route::get('/admin/clients/{iduser}/bloquer',[AdminController::class,'BloquerUser'])->middleware('auth','admin');
Route::get('/admin/clients/{iduser}/activer',[AdminController::class,'ActiverUser'])->middleware('auth','admin');

Route::get('/client/bloquer',[ClientController::class,'afficherMessageBloquer'])->middleware('auth');

Route::get('/admin/commandes',[AdminController::class,'commandes'])->middleware('auth','admin');

Route::post('/admin/product/search',[ProductController::class,'searchProduct'])->middleware('auth','admin');


Route::get('/client/dashboard',[ClientController::class,'dashboard'])->middleware('auth','is_active');
Route::get('/client/profile',[ClientController::class,'profile'])->middleware('auth','is_active');
Route::post('/client/profile/update',[ClientController::class,'updateProfile'])->middleware('auth','is_active');

Route::post('/client/review/store',[ClientController::class,'addReview'])->middleware('auth','is_active');

Route::post('/client/order/store',[CommandeController::class,'store'])->middleware('auth','is_active');

Route::get('/client/cart',[ClientController::class,'cart'])->middleware('auth','is_active');
Route::get('/client/lc/{idlc}/destroy',[CommandeController::class,'ligneCommandeDestroy'])->middleware('auth','is_active');
Route::post('/client/checkout',[ClientController::class,'checkout'])->middleware('auth','is_active');
Route::get('/client/commandes',[ClientController::class,'mescommandes'])->middleware('auth','is_active');


#route products
Route::get('/louer/products',[LouerController::class,'index'])->middleware('auth','is_active');
Route::get('/louer/details/{id}',[LouerController::class,'detail'])->middleware('auth','is_active');

Route::get('/louer/product/create',[LouerController::class,'create'])->middleware('auth','admin');
Route::post('/louer/product/store',[LouerController::class,'store'])->middleware('auth','admin');
Route::get('/louer/product/edit/{id}',[LouerController::class,'edit'])->middleware('auth','admin');
Route::post('/louer/product/update',[LouerController::class,'update'])->middleware('auth','admin');
Route::get('/louer/product/detele/{id}',[LouerController::class,'destroy'])->middleware('auth','admin');

Route::get('/form/louer/{id}',[LouerController::class,'form'])->middleware('auth','is_active');
Route::post('/form/store',[LouerController::class,'upload'])->middleware('auth','is_active');


Route::get('/admin/louers',[LouerController::class,'liste'])->middleware('auth','admin');
Route::get('/admin/louers/commande',[LouerController::class,'commades'])->middleware('auth','admin');
