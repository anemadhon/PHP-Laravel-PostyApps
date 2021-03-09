<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __contruct()
    {
        $this->middleware(['auth'])->only('post', 'destroy');
    }
    public function index(){
        $posts = Post::latest()->with(['user','likes'])->paginate(2);
        return view('post.index',[
            'posts' => $posts
        ]);
    }

    public function singlePost(Post $post)
    {
        return view('post.single-post',[
            'post' => $post
        ]);
    }

    public function post(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return back();
    }
}
