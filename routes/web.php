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

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index');
Route::get('/pengumuman', 'PengumumanController@halamandepan');
Route::get('/agenda', 'AgendaController@halamandepan');
Route::get('/artikel', 'BeritaController@halamandepan');
Route::get('/artikel/kategori/{kategori_nama}', 'BeritaController@kategoriberita');
Route::get('/tentangkami', 'ProfileDepanController@tentangkami');
Route::get('/visimisi', 'ProfileDepanController@visimisi');
Route::get('/hubungikami', 'ProfileDepanController@hubungikami');
Route::get('/sosialmedia', 'ProfileDepanController@sosialmedia');
Route::get('/administrasikantorsekolah', 'ProfileDepanController@administrasikantorsekolah');
Route::get('/perpustakaan', 'ProfileDepanController@perpustakaan');
Route::get('/labkomputer', 'ProfileDepanController@labkomputer');
Route::get('/guru', 'ProfileDepanController@guru');


// Route::post('/register', 'AuthController@postRegister');
// Route::get('/register', 'AuthController@getRegister')->name('register');
Route::post('/login', 'AuthController@postLogin');
Route::get('/login', 'AuthController@getLogin')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');


//route admin
Route::prefix('admin')->middleware('auth', 'checkRole:admin')->group(function () {
    //data guru admin
    Route::get('/dashboard', 'DashboardController@index')->name('admin/dashboard');

    Route::get('/pengumuman', 'PengumumanController@index')->name('admin/pengumuman');
    Route::post('/pengumuman/tambah', 'PengumumanController@tambah')->name('admin/tambahpengumuman');
    Route::get('/pengumuman/{id}/hapus', 'PengumumanController@hapus');
    Route::post('/pengumuman/{id}/edit', 'PengumumanController@edit');

    Route::get('/agenda', 'AgendaController@index')->name('admin/agenda');
    Route::post('/agenda/tambah', 'AgendaController@tambah');
    Route::get('/agenda/{id}/hapus', 'AgendaController@hapus');
    Route::post('/agenda/{id}/edit', 'AgendaController@edit');

    Route::get('/kategori', 'KategoriController@index')->name('admin/kategori');
    Route::post('/kategori/tambah', 'KategoriController@tambah');
    Route::get('/kategori/{id}/hapus', 'KategoriController@hapus');
    Route::post('/kategori/{id}/edit', 'KategoriController@edit');

    Route::get('listberita', 'BeritaController@index')->name('admin/listberita');
    Route::get('postberita', 'BeritaController@postberita')->name('admin/postberita');
    Route::post('postberita/tambah', 'BeritaController@tambah');
    Route::get('/berita/{id}/hapus', 'BeritaController@hapus');
    Route::get('/berita/edit/{id}', 'BeritaController@edit');
    Route::post('/berita/update/{id}', 'BeritaController@update');

    Route::get('guru', 'GuruController@index')->name('admin/guru');
    Route::post('/guru/tambah', 'GuruController@tambah');
    Route::post('/guru/{id}/edit', 'GuruController@edit');
    Route::get('/guru/{id}/hapus', 'GuruController@hapus');

    Route::get('siswa', 'SiswaController@index')->name('admin/siswa');
    Route::post('/siswa/tambah', 'SiswaController@tambah');
    Route::post('/siswa/{id}/edit', 'SiswaController@edit');
    Route::get('/siswa/{id}/hapus', 'SiswaController@hapus');

    Route::get('/kelas', 'KelasController@index')->name('admin/kelas');
    Route::post('/kelas/tambah', 'KelasController@tambah');
    Route::get('/kelas/open/{id}', 'KelasController@open');
    Route::get('/kelas/{id}/hapus', 'KelasController@hapus');

    Route::get('/mapel', 'MapelController@index')->name('admin/mapel');
    Route::post('/mapel/tambah', 'MapelController@tambah');
    Route::post('/mapel/{id}/edit', 'MapelController@edit');
    Route::get('/mapel/{id}/hapus', 'MapelController@hapus');
});



//rote guru
Route::prefix('guru')->middleware('auth', 'checkRole:guru')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('guru/dashboard');
    Route::get('/profile', 'ProfileController@index')->name('guru/profile');
    Route::post('/profile/{id}/update', 'ProfileController@update');
    Route::post('/profile/changepassword', 'ProfileController@changepassword');

    Route::get('/kelas', 'KelasController@index')->name('guru/kelas');
    Route::get('/kelas/open/{id}', 'KelasController@open');

    Route::get('/mapel', 'MapelController@index')->name('guru/mapel');

    Route::get('/materi', 'MateriController@index')->name('guru/materi');
    Route::post('/materi/tambah', 'MateriController@tambah');
    Route::get('/materi/{id}/hapus', 'MateriController@hapus');
});

//route siswa
Route::prefix('siswa')->middleware('auth', 'checkRole:siswa')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('siswa/dashboard');
    Route::get('/profile', 'ProfileController@index')->name('siswa/profile');
});


Route::get('/artikel/{slug}', [
    'uses' => 'BeritaController@singlepost',
    'as' => 'site.single.post'
]);
