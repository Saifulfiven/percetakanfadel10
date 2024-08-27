<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TracerStudyPageController;
use \App\Http\Controllers\LoginPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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

// saiful print baru saya oke kucing
Route::get('/', 'App\Http\Controllers\LandingPageController@index')->name('landingpage');
Route::get('/detailproduk/{slug}', 'App\Http\Controllers\LandingPageController@detailproduk')->where('slug', '[a-z0-9\-]+');
Route::get('/semua-produk', 'App\Http\Controllers\LandingPageController@semuaproduk')->name('semua-produk');
Route::get('/hubungi-kami', 'App\Http\Controllers\LandingPageController@hubungikami')->name('hubungi-kami');

//Controller LoginPageController
Route::get('/login', 'App\Http\Controllers\LoginPageController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginPageController@authenticate')->name('login');
Route::get('/logout', 'App\Http\Controllers\LoginPageController@actionlogout')->name('logout');

//REGISTER
Route::get('daftar', [LoginPageController::class, 'register'])->name('daftar');
Route::post('daftar', [LoginPageController::class, 'daftarPengguna'])->name('aksidaftar');

//Route::get('/landingpage', [LandingPageController::class, 'index']);

//Controller DashboaedPageController
Route::get('/dashboard', 'App\Http\Controllers\DashboardPageController@index');

//Master DASHBOARD
//Produk Masuk
Route::get('/admin/produk', 'App\Http\Controllers\ProdukPageController@home');
Route::get('/admin/produk/tambah', 'App\Http\Controllers\ProdukPageController@tambah');
Route::post('/admin/produk/tambah', 'App\Http\Controllers\ProdukPageController@simpan');
Route::get('/admin/produk/ubah/{id}', 'App\Http\Controllers\ProdukPageController@ubahproduk');
Route::post('/admin/produk/ubah/{id}', 'App\Http\Controllers\ProdukPageController@updateproduk');
Route::get('/admin/produk/hapus/{id}', 'App\Http\Controllers\ProdukPageController@hapus');

//penjualan Masuk
Route::get('/admin/penjualan', 'App\Http\Controllers\PenjualanDashboardController@index');
Route::get('/admin/penjualan/detail/{kodeorder}', 'App\Http\Controllers\PenjualanDashboardController@detail');
Route::post('/admin/penjualan/tambah', 'App\Http\Controllers\PenjualanDashboardController@simpan');
Route::get('/admin/penjualan/ubah/{id}', 'App\Http\Controllers\PenjualanDashboardController@ubahpenjualan');
Route::post('/admin/penjualan/ubah/{id}', 'App\Http\Controllers\PenjualanDashboardController@updatepenjualan');
Route::get('/admin/penjualan/hapus/{id}', 'App\Http\Controllers\PenjualanDashboardController@hapus');
Route::post('/admin/penjualan/updatestatuspengerjaan/{id}', 'App\Http\Controllers\PenjualanDashboardController@updatestatuspengerjaan');
Route::post('/admin/penjualan/updatestatus/{id}', 'App\Http\Controllers\PenjualanDashboardController@updatestatusorder');

//Master kategori
Route::get('/admin/kategori/', 'App\Http\Controllers\ProdukPageController@tambahkategori');
Route::post('/admin/kategori/', 'App\Http\Controllers\ProdukPageController@simpankategori');
Route::get('/admin/kategori/{id}', 'App\Http\Controllers\ProdukPageController@ubahkategori');
Route::post('/admin/kategori/update', 'App\Http\Controllers\ProdukPageController@updatekategori');
Route::get('/admin/kategori/hapus/{id}', 'App\Http\Controllers\ProdukPageController@hapuskategori');


// Login Master
Route::get('/master-login', 'App\Http\Controllers\LoginPageController@loginmaster')->name('login');
Route::post('/master-login', 'App\Http\Controllers\LoginPageController@authenticatemaster')->name('login');

//Product
Route::resource('products', ProductController::class);

//Cart Controller
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::patch('cart/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');

//Selesai Pembelian
Route::get('/selesaipembelian', 'App\Http\Controllers\PenjualanPageController@simpanPenjualan')->name('selesaipembelian');
Route::get('/pesanpenjualan', 'App\Http\Controllers\PenjualanPageController@pesanpenjualan')->name('pesanpenjualan');
Route::get('/riwayatorder', 'App\Http\Controllers\PenjualanPageController@riwayatorder')->name('riwayatorder');
Route::get('/riwayatorder/{kodeorder}', 'App\Http\Controllers\PenjualanPageController@detail');
Route::get('/pembayaran/{kodeorder}', 'App\Http\Controllers\PenjualanPageController@pembayaran')->name('pembayaran');
Route::post('/pembayaran/{kodeorder}', 'App\Http\Controllers\PenjualanPageController@pembayaranselesai')->name('pembayaranselesai');