<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', ['articles' => $articles]);
    }

    public function create()
    {

        $tags = Tag::all();
        return view('article.create', ['tags' => $tags]);
    }

    public function store(Request $request)
    {

        $tagsId = Tag::pluck('id')->toArray();

        $validated_request = $request->validate([
            'title' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'tags.*' => ['integer', Rule::in($tagsId)],
            'content' => 'required|string|max:16380',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        $validated_request['user_id'] = 1;

        if ($request->hasFile('image')) {
            $imageRelativePath = $request->file('image')->store('article_images', 'public');
            $validated_request['image'] = $imageRelativePath;
        }

        $article = Article::create($validated_request);

        if (!empty($validated_request['tags'])) {
            $article->tags()->attach($validated_request['tags']);
        }

        return back()->with('success', 'Nouvel article créé avec succès : ' . $article->title);
    }

    public function edit()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }

    public function update()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }

    public function delete(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé : ' . $article->title);
    }

    public function show()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }
}
