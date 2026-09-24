<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IctController;
use App\Http\Controllers\Admin\IctFormerPersonnelController;
use App\Http\Controllers\Admin\IctSliderController;
use App\Http\Controllers\Admin\IctAboutusController;
use App\Http\Controllers\Admin\IctDirectorController;
use App\Http\Controllers\Admin\IctTeamController;
use App\Http\Controllers\Admin\IctSupportController;
use App\Http\Controllers\Admin\IctQuicklinksController;
use App\Http\Controllers\Admin\IctGalleryController;
use App\Http\Controllers\Admin\IctInformationController;
use App\Http\Controllers\Admin\IctActivityController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [IctController::class,'index'])->name('ict');
Route::get('about-us/{category}',[IctController::class,'get_all_about_us'])->name('get_all_about_us');
Route::get('newactivity/{id}',[IctController::class,'ict_new_activity'])->name('new_activity');
Route::get('newactivity/{slug}/details',[IctController::class,'ict_newactivity_details'])->name('newactivity_details');
Route::get('activity/{id}',[IctController::class,'get_all_activity'])->name('get_all_activity');
Route::get('activity/{slug}/details',[IctController::class,'get_activity_details'])->name('get_activity_details');
Route::get('director',[IctController::class,'get_director_details'])->name('get_director_details');
Route::get('team/{type}',[IctController::class,'get_all_team_member'])->name('get_all_team_member');
Route::get('team/{slug}/details',[IctController::class,'get_team_details'])->name('get_team_details');
Route::get('former-personnel',[IctController::class,'get_all_former_personnel'])->name('get_all_former_personnel');
Route::get('information/{type}',[IctController::class,'get_all_information'])->name('get_all_information');
Route::get('information/{infotype}/{slug}/details',[IctController::class,'get_information_details'])->name('get_information_details');
Route::get('gallery',[IctController::class,'get_all_gallery'])->name('get_all_gallery');
Route::get('citizen/{slug}', [IctController::class,'citizen_charter'])->name('citizen');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    /**
     *  Former Personnel Routes
     */
    Route::get('admin/former-personnel',[IctFormerPersonnelController::class,'index']) ->name('ict-former-personnel-index');
    Route::get('admin/former-personnel/create',[IctFormerPersonnelController::class,'create']) ->name('ict-former-personnel-create');
    Route::post('admin/former-personnel/store',[IctFormerPersonnelController::class,'store'])->name('ict-former-personnel-store');
    Route::get('admin/former-personnel/edit/{id}',[IctFormerPersonnelController::class,'edit']) ->name('ict-former-personnel-edit');
    Route::post('admin/former-personnel/update/{id}',[IctFormerPersonnelController::class,'update']) ->name('ict-former-personnel-update');
    Route::delete('admin/former-personnel/destroy/{id}',[IctFormerPersonnelController::class,'destroy'])->name('ict-former-personnel-destroy');

/**
 *  Slider Routes
 *
 */
Route::get('admin/slider', [IctSliderController::class,'index'])->name('ict-slider-index');
Route::get('admin/slider/create',  [IctSliderController::class,'create'])->name('ict-slider-create');
Route::post('admin/slider/store',  [IctSliderController::class,'store'])->name('ict-slider-store');
Route::get('admin/slider/edit/{id}', [IctSliderController::class,'edit']) ->name('ict-slider-edit');
Route::post('admin/slider/update/{id}',  [IctSliderController::class,'update'])->name('ict-slider-update');
Route::delete('admin/slider/destroy/{id}',  [IctSliderController::class,'destroy'])->name('ict-slider-destroy');


/**
 *  About Us Routes
 *
 */
Route::get('admin/about-us', [IctAboutusController::class,'index'])->name('ict-about-us-index');
Route::get('admin/about-us/create',[IctAboutusController::class,'create']) ->name('ict-about-us-create');
Route::post('admin/about-us/store', [IctAboutusController::class,'store'])->name('ict-about-us-store');
Route::get('admin/about-us/edit/{id}',[IctAboutusController::class,'edit'])->name('ict-about-us-edit');
Route::post('admin/about-us/update/{id}',[IctAboutusController::class,'update'])->name('ict-about-us-update');
Route::delete('admin/about-us/destroy/{id}',[IctAboutusController::class,'destroy'])->name('ict-about-us-destroy');

/**
 *  Team Routes
 *
 */
Route::get('/admin/team', [IctTeamController::class,'index'])->name('ict-team-index');
Route::get('/admin/team/create',[IctTeamController::class,'create'])->name('ict-team-create');
Route::post('/admin/team/store', [IctTeamController::class,'store'])->name('ict-team-store');
Route::get('/admin/team/edit/{id}',[IctTeamController::class,'edit']) ->name('ict-team-edit');
Route::post('/admin/team/update/{id}',[IctTeamController::class,'update'])->name('ict-team-update');
Route::delete('/admin/team/destroy/{id}',[IctTeamController::class,'destroy'])->name('ict-team-destroy');

/**
 *  Director Routes
 *
 */
Route::get('admin/director', [IctDirectorController::class,'index'])->name('ict-director-index');
Route::get('admin/director/create',[IctDirectorController::class,'create']) ->name('ict-director-create');
Route::post('admin/director/store',[IctDirectorController::class,'store'])->name('ict-director-store');
Route::get('admin/director/edit/{id}',[IctDirectorController::class,'edit'])->name('ict-director-edit');
Route::post('admin/director/update/{id}',[IctDirectorController::class,'update'])->name('ict-director-update');
Route::delete('admin/director/destroy/{id}',[IctDirectorController::class,'destroy'])->name('ict-director-destroy');
/**
 *  Activity Routes
 *
 */
Route::get('admin/activity', [IctActivityController::class,'index'])->name('ict-activity-index');
Route::get('admin/activity/create',[IctActivityController::class,'create'])->name('ict-activity-create');
Route::post('admin/activity/store',[IctActivityController::class,'store'])->name('ict-activity-store');
Route::get('admin/activity/edit/{id}',[IctActivityController::class,'edit'])->name('ict-activity-edit');
Route::post('admin/activity/update/{id}', [IctActivityController::class,'update'])->name('ict-activity-update');
Route::delete('admin/activity/destroy/{id}',[IctActivityController::class,'destroy'])->name('ict-activity-destroy');
Route::get('admin/activity/date-format/change',[IctActivityController::class,'convert_date_format'])->name('ict-activity-convert_date_format');

/**
 *  Support Routes
 *
 */
Route::get('admin/support', [IctSupportController::class,'index'])->name('ict-support-index');
Route::get('admin/support/create',[IctSupportController::class,'create'])->name('ict-support-create');
Route::post('admin/support/store',[IctSupportController::class,'store'])->name('ict-support-store');
Route::get('admin/support/edit/{id}',[IctSupportController::class,'edit'])->name('ict-support-edit');
Route::post('admin/support/update/{id}', [IctSupportController::class,'update'])->name('ict-support-update');
Route::delete('admin/support/destroy/{id}',[IctSupportController::class,'destroy'])->name('ict-support-destroy');
Route::get('admin/support/date-format/change',[IctSupportController::class,'convert_date_format'])->name('ict-support-convert_date_format');


/**
 *  Information Routes
 *
 */
Route::get('admin/information', [IctInformationController::class,'index'])->name('ict-information-index');
Route::get('admin/information/create',  [IctInformationController::class,'create'])->name('ict-information-create');
Route::post('admin/information/store', [IctInformationController::class,'store'])->name('ict-information-store');
Route::get('admin/information/edit/{id}', [IctInformationController::class,'edit']) ->name('ict-information-edit');
Route::post('admin/information/update/{id}', [IctInformationController::class,'update'])->name('ict-information-update');
Route::delete('admin/information/destroy/{id}', [IctInformationController::class,'destroy'])->name('ict-information-destroy');

/**
 *  Gallery Routes
 *
 */
Route::get('admin/gallery', [IctGalleryController::class,'index'])->name('ict-gallery-index');
Route::get('admin/gallery/create',[IctGalleryController::class,'create'])->name('ict-gallery-create');
Route::post('admin/gallery/store', [IctGalleryController::class,'store'])->name('ict-gallery-store');
Route::get('admin/gallery/edit/{id}',[IctGalleryController::class,'edit'])->name('ict-gallery-edit');
Route::post('admin/gallery/update/{id}',[IctGalleryController::class,'update'])->name('ict-gallery-update');
Route::delete('admin/gallery/destroy/{id}',[IctGalleryController::class,'destroy'])->name('ict-gallery-destroy');

/**
 *  Quicklinks Routes
 *
 */
Route::get('admin/quicklinks',[IctQuicklinksController::class,'index'])->name('ict-quicklinks-index');
Route::get('admin/quicklinks/create',[IctQuicklinksController::class,'create'])->name('ict-quicklinks-create');
Route::post('admin/quicklinks/store',[IctQuicklinksController::class,'store'])->name('ict-quicklinks-store');
Route::get('admin/quicklinks/edit/{id}',[IctQuicklinksController::class,'edit'])->name('ict-quicklinks-edit');
Route::post('admin/quicklinks/update/{id}',[IctQuicklinksController::class,'update'])->name('ict-quicklinks-update');
Route::delete('admin/quicklinks/destroy/{id}',[IctQuicklinksController::class,'destroy'])->name('ict-quicklinks-destroy');
}); // end auth middleware group

require __DIR__.'/auth.php';
