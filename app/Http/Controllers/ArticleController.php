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
        $articles = Article::orderBy('created_at', 'desc')->get();
        $tags = Tag::all();
        return view('article.index', ['articles' => $articles, 'tags' => $tags]);
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

    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('article.edit', [
            'article' => $article,
            'tags' => $tags
        ]);
    }

    public function update(Request $request, Article $article)
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
            if (!empty($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
        }

        $article->update($validated_request);

        if (!empty($validated_request['tags'])) {
            $article->tags()->sync($validated_request['tags']);
        }

        return back()->with('success', 'Modifications enregistrées.');
    }

    public function delete(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé : ' . $article->title);
    }

    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }

    public function filteredList(Request $request)
    {
        $tagsId = Tag::pluck('id')->toArray();

        $validatedRequest = $request->validate([
            'filterTags' => 'nullable|array',
            'filterTags.*' => ['integer', Rule::in($tagsId)]
        ]);

        if (empty($validatedRequest['filterTags'])) {
            return redirect()->route('articles.index');
        }

        $filterTags = $validatedRequest['filterTags'];

        $filteredArticles = Article::whereHas('tags', function ($tag) use ($filterTags) {
            $tag->whereIn('tags.id', $filterTags);
        }, '=', count($filterTags))->get();

        $tags = Tag::all();

        return view('article.index', ['articles' => $filteredArticles, 'tags' => $tags, 'selectedFilters' => $filterTags]);
    }

    public function search(Request $request)
    {
        $validatedQuery = $request->validate([
            'query' => 'nullable|string|max:255'
        ]);

        if (empty($validatedQuery['query'])) {
            return redirect()->route('articles.index');
        }

        $query = $validatedQuery['query'];

        $filteredArticles = Article::where('title', 'LIKE', "%{$query}%")->orWhere('content', 'LIKE', "%{$query}%")->orWhereHas('user', function ($user) use ($query) {
            $user->where('name', 'LIKE', "%{$query}%");
        })->get();

        $tags = Tag::all();

        return view('article.index', ['articles' => $filteredArticles, 'tags' => $tags]);
    }
}
