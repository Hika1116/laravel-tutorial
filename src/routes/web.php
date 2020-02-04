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

// タスク一覧ページ表示
Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

// フォルダ作成ページの表示
Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');

// フォルダ作成処理の実行
Route::post('folders/create', 'FolderController@create');