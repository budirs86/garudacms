<?php

use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LogoController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\FileController;

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

//Activate on production env
if (App::environment('production')) {
    URL::forceScheme('https');
}

//frontend route
Route::get('/',[FrontController::class, 'home'])->name('home');

Route::get('berita',[FrontController::class, 'berita'])->name('daftar_berita');
Route::get('berita_detail/{id}',[FrontController::class, 'berita_detail'])->name('berita_detail');
Route::post('berita_search',[FrontController::class, 'berita_search'])->name('cari_berita');
Route::get('berita_category',[FrontController::class, 'berita_category'])->name('berita_category');

Route::get('pengumuman',[FrontController::class, 'pengumuman'])->name('daftar_pengumuman');
Route::get('pengumuman_detail/{id}',[FrontController::class, 'pengumuman_detail'])->name('pengumuman_detail');
Route::get('agenda',[FrontController::class, 'agenda'])->name('daftar_agenda');
Route::get('agenda_detail/{id}',[FrontController::class, 'agenda_detail'])->name('agenda_detail');
Route::get('pages',[FrontController::class, 'pages'])->name('list_pages');
Route::get('pages_detail/{id}',[FrontController::class, 'pages_detail'])->name('pages_detail');

Route::get('gallery',[FrontController::class, 'gallery'])->name('daftar_gallery');
Route::get('gallery_detail/{id}',[FrontController::class, 'gallery_detail'])->name('gallery_detail');

Route::get('file',[FrontController::class, 'file'])->name('daftar_file');
Route::get('file_detail/{id}',[FrontController::class, 'file_detail'])->name('file_detail');

Route::get('info',[FrontController::class, 'info'])->name('daftar_info');
Route::get('info_detail/{id}',[FrontController::class, 'info_detail'])->name('info_detail');

Route::get('aplikasi',[FrontController::class, 'aplikasi'])->name('daftar_aplikasi');
Route::get('opd',[FrontController::class, 'opd'])->name('daftar_opd');




Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])
    ->name('dashboard');

});

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    
    
    //Unit and subdomain
    Route::get('admin/unit_kerja', [UnitController::class, 'home'])
    ->name('unit_kerja');
    Route::get('admin/unit_kerja/create', [UnitController::class, 'create'])
    ->name('unit_kerja_create');
    Route::post('admin/unit_kerja/store}', [UnitController::class, 'store'])
    ->name('unit_kerja_store');
    Route::delete('admin/unit_kerja/delete/{id}', [UnitController::class, 'destroy'])
    ->name('unit_kerja_delete');
    Route::post('admin/unit_kerja/edit}', [UnitController::class, 'update'])
    ->name('unit_kerja_update');
    Route::get('admin/unit_kerja/edit/{id}', [UnitController::class, 'edit'])
    ->name('unit_kerja_edit');

    //users
    Route::get('admin/users', [UserController::class, 'home'])
    ->name('users');
    Route::get('admin/users/create', [UserController::class, 'create'])
    ->name('users_create');
    Route::delete('admin/users/delete/{id}', [UserController::class, 'destroy'])
    ->name('users_delete');
    Route::post('admin/users/edit', [UserController::class, 'update'])
    ->name('users_update');
    Route::post('admin/users/store', [UserController::class, 'store'])
    ->name('users_store');
    Route::get('admin/users/edit/{id}', [UserController::class, 'edit'])
    ->name('users_edit');


//berita
    Route::get('admin/list_berita', [BeritaController::class, 'list_berita'])->name('list_berita');
    Route::get('admin/berita/list_edit/{id}', [BeritaController::class, 'list_edit'])->name('list_berita_edit');
    Route::post('admin/berita/list_update', [BeritaController::class, 'list_update'])->name('list_berita_update');
  
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    
    //halaman
    Route::get('admin/halaman', [PagesController::class, 'home'])
    ->name('halaman');
    Route::get('admin/halaman/create', [PagesController::class, 'create'])
    ->name('halaman_create');
    Route::post('admin/halaman/store', [PagesController::class, 'store'])
    ->name('halaman_store');
    Route::delete('admin/halaman/delete/{id}', [PagesController::class, 'destroy'])
    ->name('halaman_delete');
    Route::post('admin/halaman/edit', [PagesController::class, 'update'])
    ->name('halaman_update');
    Route::get('admin/halaman/edit/{id}', [PagesController::class, 'edit'])
    ->name('halaman_edit');

     //Menu
     Route::get('admin/menu', [MenuController::class, 'home'])->name('menu');
     Route::get('admin/menu/create', [MenuController::class, 'create'])->name('menu_create');
     Route::post('admin/menu/store', [MenuController::class, 'store'])->name('menu_store');
     Route::get('admin/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu_edit');
     Route::post('admin/menu/update', [MenuController::class, 'update'])->name('menu_update');
     Route::delete('admin/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menu_destroy');
     
     //pengumuman
     Route::get('admin/pengumuman', [PengumumanController::class, 'home'])->name('pengumuman');
     Route::get('admin/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman_create');
     Route::post('admin/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman_store');
     Route::get('admin/pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->name('pengumuman_edit');
     Route::post('admin/pengumuman/update', [PengumumanController::class, 'update'])->name('pengumuman_update');
     Route::delete('admin/pengumuman/delete/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman_destroy');
     
    //category berita
    Route::get('admin/category', [CategoryController::class, 'home'])->name('category');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category_create');
    Route::post('admin/category/store', [CategoryController::class, 'store'])->name('category_store');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
    Route::post('admin/category/update', [CategoryController::class, 'update'])->name('category_update');
    Route::delete('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category_destroy');
    
    
     //berita
     Route::get('admin/berita', [BeritaController::class, 'home'])->name('berita');
     Route::get('admin/berita/create', [BeritaController::class, 'create'])->name('berita_create');
     Route::post('admin/berita/store', [BeritaController::class, 'store'])->name('berita_store');
     Route::get('admin/berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita_edit');
     Route::post('admin/berita/update', [BeritaController::class, 'update'])->name('berita_update');
     Route::delete('admin/berita/delete/{id}', [BeritaController::class, 'destroy'])->name('berita_destroy');

    //slide
    Route::get('admin/slide', [SlideController::class, 'home'])->name('slide');
    Route::get('admin/slide/create', [SlideController::class, 'create'])->name('slide_create');
    Route::post('admin/slide/store', [SlideController::class, 'store'])->name('slide_store');
    Route::get('admin/slide/edit/{id}', [SlideController::class, 'edit'])->name('slide_edit');
    Route::post('admin/slide/update', [SlideController::class, 'update'])->name('slide_update');
    Route::delete('admin/slide/delete/{id}', [SlideController::class, 'destroy'])->name('slide_destroy');

     //link
     Route::get('admin/link', [LinkController::class, 'home'])->name('link');
     Route::get('admin/link/create', [LinkController::class, 'create'])->name('link_create');
     Route::post('admin/link/store', [LinkController::class, 'store'])->name('link_store');
     Route::get('admin/link/edit/{id}', [LinkController::class, 'edit'])->name('link_edit');
     Route::post('admin/link/update', [LinkController::class, 'update'])->name('link_update');
     Route::delete('admin/link/delete/{id}', [LinkController::class, 'destroy'])->name('link_destroy');

     //aplikasi
     Route::get('admin/aplikasi', [AplikasiController::class, 'home'])->name('aplikasi');
     Route::get('admin/aplikasi/create', [AplikasiController::class, 'create'])->name('aplikasi_create');
     Route::post('admin/aplikasi/store', [AplikasiController::class, 'store'])->name('aplikasi_store');
     Route::get('admin/aplikasi/edit/{id}', [AplikasiController::class, 'edit'])->name('aplikasi_edit');
     Route::post('admin/aplikasi/update', [AplikasiController::class, 'update'])->name('aplikasi_update');
     Route::delete('admin/aplikasi/delete/{id}', [AplikasiController::class, 'destroy'])->name('aplikasi_destroy');

     //logo dan pimpinan
     Route::get('admin/pimpinan', [PimpinanController::class, 'home'])->name('pimpinan');
     Route::get('admin/pimpinan/create', [PimpinanController::class, 'create'])->name('pimpinan_create');
     Route::post('admin/pimpinan/store', [PimpinanController::class, 'store'])->name('pimpinan_store');
     Route::get('admin/pimpinan/edit/{id}', [PimpinanController::class, 'edit'])->name('pimpinan_edit');
     Route::post('admin/pimpinan/update', [PimpinanController::class, 'update'])->name('pimpinan_update');
     Route::delete('admin/pimpinan/delete/{id}', [PimpinanController::class, 'destroy'])->name('pimpinan_destroy');

    Route::get('admin/logo', [LogoController::class, 'home'])->name('logo');
    Route::get('admin/logo/create', [LogoController::class, 'create'])->name('logo_create');
    Route::post('admin/logo/store', [LogoController::class, 'store'])->name('logo_store');
    Route::get('admin/logo/edit/{id}', [LogoController::class, 'edit'])->name('logo_edit');
    Route::post('admin/logo/update', [LogoController::class, 'update'])->name('logo_update');
    Route::delete('admin/logo/delete/{id}', [LogoController::class, 'destroy'])->name('logo_destroy');

    //gallery
    Route::get('admin/gallery', [GalleryController::class, 'home'])->name('gallery');
    Route::get('admin/gallery/create', [GalleryController::class, 'create'])->name('gallery_create');
    Route::post('admin/gallery/store', [GalleryController::class, 'store'])->name('gallery_store');
    Route::get('admin/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery_edit');
    Route::post('admin/gallery/update', [GalleryController::class, 'update'])->name('gallery_update');
    Route::delete('admin/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery_destroy');

    //infografis
    Route::get('admin/info', [InfoController::class, 'home'])->name('info');
    Route::get('admin/info/create', [InfoController::class, 'create'])->name('info_create');
    Route::post('admin/info/store', [InfoController::class, 'store'])->name('info_store');
    Route::get('admin/info/edit/{id}', [InfoController::class, 'edit'])->name('info_edit');
    Route::post('admin/info/update', [InfoController::class, 'update'])->name('info_update');
    Route::delete('admin/info/delete/{id}', [InfoController::class, 'destroy'])->name('info_destroy');

    //File
    Route::get('admin/file', [FileController::class, 'home'])->name('file');
    Route::get('admin/file/create', [FileController::class, 'create'])->name('file_create');
    Route::post('admin/file/store', [FileController::class, 'store'])->name('file_store');
    Route::get('admin/file/edit/{id}', [FileController::class, 'edit'])->name('file_edit');
    Route::post('admin/file/update', [FileController::class, 'update'])->name('file_update');
    Route::delete('admin/file/delete/{id}', [FileController::class, 'destroy'])->name('file_destroy');
    
    //alamat
    Route::get('admin/alamat', [AlamatController::class, 'home'])->name('alamat');
    Route::get('admin/alamat/create', [AlamatController::class, 'create'])->name('alamat_create');
    Route::post('admin/alamat/store', [AlamatController::class, 'store'])->name('alamat_store');
    Route::get('admin/alamat/edit/{id}', [AlamatController::class, 'edit'])->name('alamat_edit');
    Route::post('admin/alamat/update', [AlamatController::class, 'update'])->name('alamat_update');
    Route::delete('admin/alamat/delete/{id}', [AlamatController::class, 'destroy'])->name('alamat_destroy');
  

  
});

require __DIR__.'/auth.php';
