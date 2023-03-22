<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//データ一覧
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//作成画面
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//データベースへの挿入メソッド
    {
    $user_id = Auth::id();
    $clicked_user_id = request()->input('user_id');
    //
    }
    
    public function showUser($user_id)
    {
        $user = User::find($user_id);
        $logged_in_user_id = Auth::id();
        $clicked_user_id = request()->input('user_id');
        $is_current_user = $logged_in_user_id == $clicked_user_id;
        
        return view('user',[
            'user'=>$user,
            'is_current_user'=>$is_current_user,]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    
    public function show(Guest $guest)//一つの画面を見る
    {
    $student = Guest::find($guest->id);
     return response()->json(
        $student,JSON_UNESCAPED_UNICODE
    );   //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)//編集画面
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)//データの更新
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)//データの削除
    {
        //
    }
}
