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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/doktorzy', 'DoctorController@index');
Route::get('/doktorzy/edytuj/{id}', 'DoctorController@edit');
Route::post('/doktorzy/edytuj', 'DoctorController@editStore');
Route::get('/doktorzy/nowy', 'DoctorController@create');
Route::post('doktorzy/zapisz', 'DoctorController@store');
Route::get('/doktorzy/specjalizacje/{id}', 'DoctorController@listBySpecialization');
Route::get('/doktorzy/{id}', 'DoctorController@show');
Route::get('/doktorzy/usun/{id}', 'DoctorController@delete');

Route::get('/specjalizacje', 'SpecializationController@index');
Route::get('/specjalizacje/nowa', 'SpecializationController@create');
Route::post('/specjalizacje', 'SpecializationController@store');

Route::get('wizyty', 'VisitController@index');
Route::get('wizyty/nowa', 'VisitController@create');
Route::post('wizyty', 'VisitController@store');

Route::get('/pacjenci', 'PatientController@index')->middleware('auth');
Route::get('/pacjenci/edytuj/{id}', 'PatientController@edit')->middleware('auth');
Route::post('/pacjenci/edytuj', 'PatientController@editStore')->middleware('auth');
Route::get('/pacjenci/nowy', 'PatientController@create');
Route::post('/pacjenci', 'PatientController@store');
Route::get('/pacjenci/{id}', 'PatientController@show')->middleware('auth');
Route::get('/pacjenci/usun/{id}', 'PatientController@delete')->middleware('auth');

////////////////

Route::prefix('admin')->group(function(){
    Route::get('users/{id?}', function ($id = 'brak parametru') {
        return 'Użytkownik '.$id;
    });
});

/* Route::get('/{remek}/{ile?}', function ($remek, $ile = 'Remigiusz') {
    return ucfirst($remek). ' '.ucfirst($ile);
}); */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
