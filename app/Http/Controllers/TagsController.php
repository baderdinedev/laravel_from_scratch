<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::All();
        return view('layouts.article.Tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Tag::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('tags')->with('success', 'Le tag a été ajouté avec succès.');
    }

    public function edit(Tag $tag)
    {
        return view('layouts.article.Tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $tag->update($validatedData);

        return redirect()->route('tags')->with('success', 'Tag updated successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags')->with('success', 'Tag deleted successfully');
    }

}
