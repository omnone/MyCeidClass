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


Route::get('/', 'LessonsController@index');
// quick search gia mathimata
Route::get('search', 'LessonsController@search');

// **student routes////////////////////////////////////////////////////////////////////////////////////////////
// lesson routes
Route::post('lessons', 'LessonsController@subscribe_to_lesson')->name('lessons.subscribe_to_lesson');
Route::get('lessons', 'LessonsController@lesson_show')->name('lessons.lesson_show');
Route::get('lessons/search_result', 'LessonsController@search_result')->name('lessons.search_result');
Route::get('lessons/subscriptions', 'LessonsController@subscriptions')->name('lessons.subscriptions');
Route::get('lessons/{lesson_name}', 'LessonsController@lesson_index');
Route::get('lessons/{lesson_name}/files', 'LessonsController@show_files');
Route::get('lessons/{lesson_name}/announcements', 'LessonsController@show_announcement');

// forum routes
Route::get('lessons/{lesson_name}/forum', 'ForumController@show_forum');
//profile routes
Route::get('profile/settings', 'ProfileController@profile_index');
Route::get('profile/statistics', 'ProfileController@foititis_statistika');
// eksetastiki routes
Route::get('exams/program', 'ExamsController@show_exams_program');
Route::get('exams/participation', 'ExamsController@participation_index');
// ergasies routes
Route::get('lessons/{lesson_name}/homework', 'ErgasiesController@show_homework');
Route::get('lessons/{lesson_name}/homework/create', 'ErgasiesController@create_ergasia');
Route::post('lessons/{lesson_name}/homework/store', 'ErgasiesController@store_ergasia');
Route::get('lessons/{lesson_name}/homework/{ergasia_id}', 'ErgasiesController@show_ergasia');
Route::get('lessons/{lesson_name}/homework/{ergasia_id}/{file_name}', 'ErgasiesController@download_file');


// anakoinoseis routes

// authentication routes
Auth::routes();
