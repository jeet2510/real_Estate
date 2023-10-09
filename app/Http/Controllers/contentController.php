<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class contentController extends Controller
{   
    public function index()
    {
        $contents = Content::all();

        return view('contents.index', compact('contents'));
    }
    public function contact(){
        return view('includepage.contact');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description_for' => 'required',
            'description' => 'required',
        ]);

        Content::create($validatedData);

        return redirect()->route('contents.index')
            ->with('success', 'Content created successfully');
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);

        return view('contents.show', compact('content'));
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);

        return view('contents.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description_for' => 'required',
            'description' => 'required',
        ]);

        $content = Content::findOrFail($id);
        $content->update($validatedData);

        return redirect()->route('contents.index')
            ->with('success', 'Content updated successfully');
    }

    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('contents.index')
            ->with('success', 'Content deleted successfully');
    }
}
