<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArticleModel {
    public static function get_all(){
        $articles = DB::table('articles')->get();
        return $articles;
    }
    public static function get_from($id){
        $article = DB::table('articles')->where('id', $id)->get();
        return $article[0];
    }
    public static function  insert($data){
        $slug = "";
        foreach (explode(" ",$data['title']) as $word) {
            $slug.="$word-";
        }
        $slug = strtolower(rtrim($slug, '-'));
        $succes = DB::table('articles')->insert([
            'title' => $data['title'],
            'content' => $data['content'],
            'tags' => $data['tags'],                    
            'slug' => $slug,
            'user_id' => 0,                       
            'updated_at' => date('Y-m-d H:i:s'),                        
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $succes;
    }
    public static function  update($data, $id){
        $slug = "";
        foreach (explode(" ",$data['title']) as $word) {
            $slug.="$word-";
        }
        $slug = strtolower(rtrim($slug, '-'));
        $succes = DB::table('articles')
            ->where('id', $id)
            ->update([  'title' => $data['title'],
                        'content' => $data['content'],
                        'tags' => $data['tags'],
                        'slug' => $slug,
                        'updated_at' => date('Y-m-d H:i:s')]);
        return $succes;
    }
    public static function  delete($id){
        $succes = DB::table('articles')->where('id', '=', $id)->delete();
        return $succes;
    }
}