<?php
################################# Auth Controller ################################# 
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

#################################  Home Controller ################################# 
Route::get('/home', 'HomeController@index')->name('home');

#################################  Pages Controller ################################# 
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/Client/recherche', 'PagesController@recherche');
Route::any('/Client/resultat', 'PagesController@resultat');
Route::get( '/Admin/accueil', 'PagesController@accueil');
Route::get('/Admin/gererpannonce', 'PagesController@gererpannonce');
Route::get('/Partenaire/listereservations', 'PagesController@listereservations');
Route::get( '/Partenaire/accueil', 'PagesController@part');


#################################  Voitures Controller ################################# 
Route::get('/Partenaire/ajoutvoiture', 'VoituresController@ajoutvoiture');
Route::post('/Partenaire/ajoutvoiture/update', 'VoituresController@ajoutVoitureSuccess')->name('voiture.add');

#################################  Annonces Controller ################################# 
Route::get('/Partenaire/ajoutannonce', 'AnnoncesController@ajoutannonce');
Route::post('/Partenaire/ajoutannonce', 'AnnoncesController@ajoutannonceSuccess');

Route::get('/Client/recherche', 'AnnoncesController@date');
Route::get('/Client/recherche', 'AnnoncesController@date');

Route::post('/Client/recherche', 'AnnoncesController@date');

Route::get('/Client/city','AnnoncesController@city');
Route::get('/Client/marque','AnnoncesController@marque');
Route::get('/Client/type','AnnoncesController@type');
Route::get('/Client/modele','AnnoncesController@modele');
//Route::get('/Client/submit','AnnoncesController@submit');
Route::get('/Client/resultat','AnnoncesController@submit');





/*

Route::get('/Client/rechercheDate', 'AnnoncesController@rechercheDate');
Route::post('/Client/rechercheDate',  'AnnoncesController@rechercheDate');
*/
Route::get('/Client/resultat', 'AnnoncesController@resultat');
Route::post('/Client/resultat', 'AnnoncesController@resultat');

Route::post('/Client/reserverAnnonce', 'AnnoncesController@reserverAnnonce');
Route::get('/Client/reserverAnnonce', 'AnnoncesController@reserverAnnonce');

#################################  Users Controller #################################
Route::get('/Admin/gererPartenaire', 'UsersController@indexPartenaire');
Route::get('/Admin/gererClient', 'UsersController@indexClient')->name('A_ClientList');
Route::get('/Admin/modifierClient/{id}/edit', 'UsersController@editClient')->name('A_PartneireList');;
Route::post( '/Admin/modifierClient/{id}/edit', 'UsersController@updateUser');
Route::get('/Admin/modifierPartenaire/{id}/edit', 'UsersController@editPartenaire');
Route::post('/Admin/modifierPartenaire/{id}/edit', 'UsersController@updateUser');
Route::delete( '/Admin/gererClient/{id}/delete', 'UsersController@deleteClient');

#################################  Profile Controlle ################################# 
Route::get('/Partenaire/afficherProfile', 'ProfileController@index')->name('profile_partenaire');
Route::get( '/Admin/afficherProfile', 'ProfileController@index')->name('profile_admin');
Route::get( '/Client/afficherProfile', 'ProfileController@index')->name('profile_client');

Route::get( '/Partenaire/modifierProfile', 'ProfileController@update')->name( 'profile_partenaire.update');
Route::get('/Client/modifierProfile', 'ProfileController@update')->name('profile_client.update');
Route::get('/Admin/modifierProfile', 'ProfileController@update')->name('profile_admin.update');

Route::post('/Partenaire/modifierProfile/update', 'ProfileController@updateProfile')->name('profile_partenaire.updateProfile');
Route::post( '/Admin/modifierProfile/update', 'ProfileController@updateProfile')->name( 'profile_admin.updateProfile');
Route::post( '/Client/modifierProfile/update', 'ProfileController@updateProfile')->name( 'profile_client.updateProfile');




