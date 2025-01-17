<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tag.index', ['tags' => $tags]);
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

    public function edit(Request $request, Tag $tag)
    {

        return view('tag.edit', ['tag' => $tag]);
    }

    public function update(Request $request, Tag $tag)
    {

        $validated_request = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageRelativePath = $request->file('image')->store('tag_images', 'public');
            $validated_request['image'] = $imageRelativePath;

            Storage::disk('public')->delete($tag->image);
        }

        $tag->update($validated_request);

        session()->flash('success', 'Modifications enregistrées');
        return view('tag.edit', ['tag' => $tag]);
    }

    public function delete(Tag $tag)
    {

        if ($tag->image) {
            Storage::disk('public')->delete($tag->image);
        }
        $tag->delete();

        return redirect()->route('tags.index')->with('sucess', 'Tag supprimé');
    }

    public function show()
    {
        return view('misc.todo', ['to_implement' => __METHOD__]);
    }
}
