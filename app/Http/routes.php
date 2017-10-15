<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/books', 'BookController@index');
Route::get('/books/create', 'BookController@create');
Route::post('/books/create', 'BookController@store');
Route::get('/books/edit/{book}', 'BookController@edit');
Route::post('/books/edit/{book}', 'BookController@update');
Route::delete('/books/delete/{book}', 'BookController@destroy');

Route::get('/handbooks', 'HandbookController@index');
Route::get('/handbooks/create', 'HandbookController@create');
Route::post('/handbooks/create', 'HandbookController@store');
Route::get('/handbooks/edit/{handbook}', 'HandbookController@edit');
Route::post('/handbooks/edit/{handbook}', 'HandbookController@update');
Route::delete('/handbooks/delete/{handbook}', 'HandbookController@destroy');

Route::get('/activities', 'ActivityController@index');
Route::get('/activities/create', 'ActivityController@create');
Route::post('/activities/create', 'ActivityController@store');
Route::get('/activities/edit/{activity}', 'ActivityController@edit');
Route::post('/activities/edit/{activity}', 'ActivityController@update');
Route::delete('/activities/delete/{activity}', 'ActivityController@destroy');

Route::get('/educational-tools', 'EducationalToolController@index');
Route::get('/educational-tools/create', 'EducationalToolController@create');
Route::post('/educational-tools/create', 'EducationalToolController@store');
Route::get('/educational-tools/edit/{educational_tool}', 'EducationalToolController@edit');
Route::post('/educational-tools/edit/{educational_tool}', 'EducationalToolController@update');
Route::delete('/educational-tools/delete/{educational_tool}', 'EducationalToolController@destroy');

Route::get('/educational-packs', 'EducationalPackController@index');
Route::get('/educational-packs/create', 'EducationalPackController@create');
Route::post('/educational-packs/create', 'EducationalPackController@store');
Route::get('/educational-packs/edit/{educational_pack}', 'EducationalPackController@edit');
Route::post('/educational-packs/edit/{educational_pack}', 'EducationalPackController@update');
Route::delete('/educational-packs/delete/{educational_pack}', 'EducationalPackController@destroy');

Route::get('/lists', 'ListController@index');
Route::get('/lists/create', 'ListController@create');
Route::post('/lists/create', 'ListController@store');
Route::get('/lists/edit/{list}', 'ListController@edit');
Route::post('/lists/edit/{list}', 'ListController@update');
Route::delete('/lists/delete/{list}', 'ListController@destroy');
Route::get('/lists/export/{list}', 'ListController@export');


Route::get('/grades/create/{list}', 'GradeController@create');
Route::post('/grades/create/{list}', 'GradeController@store');
Route::get('/grades/edit/{grade}', 'GradeController@edit');
Route::post('/grades/edit/{grade}', 'GradeController@update');
Route::delete('/grades/delete/{grade}', 'GradeController@destroy');
Route::get('/grades/books/{grade}', 'GradeController@books');
Route::post('/grades/books/{grade}', 'GradeController@updateBooks');
Route::get('/grades/handbooks/{grade}', 'GradeController@handbooks');
Route::post('/grades/handbooks/{grade}', 'GradeController@updateHandbooks');
Route::get('/grades/activities/{grade}', 'GradeController@activities');
Route::post('/grades/activities/{grade}', 'GradeController@updateActivities');
Route::get('/grades/educational-tools/{grade}', 'GradeController@educationalTools');
Route::post('/grades/educational-tools/{grade}', 'GradeController@updateEducationalTools');
Route::get('/grades/educational-packs/{grade}', 'GradeController@educationalPacks');
Route::post('/grades/educational-packs/{grade}', 'GradeController@updateEducationalPacks');

