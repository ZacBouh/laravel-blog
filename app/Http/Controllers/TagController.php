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
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $validated_request = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageRelativePath = $request->file('image')->store('tag_images', 'public');
            $validated_request['image'] = $imageRelativePath;
        }

        Tag::create($validated_request);

        return back()->with('success', 'Nouveau Tag crée avec succès : ' . $validated_request['name']);
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
