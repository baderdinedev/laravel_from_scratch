<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $categories = Category::all();
        $tags = Tag::All();
        return view('layouts.article.index', compact('articles', 'categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'full_text' => 'required|string',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
        ]);
        $article = new Article;
        $article->title = $request->input('title');
        $article->full_text = $request->input('full_text');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('article_images', 'public');
            $article->image = $imagePath;
        }

        $article->save();

        return redirect()->route('articles')->with('success', 'L\'article a été ajouté avec succès.');
    }
}
