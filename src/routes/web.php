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


Route::group(['middleware' => 'auth'], function () {

        // タスク一覧ページ表示
        Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');

        // フォルダ作成ページの表示
        Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');

        // フォルダ作成処理の実行
        Route::post('folders/create', 'FolderController@create');

        // タスク作成ページの表示
        Route::get( 'folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');

        // タスク作成処理の実行
        Route::post( 'folders/{folder}/tasks/create', 'TaskController@create');

        // タスク編集画面の表示
        Route::get( 'folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');

        // タスク編集処理の実行
        Route::post( 'folders/{folder}/tasks/{task}/edit', 'TaskController@edit');

        //ホーム画面の表示
        Route::get('/', 'HomeController@index')->name('home');
});

Auth::routes();