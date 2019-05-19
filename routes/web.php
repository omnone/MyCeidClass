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
Route::post('profile/statistics', 'ProfileController@scrape_progress');
Route::get('profile/statistics/download', 'ProfileController@download_grades_file');
Route::get('profile/statistics/{mode}', 'ProfileController@get_statistika_foititi');


// eksetastiki routes
Route::get('exams/', 'ExamsController@show_exetastiki_index');
Route::get('exams/program', 'ExamsController@show_exams_program');
Route::get('exams/participation', 'ParticipationExamsController@show_eksetastiki');
Route::post('exams/participation', 'ParticipationExamsController@apothikeuse_dilosi_eksetastiki');
Route::get('exams/create', 'ExamsController@create_new_exam')->middleware('prof');
Route::post('exams/create', 'ExamsController@save_new_exam')->middleware('prof');
Route::get('exams/{exam_id}/rooms', 'ExamsController@epilogi_aithouswn_eksetasis')->middleware('prof');
Route::post('exams/{exam_id}/rooms', 'ExamsController@save_aithouses_eksetastikis')->middleware('prof');
Route::get('exams/{exam_id}/download', 'ExamsController@download_katastasi')->middleware('prof');



// ergasies routes
Route::get('lessons/{lesson_name}/homework', 'ErgasiesController@show_homework');
Route::get('lessons/{lesson_name}/homework/create', 'ErgasiesController@create_ergasia')->middleware('prof');
Route::post('lessons/{lesson_name}/homework/store', 'ErgasiesController@store_ergasia')->middleware('prof');
Route::get('lessons/{lesson_name}/homework/{ergasia_id}', 'ErgasiesController@show_ergasia');
Route::post('lessons/{lesson_name}/homework/{ergasia_id}', 'ErgasiesController@paradosi_ergasias');
Route::post('lessons/{lesson_name}/homework/{ergasia_id}/grade', 'ErgasiesController@grade_homework')->middleware('prof');
Route::get('lessons/{lesson_name}/homework/{ergasia_id}/{file_name}', 'ErgasiesController@download_file');

// groups routes
Route::get('lessons/{lesson_name}/groups', 'OmadesController@show_groups');
Route::get('lessons/{lesson_name}/groups/create', 'OmadesController@create_new_group')->middleware('prof');
Route::post('lessons/{lesson_name}/groups/create', 'OmadesController@save_new_group')->middleware('prof');
Route::get('lessons/{lesson_name}/groups/{group_id}', 'OmadesController@show_group');
Route::post('lessons/{lesson_name}/groups/{group_id}', 'OmadesController@subscribe_to_group');


//messages routes
Route::get('messages/create', 'MessagesController@create_new_message');
Route::post('messages/create', 'MessagesController@send_message');
Route::get('messages/user', 'MessagesController@find_user')->name('messages.find_user');
Route::get('messages/{mode}', 'MessagesController@show_messages');
Route::get('messages/{mode}/{message_id}', 'MessagesController@read_message');
Route::get('messages/{mode}/{message_id}/{file_name}', 'MessagesController@download_file');





// admin routes
Route::get('admin/', 'AdminController@admin_index')->middleware('admin');
Route::get('admin/exetastiki/', 'AdminController@eksetastiki_index')->middleware('admin');
Route::get('admin/schedule/', 'ProgramController@show_program')->middleware('admin');
Route::post('admin/exetastiki/', 'AdminController@save_eksetastiki')->middleware('admin');
Route::get('admin/exetastiki/create', 'AdminController@create_eksetastiki')->middleware('admin');
Route::post('admin/exetastiki/create', 'AdminController@save_eksetastiki')->middleware('admin');
Route::get('admin/schedule/create/', 'ProgramController@create_new_program')->middleware('admin');
Route::post('admin/schedule/create/', 'ProgramController@save_program')->middleware('admin');
//schedule routes
Route::get('schedule/', 'ProgramController@show_program');






// authentication routes
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
