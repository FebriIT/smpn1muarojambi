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

use Illuminate\Http\Request;

use Whoops\Run;

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
Route::get('/sejarah', 'ProfileDepanController@sejarah');
Route::get('/strukturorganisasi', 'ProfileDepanController@strukturorganisasi');
Route::get('/gallery', 'GalleryController@halamandepan');


// Route::post('/register', 'AuthController@postRegister');
// Route::get('/register', 'AuthController@getRegister')->name('register');
Route::post('/login', 'AuthController@postLogin');
Route::get('/login', 'AuthController@getLogin')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');


//route admin
Route::prefix('admin')->middleware('auth', 'checkRole:admin')->group(function () {
    //data guru admin
    Route::get('/dashboard', 'DashboardController@index')->name('admin/dashboard');
    Route::get('/profile', 'ProfileController@index')->name('admin/profile');
    Route::post('/profile/{id}/update', 'ProfileController@update');
    Route::post('/profile/changepassword', 'ProfileController@changepassword');

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
    Route::post('postberita/tambah', [
        'uses' => 'BeritaController@tambah',
        'as' => 'beritaadmin.tambah'
    ]);
    // Route::post('postberita/tambah', 'BeritaController@tambah');
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

    Route::get('/materi', 'MateriController@index')->name('admin/materi');
    Route::post('/materi/tambah', 'MateriController@tambah');
    Route::get('/materi/{id}/hapus', 'MateriController@hapus');
    Route::get('/materi/download/{file_materi}', 'MateriController@getDownload');

    Route::post('/fitur/tambah', function (Request $req) {
        $data = new App\Timeline;
        $data->author = auth()->user()->name;
        $data->message = $req->message;
        $data->save();
        return redirect()->back();
    });

    Route::get('/pengaturan', 'PengaturanController@index')->name('admin/pengaturan');
    Route::post('/pengaturan/tentangkami', 'PengaturanController@tentangkami');
    Route::post('/pengaturan/visimisi', 'PengaturanController@visimisi');
    Route::post('/pengaturan/sejarah', 'PengaturanController@sejarah');
    Route::post('/pengaturan/sosialmedia', 'PengaturanController@sosialmedia');
    Route::post('/pengaturan/admsklh', 'PengaturanController@admsklh');
    Route::post('/pengaturan/perpustakaan', 'PengaturanController@perpustakaan');
    Route::post('/pengaturan/labkom', 'PengaturanController@labkom');
    Route::post('/pengaturan/strukturorganisasi', 'PengaturanController@struktur');


    Route::get('/gallery', 'GalleryController@index')->name('admin/gallery');
    Route::post('/gallery/tambah', 'GalleryController@tambah');
    Route::get('/gallery/{id}/hapus', 'GalleryController@hapus');
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
    Route::get('/materi/download/{file_materi}', 'MateriController@getDownload');

    Route::get('/tugas', 'TugasController@index')->name('guru/tugas');
    Route::post('/tugas/tambah', 'TugasController@tambah');
    Route::get('/tugas/{id}/hapus', 'TugasController@hapus');

    Route::get('/tugas/{id}', 'TugasController@open');
    Route::post('/tugas/{id}/tambahpilgan', 'TugasController@tambahpilgan');
    Route::post('/tugas/{id}/tambahessay', 'TugasController@tambahessay');
    Route::get('/tugas/{id}/hapus-soal-pilgan', 'TugasController@hapuspilgan');
    Route::get('/tugas/{id}/hapus-soal-essay', 'TugasController@hapusessay');
    // Route::get('/tugas/{id}/hasil', 'TugasController@hasil');
    // Route::post('/tugas/{id}/edit', 'TugasController@edit');
    // Route::post('/tugas/{id}/createpilihanganda', 'TugasController@createpilihanganda');
    // Route::post('/tugas/{id}/createessay', 'TugasController@createesay');
    // Route::get('/tugas/download/{jawaban}', 'TugasController@getDownload');
    // Route::get('/tugas/{id}/view', 'TugasController@view');
    // Route::get('/tugas/hasilsiswa/{id}/{tugas_id}', 'TugasController@hasilsiswa');
    // Route::post('/tugas/hasilsiswa/{id}/tambah', 'TugasController@tambahnilai');
    // Route::get('/tugas/hasil/{id}/hapus', 'TugasController@hapushasil');

    Route::get('/kategori', 'KategoriController@index')->name('guru/kategori');
    Route::post('/kategori/tambah', 'KategoriController@tambah');
    Route::get('/kategori/{id}/hapus', 'KategoriController@hapus');
    Route::post('/kategori/{id}/edit', 'KategoriController@edit');

    // Route::get('listberita', 'BeritaController@index')->name('guru/listberita');
    // Route::get('postberita', 'BeritaController@postberita')->name('guru/postberita');
    // Route::post('postberita/tambah', [
    //     'uses' => 'BeritaController@tambah',
    //     'as' => 'beritaguru.tambah'
    // ]);

    // Route::get('/berita/{id}/hapus', 'BeritaController@hapus');
    // Route::get('/berita/edit/{id}', 'BeritaController@edit');
    // Route::post('/berita/update/{id}', 'BeritaController@update');
});

//route siswa
Route::prefix('siswa')->middleware('auth', 'checkRole:siswa')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('siswa/dashboard');
    Route::get('/profile', 'ProfileController@index')->name('siswa/profile');
    Route::post('/profile/{id}/update', 'ProfileController@update');
    Route::post('/profile/changepassword', 'ProfileController@changepassword');

    Route::get('/materi/download/{file_materi}', 'MateriController@getDownload');

    Route::get('/kelas', 'KelasController@opensiswa')->name('siswa/kelas');
    Route::get('/tugas/{id}/takesoal', 'TugasController@takesoal');
    Route::get('/tugas/{id}/soal', 'TugasController@soal');
});


Route::get('/artikel/{slug}', [
    'uses' => 'BeritaController@singlepost',
    'as' => 'site.single.post'
]);
