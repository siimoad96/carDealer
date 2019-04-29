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

Route::get('/', 'PagesController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
//Route::get('/auth/register', 'PagesController@register');
//Route::get('/auth/login', 'PagesController@login');

//Route::get('/home', 'HomeController@connected' );



Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

//Client
Route::get('/Client/accueil', 'HomeController@accueilClient');
Route::get('/Client/profil', 'PagesController@profil');
Route::get('/Client/modifierprofil', 'PagesController@modifierprofil');
Route::get('/Client/recherche', 'PagesController@recherche');
Route::get('/Client/resultat', 'PagesController@resultat');

//Admin
Route::get( '/Admin/accueil', 'PagesController@accueil');
Route::get('/Admin/gererPartenaire', 'UsersController@indexPartenaire');
Route::get('/Admin/gererClient', 'UsersController@indexClient');
Route::get('/Admin/gererpannonce', 'PagesController@gererpannonce');
Route::get('/Admin/profil', 'PagesController@profilAdmin');

//partenaire

Route::get('/Partenaire/ajoutvoiture', 'PagesController@ajoutvoiture');
Route::post('/Partenaire/ajoutvoiture', 'VoituresController@ajoutVoitureSuccess');
//Route::post( '/Partenaire/ajoutvoiture', 'VoituresController@uploadImage');


//Route::get('/Partenaire/ajoutannonce', 'PagesController@ajoutannonce');
//Route::post('/Partenaire/ajoutannonce', 'AnnoncesController@ajoutannonceSuccess');

Route::get('/Partenaire/ajoutannonce', 'AnnoncesController@ajoutannonce');
Route::post('/Partenaire/ajoutannonce', 'AnnoncesController@ajoutannonceSuccess');

Route::get('/Partenaire/listereservations', 'PagesController@listereservations');
Route::get( '/Partenaire/accueil', 'PagesController@part');
Route::get('/Partenaire/profil', 'PagesController@profilPartenaire');
Route::get('/Partenaire/modifierprofil', 'PagesController@modifierprofil');

//profile_partnaire

Route::get('/Partenaire/afficherProfile', 'ProfileController@index')->name('profile_partenaire');

//modifier tout profil
Route::get( '/Partenaire/modifierProfile', 'ProfileController@update')->name( 'profile_partenaire.update');
Route::post('/Partenaire/modifierProfile/update', 'ProfileController@updateProfile')->name('profile.updateProfile');


//profile_admin

Route::get('/Admin/profile', 'ProfileController@index')->name('profile_admin');
Route::post('/Admin/profile/update', 'ProfileController@updateProfile')->name('profile.update');

//profile_client

Route::get('/Client/profile', 'ProfileController@index')->name('profile_client');
Route::post('/Client/profile/update', 'ProfileController@updateProfile')->name('profile.update');

// safae
Route::get('/Client/recherche', 'PagesController@recherche');
Route::get('/Client/recherche', 'AnnoncesController@recherche');
Route::post('/Client/recherche', 'AnnoncesController@recherche');

Route::get('/Client/resultat', 'PagesController@resultat');
Route::get('/Client/resultat', 'AnnoncesController@resultat');
Route::post('/Client/resultat', 'AnnoncesController@resultat');


Route::get('/Client/reserverAnnonce', 'AnnoncesController@reserverAnnonce');
Route::post('/Client/reserverAnnonce', 'AnnoncesController@reserverAnnonce');
Route::get('/Client/reserverAnnonce', 'AnnoncesController@reserverAnnonce');