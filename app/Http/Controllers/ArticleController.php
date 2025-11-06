<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Cats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(){
        $articles = Article::with("cat.breed")->get();

        // Cache::put('test', 'testing', now()->addMinutes(1));
        //  Cache::put('data', $articles, now()->addMinutes(4));
        // $data_cache = Cache::get('test');
        // $data_cache2 = Cache::get('data');
        // dd([$data_cache, $data_cache2]);

        // Cache::forget('test');



        // dd($articles);
        return view("admin.articles", ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $CatBreeds = Cats::with('breed')->get();
          
        return view("admin.article_form", ['article'=> null, 'breeds' => $CatBreeds]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $request->validate([
            'judul' => 'required|unique:articles,judul|max:50',
            'deskripsi' => 'required|max:100',
            'content_article' => 'required|min:100',
            'cat_id' => 'required',
        ]);

        Article::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'content' => $request->content_article,
            'cat_id' => $request->cat_id,
        ]);

        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article_data = $article->load('cat.breed');
        $article_data->content = \formatParagraphs($article->content);
        // dd($article->load('cat.breed'));
        return view('admin.article', ['article' => $article_data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {

        $CatBreeds = Cats::with('breed')->get();
        return view('admin.article_form', ['article' => $article->load('cat.breed'), 'breeds' => $CatBreeds]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
         $request->validate([
            'judul' => 'required|min:50|max:100',
            'deskripsi' => 'required|min:100',
            'content_article' => 'required|min:100',
        ]);

        // dd($request);

        Article::find($article->id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'content' => $request->content_article,
            'cat_id' => $request->cat_id,
            'updated_at' => now()
        ]);


        return redirect()->route("articles.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
