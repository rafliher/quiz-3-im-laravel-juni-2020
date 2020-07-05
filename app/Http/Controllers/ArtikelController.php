<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function image(){
        return "<img src='".asset('images/sanbercode_quiz3.png')."' />";
    } 
    public function index(){
        $articles = ArticleModel::get_all();
        return view('article.index', ['articles' => $articles]);
    }
    public function create(){
        return view('article.new');
    }
    public function upload(Request $request){
        $success = ArticleModel::insert($request);
        return redirect()->action('ArtikelController@index');
    }
    public function show($id){
        $article = ArticleModel::get_from($id);
        return view('article.show', ['article' => $article]);
    }
    public function edit($id){
        $article = ArticleModel::get_from($id);
        return view('article.edit', ['article' => $article]);
    }
    public function update(Request $request, $id){
        $article = ArticleModel::update($request, $id);
        return redirect()->action('ArtikelController@show', ['id'=>$id]);
    }
    public function delete($id){
        $article = ArticleModel::delete($id);
        return redirect()->action('ArtikelController@index');
    }
}
