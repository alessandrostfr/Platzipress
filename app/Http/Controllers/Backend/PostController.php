<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
        ->where('user_id', auth()->user()->id)
        ->paginate(5);
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $post = Post::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        //image
        if ($request->file('file')) {
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }

        //retornar
        return back()->with('status', 'Creado con éxito');
    }


    // public function edit($id)
    // {
    //     $post = Post::find($id);
    //     $this->authorize('pass', $post);
    //     $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
    //     $tags = Tag::orderBy('name', 'ASC')->get();
    //     return view('posts.edit', compact('post', 'categories', 'tags'));
    // }


    // public function update(PostUpdateRequest $request, $id)
    // {
    //     $post = Post::find($id);
    //     $this->authorize('pass', $post);
    //     $post->update($request->all());
        
    //     //image
    //     if($request->file('file')){
    //         $path = Storage::disk('public')->put('image', $request->file('file'));
    //         $post->fill(['file'=> asset($path)])->save();
    //     }
        
    //     $post->tags()->sync($request->get('tags'));
    //     return redirect()->route('posts.edit', $post->id)->with('info', 'Entrada actualizada con exito');
    // }


    // public function destroy($id)
    // {
    //     $post = Post::find($id);
    //     $this->authorize('pass', $post);
    //     $post ->delete();
        
    //     return back()->with('info', 'Entrada borrada con exito');
    // }

}
