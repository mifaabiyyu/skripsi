<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\Frontend\LandingsController::class, 'index'])->name('landing.home');
Route::get('/pengurus', [App\Http\Controllers\Frontend\PengurusController::class, 'index'])->name('pengurus.index');

//PROKER
Route::get('/program-kerja/{departemen}', [App\Http\Controllers\Frontend\ProgramKerjasController::class, 'index'])->name('proker.index');

//GALLERY
Route::get('/gallery-himatifa', [App\Http\Controllers\Frontend\GalleryController::class, 'index'])->name('galleryhima.index');

//? CALENDAR
Route::get('/calendar-himatifa', [App\Http\Controllers\Frontend\CalendarHimaController::class, 'index'])->name('calendarhima.index');

//* BERITA
Route::get('/berita-himatifa', [App\Http\Controllers\Frontend\BeritaHimatifaController::class, 'index'])->name('beritahima.index');
Route::get('/berita-himatifa/{category}', [App\Http\Controllers\Frontend\BeritaHimatifaController::class, 'showkategori'])->name('kategori.beritahima');
Route::get('/berita-himatifa/detail/{slug}', [App\Http\Controllers\Frontend\BeritaHimatifaController::class, 'show'])->name('beritahima.show');

//!CONTACT US
Route::get('/contact-us/deteksi-kesalahan-ketik', [App\Http\Controllers\ContactusController::class, 'pendaftaran'])->name('pendaftaran.hima');
Route::post('/contact-us/deteksi-kesalahan-ketik/hasil', [App\Http\Controllers\ContactusController::class, 'jarowinkler'])->name('jaro.distance.hima');
Route::post('/contact-us/deteksi-kesalahan-ketik/pdf-text', [App\Http\Controllers\ContactusController::class, 'pdftext'])->name('pdf-text.store');
Route::post('/contact-us/kritik-saran/store', [App\Http\Controllers\ContactusController::class, 'store_kritiksaran'])->name('kritiksaran.store');

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('roles', App\Http\Controllers\Backend\RolesController::class);
    Route::get('/update-profile', [App\Http\Controllers\Backend\UpdateProfileController::class, 'index'])->name('update-profile.index');
    Route::post('/update-profile/update', [App\Http\Controllers\Backend\UpdateProfileController::class, 'update'])->name('update-profile.update');
    Route::resource('users', App\Http\Controllers\Backend\UsersController::class);
    Route::resource('sliders', App\Http\Controllers\Backend\SlidersController::class);

    // Pengurus
    Route::resource('pengurus/visimisi', App\Http\Controllers\Backend\Anggota\VisimisiController::class);

    // KAHIMA WAKAHIMA
    Route::get('/pengurus/bph', [App\Http\Controllers\Backend\Anggota\BphController::class, 'index'])->name('bph.index');
    Route::get('/pengurus/bph/create', [App\Http\Controllers\Backend\Anggota\BphController::class, 'create'])->name('bph.create');
    Route::post('/pengurus/bph/store', [App\Http\Controllers\Backend\Anggota\BphController::class, 'store'])->name('bph.store');
    Route::get('/pengurus/bph/edit/{id}', [App\Http\Controllers\Backend\Anggota\BphController::class, 'edit'])->name('bph.edit');
    Route::post('/pengurus/bph/update/{id}', [App\Http\Controllers\Backend\Anggota\BphController::class, 'update'])->name('bph.update');
    Route::delete('/pengurus/bph/delete/{id}', [App\Http\Controllers\Backend\Anggota\BphController::class, 'destroy'])->name('bph.destroy');

    // SEKRETARIS BENDAHARA
    Route::get('/pengurus/bph/createsb', [App\Http\Controllers\Backend\Anggota\BphController::class, 'createsb'])->name('bph.createsb');
    Route::post('/pengurus/bph/storesb', [App\Http\Controllers\Backend\Anggota\BphController::class, 'storesb'])->name('bph.storesb');
    Route::get('/pengurus/bph/editsb/{id}', [App\Http\Controllers\Backend\Anggota\BphController::class, 'editsb'])->name('bph.editsb');
    Route::post('/pengurus/bph/updatesb/{id}', [App\Http\Controllers\Backend\Anggota\BphController::class, 'updatesb'])->name('bph.updatesb');
    Route::delete('/pengurus/bph/deletesb/{id}', [App\Http\Controllers\Backend\Anggota\BphController::class, 'destroysb'])->name('bph.destroysb');

    // ANGGOTA
    Route::resource('pengurus/anggota', App\Http\Controllers\Backend\Anggota\AnggotaController::class);
    Route::resource('pengurus/departemen', App\Http\Controllers\Backend\Anggota\DepartemenController::class);

    Route::resource('pengurus/deskbph', App\Http\Controllers\Backend\Anggota\DeskripsiBPHController::class);
    Route::resource('pengurus/deskanggota', App\Http\Controllers\Backend\Anggota\DeskripsiAnggotaController::class);

    //Gallery
    Route::get('/gallery', [App\Http\Controllers\Backend\GallerysController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [App\Http\Controllers\Backend\GallerysController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [App\Http\Controllers\Backend\GallerysController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/edit/{id}', [App\Http\Controllers\Backend\GallerysController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/update/{id}', [App\Http\Controllers\Backend\GallerysController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/delete/{id}', [App\Http\Controllers\Backend\GallerysController::class, 'destroy'])->name('gallery.destroy');

    Route::get('/category/create', [App\Http\Controllers\Backend\GallerysController::class, 'createcat'])->name('category.create');
    Route::post('/category/store', [App\Http\Controllers\Backend\GallerysController::class, 'storecat'])->name('category.store');
    Route::get('/category/edit/{id}', [App\Http\Controllers\Backend\GallerysController::class, 'editcat'])->name('category.edit');
    Route::post('/category/update/{id}', [App\Http\Controllers\Backend\GallerysController::class, 'updatecat'])->name('category.update');
    Route::delete('/category/delete/{id}', [App\Http\Controllers\Backend\GallerysController::class, 'destroycat'])->name('category.destroy');


    //Calendar
    Route::resource('calendar/manage-calendar', App\Http\Controllers\Backend\CalendarsController::class);

    //!BERITA
    Route::get('/berita/manage-berita', [App\Http\Controllers\Backend\Berita\BeritasController::class, 'index'])->name('manage-berita.index');
    Route::get('/berita/manage-berita/create', [App\Http\Controllers\Backend\Berita\BeritasController::class, 'create'])->name('manage-berita.create');
    Route::post('/berita/manage-berita/store', [App\Http\Controllers\Backend\Berita\BeritasController::class, 'store'])->name('manage-berita.store');
    Route::get('/berita/manage-berita/edit/{slug}', [App\Http\Controllers\Backend\Berita\BeritasController::class, 'edit'])->name('manage-berita.edit');
    Route::post('/berita/manage-berita/update/{id}', [App\Http\Controllers\Backend\Berita\BeritasController::class, 'update'])->name('manage-berita.update');
    Route::delete('/berita/manage-berita/destroy/{id}', [App\Http\Controllers\Backend\Berita\BeritasController::class, 'destroy'])->name('manage-berita.destroy');
    Route::get('/berita/manage-berita/slug', [App\Http\Controllers\Backend\Berita\BeritasController::class, 'slug'])->name('manage-berita.check-slug');


    Route::resource('berita/category-berita', App\Http\Controllers\Backend\Berita\CategoryBeritasController::class);

    //*CONTACT US
    Route::resource('/contact-us-admin', App\Http\Controllers\Backend\ContactUsAdminController::class);

    //! POPOSAL KEGIATAN
    Route::get('/ajuan-proposal-kegiatan', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'indexhima'])->name('proposal.indexhima');
    Route::get('/ajuan-proposal-kegiatan/prodi', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'indexprodi'])->name('proposal.indexprodi');
    Route::delete('/ajuan-proposal-kegiatan/destroy/{id}', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'destroy'])->name('proposal.destroy');
    Route::get('/ajuan-proposal-kegiatan/fakultas', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'indexfakultas'])->name('proposal.indexfakultas');
    Route::get('/ajuan-proposal-kegiatan/editprodi/{id}', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'editprodi'])->name('proposal.editprodi');
    Route::get('/ajuan-proposal-kegiatan/editfakultas/{id}', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'editfakultas'])->name('proposal.editfakultas');
    Route::post('/ajuan-proposal-kegiatan/updateprodi/{id}', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'updateprodi'])->name('proposal.updateprodi');
    Route::post('/ajuan-proposal-kegiatan/updatefakultas/{id}', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'updatefakultas'])->name('proposal.updatefakultas');
    Route::post('/ajuan-proposal-kegiatan/store-proposal', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'store'])->name('proposal.store');
    Route::get('/ajuan-proposal-kegiatan/{id}', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'show'])->name('proposal.show');
    Route::get('/download-proposal-kegiatan/{file_name}', [App\Http\Controllers\Backend\Proposal\ProposalController::class, 'downloadprop'])->name('proposal.download');

    //? Deteksi KESALAHAN KETIK
    Route::get('/deteksi-kesalahan-ketik', [App\Http\Controllers\Backend\TipografiCheckController::class, 'index'])->name('tipografi.index');
    Route::post('/deteksi-kesalahan-ketik/pdf-text', [App\Http\Controllers\Backend\TipografiCheckController::class, 'pdftext'])->name('tipografi.pdf-text');
    Route::post('/deteksi-kesalahan-ketik/jaro-winkler', [App\Http\Controllers\Backend\TipografiCheckController::class, 'jarowinkler'])->name('tipografi.jaro-winkler');
});
