<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // ログインユーザーを取得する
        $user = Auth::user();

        // ログインユーザーに紐づくフォルダを一つ取得する
        $folder = $user->folders()->first();

        // まだ一つもフォルダを作っていなければホームページをレスポンスする
        if (is_null($folder)) {
            return view('home');
        }

        $folder = $user->folders()->first();
        // $tasks = $folder->tasks()->get();

        // フォルダがあればそのフォルダのタスク一覧にリダイレクトする
        return redirect()->route('tasks.index', [
            'folder'=>$folder->id,
            // 'id' => $folder->id,
            // // 'folders' => $folders,
            // // 'current_folder_id' => $folder->id,
            // // 'tasks' => $tasks,
        ]);
    }
}
