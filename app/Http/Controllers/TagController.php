<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('article.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }

    public function store()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }

    public function edit()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }

    public function update()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }

    public function delete()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }

    public function show()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }
}
