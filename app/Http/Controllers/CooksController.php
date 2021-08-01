<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cook;

class CooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {// 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $cooks = $user->cooks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'cooks' => $cooks,
            ];
        }
        
        //ビューで表示
        return view('cooks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    // getでcooks/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        if (\Auth::check()) { // 認証済みの場合
        $cook = new Cook;
        // 登録(メニュー・食材等)画面を表示
        return view('cooks.create', [
            'cook' => $cook,
        ]);
        }
        //認証されてない人はトップに戻りなさい
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //バリデーション
        $request->validate([
             'date' => 'required',
             'when' => 'required',
             'menu' => 'required|max:50',
             'ingregient' => 'max:255',
             'memo' => 'max:500',
             'url' => is_null($request->url) ? '' : 'url',
        ]);
        
        // 認証済みユーザの投稿として作成
        $request->user()->cooks()->create([
            'date' => $request->date,
            'when' => $request->when,
            'menu' => $request->menu,
            'ingregient' => $request->ingregient,
            'memo' => $request->memo,
            'url' => $request->url,
        ]);
        
        //登録ページへリダイレクト
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //idを検索して取得
        $cook = Cook::findOrFail($id);
        
        if (\Auth::id() === $cook->user_id) {// 閲覧者===その投稿の所有者
            //詳細ページを表示
            return view('cooks.show', ['cook' => $cook,]);
        }
        //認証済みじゃない人がアクセスを試みるとトップにリダイレクト
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //idを検索して取得
        $cook = Cook::findOrFail($id);
        
        if (\Auth::id() === $cook->user_id) {// 閲覧者===その投稿の所有者
            //編集ページを表示
            return view('cooks.edit', ['cook' => $cook,]);
        }
        //認証済みじゃない人がアクセスを試みるとトップにリダイレクト
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //バリデーション
        $request->validate([
             'date' => 'required',
             'when' => 'required',
             'menu' => 'required|max:50',
             'ingregient' => 'max:255',
             'memo' => 'max:500',
             'url' => is_null($request->url) ? '' : 'url',
        ]);
        
        //idを検索して取得
        $cook = Cook::findOrFail($id);
        
        // 認証済みユーザがその投稿の所有者である場合は、投稿を更新
        if (\Auth::id() === $cook->user_id) {
            $cook->date = $request->date;
            $cook->when = $request->when;
            $cook->menu = $request->menu;
            $cook->ingregient = $request->ingregient;
            $cook->memo = $request->memo;
            $cook->url = $request->url;
            $cook->save();
        }
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // idの値で投稿を検索して取得
        $cook = Cook::findOrFail($id);
        
        // 認証済みユーザがその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $cook->user_id) {
            $cook->delete();
        }

        // 一覧へリダイレクトさせる
        return redirect('/cooks');
    }
    

}
