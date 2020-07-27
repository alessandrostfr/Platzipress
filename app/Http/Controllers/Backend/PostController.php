<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;

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


    public function store(PostRequest $request)
    {
        //Guardar
        $post = Post::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        //image
        if($request->file("file")){

            $post->image= $request->file("file")->store("posts","public");
            $post->save();
        }

        //retornar
        return redirect()->route('posts.edit', $post->id)->with('status', 'Creado con éxito');
    }


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        
        //image
        if($request->file("file")){

            $post->image= $request->file("file")->store("posts","public");
            $post->save();
        }
        
        return redirect()->route('posts.edit', $post->id)->with('status', 'Entrada actualizada con exito');
    }


    // public function destroy($id)
    // {
    //     $post = Post::find($id);
    //     $this->authorize('pass', $post);
    //     $post ->delete();
        
    //     return back()->with('info', 'Entrada borrada con exito');
    // }

}
