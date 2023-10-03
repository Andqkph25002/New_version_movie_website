<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LeedMovieController;
use App\Http\Controllers\LinkMovieController;
use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'home'])->name('home.page');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}', [IndexController::class, 'watch'])->name('watch.page');
Route::get('/tap-phim', [IndexController::class, 'episode'])->name('episode.page');
Route::get('/nam/{year}', [IndexController::class, '_year']);
Route::get('/tag/{tag}', [IndexController::class, '_tag']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('episode', EpisodeController::class);
Route::resource('movie', MovieController::class);
Route::resource('link', LinkMovieController::class);

Route::post('resorting-country', [CountryController::class, 'resorting_country'])->name('resorting_country');
Route::get('/update-year-movie', [MovieController::class, 'updateYear']);
Route::get('/update-season-movie', [MovieController::class, 'updateSeason']);
Route::get('/update-topview-movie', [MovieController::class, 'updateTopView']);
Route::get('/filter-topview-movie-default', [MovieController::class, 'filterTopViewDefault']);
Route::post('/filter-topview-movie', [MovieController::class, 'filterTopView']);
Route::get('/tim-kiem', [IndexController::class, 'timKiemPhim'])->name('tim-kiem');
Route::get('/chon-phim', [EpisodeController::class, 'select_movie'])->name('select_movie');
Route::get('/loc-phim', [IndexController::class, 'filter_movie'])->name('locphim');

Route::get('/update-category-movie', [MovieController::class, 'updateCategoryMovie']);
Route::get('/update-country-movie', [MovieController::class, 'updateCountryMovie']);
Route::get('/update-status-movie', [MovieController::class, 'updateStatusMovie']);
Route::get('/update-resolution-movie', [MovieController::class, 'updateResolutionMovie']);
Route::get('/update-phude-movie', [MovieController::class, 'updatePhudeMovie']);
Route::get('/update-phimhot-movie', [MovieController::class, 'updatePhimhotMovie']);
Route::get('/update-thuocphim-movie', [MovieController::class, 'updateThuocphimMovie']);
Route::post('/update-image-movie', [MovieController::class, 'updateImageMovie'])->name('update-image-movie-ajax');
Route::post('/rating', [IndexController::class, 'add_rating'])->name('add-rating');




Route::controller(LoginGoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});



//Route leed movie
Route::get('/leech-movie', [LeedMovieController::class, 'leech_movie'])->name('leech-movie');
Route::get('/leech-detail-movie/{slug}', [LeedMovieController::class, 'leech_detail_movie'])->name('leech-detail-movie');
Route::post('/leech-movie-store/{slug}', [LeedMovieController::class, 'leech_movie_store'])->name('leech-movie-store');
Route::get('/leech-episode-movie/{slug}', [LeedMovieController::class, 'leech_episode_movie'])->name('leech-episode-movie');
Route::post('/leech-episode-store/{slug}', [LeedMovieController::class, 'leech_episode_store'])->name('leech-episode-store');