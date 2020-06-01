<?php

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

Route::get('/', function () {
    return view('accueil');
});

Auth::routes();

Route::get('accueil', 'HomeController@index')->name('accueil');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminhome', 'IndexController@index')->name('adminhome');
Route::get('/charts', 'PagesController@index')->name('charts');
Route::get('home_admin', 'CollectorController@index')->name('home_admin');
Route::get('/liste_user', 'UserController@index')->name('liste_user');
Route::get('/add_category', 'AddcategoryController@index')->name('add_category')
;
Route::post('/add_category', 'AddcategoryController@create')->name('add_category');
Route::prefix('categories')->group(function () {
    Route::get('/corona', 'CoronaController@index');
    Route::get('/education', 'EducationController@index')->name('education');
    Route::get('/politique', 'PolitiqueController@index')->name('politique');
    Route::get('/economie', 'EconomieController@index')->name('economie');
    Route::get('/sport', 'SportController@index')->name('sport');
    Route::get('/liste', 'AddcategoryController@liste')->name('liste');

    
});

//fakes news

Route::get('/fakenews', 'FakesnewsController@index')->name('fakesnews');
Route::get('/fakenew', 'FakesnewsController@index')->name('fakesnew');
Route::post('/ajouter_fakesnews', 'FakesnewsController@create')->name('ajouter_fakesnews');
Route::post('/ajouter', 'AjouterController@create')->name('ajouter');
Route::get('/liste_fakenews', 'FakesnewsController@show')->name('liste_fakenews');
Route::get('ajouterfakenews', 'AjouterController@index')->name('ajouterfakesnews');
Route::get('liste/{id}', 'FakesnewsController@liste');