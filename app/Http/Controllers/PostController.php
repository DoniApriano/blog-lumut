<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $posts = Post::latest()->get();
            return view('post.index', compact(['posts']));
        } else {
            $posts = Post::where('username',Auth::user()->username)->latest()->get();
            return view('post.index', compact(['posts']));
        }

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required',
            'content'   => 'required'
        ]);

        Post::create([
            'title'     => $request->title,
            'date'     => date('Y-m-d'),
            'username'     => Auth::user()->username,
            'content'   => $request->content
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'     => 'required',
            'content'   => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title'     => $request->title,
            'content'     => $request->content
        ]);


        return redirect()->back();
    }
}
