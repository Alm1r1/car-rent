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

//Kthen faqen kryesore
Route::get('/', function () {
    return view('Kreu');
});


Auth::routes();
//Kthen panelin e administrimit te adminit
Route::get('/usermanagement','UserManagementController@index')->name('usermanagement');
//Route i fshirjes se userit
Route::delete('/delete/{email}','UserManagementController@deleteUser')->name('deleteUser');
//Route per kerkimin e nje useri
Route::get('/search/{email}','UserManagementController@findUser')->name('findUser');
//Route qe shfaq formen e ndryshimit te passwordit
Route::get('/profile/changepassword','EditProfileController@showChangePasswordForm')->name('changepassword.view')->middleware('verified');
//Route qe ndryshon passwordin
Route::post('/changePassword','EditProfileController@changePassword')->name('changePassword');
//Route qe ben update te dhenat kryesore te userit
Route::patch('/profile/edit','EditProfileController@update')->name('users.update')->middleware('verified');
//Route qe kthen profilin/llogarine e userit
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


//endpoint ndihmes
Route::get('/makina/createcon/{id}', 'MakinaController@showone');

/*
endpoint qe shfaq te gjithe kontratat neseje je admin do te shfaqen
te gjithe kontratat e cdo useri nese jo do te shfaqen vetem kontratat e user*/
Route::get('/user/kontratat', 'KontrataController@index')->name('kontratatqeradhenie')->middleware('auth');


//endpoint  per te shfaqur nje kontrate te vetme te nje useri
Route::get('/user/kontrata/{id}', 'KontrataController@oneContrat')->middleware('auth');

//endpoint per te fshire nje kontrate
route::delete('/kontrata/{id}', 'KontrataController@deleteContrat')->middleware('auth');

//endpoint afishon kontrata qe jane bere pas kesaj date
route::get('/kontrata', 'KontrataController@search')->middleware('auth');

// endpoint per te krijuar kontrate
route::post('/kontrata/{id}','KontrataController@CreateContrat')->middleware('auth');

//endpoint per te shfaqur kontratat e qeramarrjes
route::get('/kontrataSiKlient/{id}','KontrataController@clientContrat')->middleware('auth');

//endpoint afishon kontrata e tua sipas filterit
route::get('/kontrata/clientsearch','KontrataController@clientsearch')->middleware('auth');



//SEARCH MAKINAVE DHE NJE MAKINE
Route::get('/search', 'MakinaController@index');
Route::get('/searchCar/{makina}', 'MakinaController@show');
//SEARCH MAKINAVE
//KRIJIMI MAKINES
Route::get('/home/createpost', function () {
    return view('Post');
})->name('createpost');
Route::post('/home/createpost', 'MakinaController@create')->middleware('auth');
//KRIJIMI MAKINES

//EDIT/DELETE MAKINAVE
Route::get('/home/{makina}/edit', function(\App\Makina $makina){
    return view ('edit');
})->middleware('auth');
Route::patch('/home/{makina}', 'MakinaController@update')->middleware('auth');
Route::delete('/home/{makina}', 'MakinaController@destroy')->middleware('auth');
Auth::routes(['verify' => true]);
