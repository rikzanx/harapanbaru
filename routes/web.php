<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImagesProductController;
use App\Http\Controllers\ImagesSliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DeletedInvoiceController;
use App\Http\Controllers\DeletedItemController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SuratPenawaranController;
use Illuminate\Support\Facades\Mail;

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

Route::get('/send-test-email', function () {
    Mail::raw('Testing Laravel email!', function ($message) {
        $message->to('erik.kasbam@gmail.com')->subject('Test Email');
    });

    return 'Test email sent!';
});

Route::get('/', [CustomAuthController::class, 'index'])->name('index');
// Route::get('about',[PageController::class, 'about'])->name('about');
// Route::get('contact',[PageController::class, 'contact'])->name('contact');
// Route::get('product',[PageController::class, 'product'])->name('product');
// Route::get('product/{slug}',[PageController::class, 'productdetail'])->name('product-detail');

Route::get('admin/login', [CustomAuthController::class, 'index'])->name('login');
Route::group(['prefix' => 'admin'],function(){
    Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
    // Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
    // Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
    Route::get('/',[AdminPageController::class, 'index'])->name('admin.dashboard');
    Route::resource('kategori', CategoryController::class);
    Route::resource('perusahaan',CompanyController::class);
    Route::resource('slider',ImagesSliderController::class);
    Route::resource('produk',ProductController::class);
    Route::resource('invoice',InvoiceController::class);
    Route::resource('item',ItemController::class);
    Route::resource('deletedinvoice',DeletedInvoiceController::class);
    Route::resource('deleteditem',DeletedItemController::class);
    Route::resource('password',PasswordController::class);
    Route::resource('penawaran',PenawaranController::class);
    Route::resource('wallet',WalletController::class);
    Route::resource('transaction',TransactionController::class);
    Route::resource('surat-penawaran',SuratPenawaranController::class);

    Route::get('proforma/invoice/{id}',[InvoiceController::class, 'show_proform'])->name("show_proform");
    Route::get('suratjalan/invoice/{id}',[InvoiceController::class, 'surat_jalan'])->name("surat_jalan");
    Route::get('invoice-tagihan/{id}',[InvoiceController::class,'invoice_tagihan'])->name("invoice-tagihan");
});
