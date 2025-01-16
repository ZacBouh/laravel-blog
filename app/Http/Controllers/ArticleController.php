<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('article.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('misc.todo');
    }

    public function store()
    {
        return view('misc.todo');
    }

    public function edit()
    {
        return view('misc.todo');
    }

    public function update()
    {
        return view('misc.todo');
    }

    public function delete()
    {
        return view('misc.todo');
    }

    public function show()
    {
        return view('misc.todo');
    }
}
