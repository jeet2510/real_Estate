<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Content;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{   
    public function welcome()
    {
        $posts = Post::where('id', '>', 0)->paginate(5);
        $content = Content::where('description_for', '=', 'aboutus')->get('description');

        return view('welcome', compact('posts', 'content'));
    }
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
                $request->validate([
                'title' => 'required',
                'description' => 'required'
            ]);
        
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->extension();
        
                // Resize the image
                $image = Image::make($image)->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
        
                // Save the resized image
                $image->save(public_path('images/'.$imageName));
        
                $post = Post::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $imageName,
                ]);
        
                return redirect()->route('posts.index')->with('success','Post created successfully');
            
                }else {
                    dd('he');
                return redirect()->back()->with('error', 'Invalid or missing image file.');
            }
    }



    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::findOrFail($id);

        if($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Delete the old image if it exists
            if (file_exists(public_path('images/' . $post->image))) {
                unlink(public_path('images/' . $post->image));
            }

            $post->image = $imageName;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Delete the associated image
        if (file_exists(public_path('images/' . $post->image))) {
            unlink(public_path('images/' . $post->image));
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }
    
}
