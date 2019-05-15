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
Route::get('lessons/{lesson_name}/forum/{sizitisi_id}', 'ForumController@show_sizitisi');
Route::get('lessons/{lesson_name}/forum/create', 'ForumController@create_sizitisi');
Route::post('lessons/{lesson_name}/forum/create', 'ForumController@save_sizitisi');
Route::get('lessons/{lesson_name}/forum/{sizitisi_id}/{post_id}', 'ForumController@show_post');
Route::get('lessons/{lesson_name}/forum/create/{sizitisi_id}/{post_id}', 'ForumController@add_post');
Route::post('lessons/{lesson_name}/forum/create/{sizitisi_id}/{post_id}', 'ForumController@create_post');

//profile routes
Route::get('profile/settings', 'ProfileController@profile_index');
Route::post('profile/settings', 'ProfileController@profile_update');
Route::get('profile/statistics', 'ProfileController@get_statistika_foititi');
Route::post('profile/statistics', 'ProfileController@scrape_progress');
Route::get('profile/statistics/download', 'ProfileController@download_grades_file');

// eksetastiki routes
Route::get('exams/', 'ExamsController@show_exetastiki_index');
Route::get('exams/program', 'ExamsController@show_exams_program');
Route::get('exams/participation', 'ParticipationExamsController@show_eksetastiki');
Route::post('exams/participation', 'ParticipationExamsController@apothikeuse_dilosi_eksetastiki');
Route::get('exams/create', 'ExamsController@create_new_exam');
Route::post('exams/create', 'ExamsController@save_new_exam');
Route::get('exams/{exam_id}/rooms', 'ExamsController@epilogi_aithouswn_eksetasis');
Route::post('exams/{exam_id}/rooms', 'ExamsController@save_aithouses_eksetastikis');


// ergasies routes
Route::get('lessons/{lesson_name}/homework', 'ErgasiesController@show_homework');
Route::get('lessons/{lesson_name}/homework/create', 'ErgasiesController@create_ergasia');
Route::post('lessons/{lesson_name}/homework/store', 'ErgasiesController@store_ergasia');
Route::get('lessons/{lesson_name}/homework/{ergasia_id}', 'ErgasiesController@show_ergasia');
Route::post('lessons/{lesson_name}/homework/{ergasia_id}', 'ErgasiesController@paradosi_ergasias');
Route::post('lessons/{lesson_name}/homework/{ergasia_id}/grade', 'ErgasiesController@grade_homework');
Route::get('lessons/{lesson_name}/homework/{ergasia_id}/{file_name}', 'ErgasiesController@download_file');

// groups routes
Route::get('lessons/{lesson_name}/groups', 'OmadesController@show_groups');
Route::get('lessons/{lesson_name}/groups/create', 'OmadesController@create_new_group');
Route::post('lessons/{lesson_name}/groups/create', 'OmadesController@save_new_group');
Route::get('lessons/{lesson_name}/groups/{group_id}', 'OmadesController@show_group');
Route::post('lessons/{lesson_name}/groups/{group_id}', 'OmadesController@subscribe_to_group');


// anakoinoseis routes

// admin routes
Route::get('admin/', 'AdminController@admin_index');
Route::get('admin/exetastiki/', 'AdminController@eksetastiki_index');
Route::post('admin/exetastiki/', 'AdminController@save_eksetastiki');
Route::get('admin/exetastiki/create', 'AdminController@create_eksetastiki');



// authentication routes
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
