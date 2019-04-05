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

// Route::get('/users/{id}',function($id){
//   return 'this is user '.$id;
// });


Route::get('/', 'LessonsController@index');

Route::get('search', 'LessonsController@search');

Route::post('lessons','LessonsController@subscribe_to_lesson')->name('lessons.subscribe_to_lesson');
Route::get('lessons', 'LessonsController@lesson_show')->name('lessons.lesson_show');
Route::get('lessons/search_result', 'LessonsController@search_result')->name('lessons.search_result');
Route::get('lessons/subscriptions', 'LessonsController@subscriptions')->name('lessons.subscriptions');
Route::get('lessons/{lesson_name}','LessonsController@lesson_index');
Route::get('lessons/{lesson_name}/files', 'LessonsController@show_files');
Route::get('lessons/{lesson_name}/announcements', 'LessonsController@show_announcement');
Route::get('lessons/{lesson_name}/homework', 'LessonsController@show_homework');




Route::resource('posts','PostsContoller');


Auth::routes();
