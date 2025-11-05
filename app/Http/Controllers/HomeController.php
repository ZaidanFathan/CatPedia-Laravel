<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::with("cat.breed")->get();
        return view("home", ['articles' => $articles]);
    }

 public function show(Article $article)
    {
        $article_data = $article->load('cat.breed');
        $article_data->content = \formatParagraphs($article->content);
        // dd($article->load('cat.breed'));
        return view('article', ['article' => $article_data]);
    }
    
}
