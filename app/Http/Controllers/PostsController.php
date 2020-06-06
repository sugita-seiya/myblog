<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;


class PostsController extends Controller
{
    //トップページ
    public function index() {
        $posts = Post::latest()->get();
        // dd($posts->toArray());
        // exit;
        return view('posts.index')->with('posts',$posts);
    }

    //投稿の詳細ページ
    public function show(Post $post){
        // $post = Post::findOrFail($id);
        return view('posts.show')->with('post',$post);
    }

    //新規投稿ページ
    public function create() {
        return view('posts.create');
    }

    //投稿の保存処理
    public function store(PostRequest $request) {
        $post = new Post();
        $post->title = $request->title;
        $post->boby = $request->boby;
        $post->save();
        return redirect('/');
    }

    //投稿の編集ページ
    public function edit(Post $post) {
        return view('posts.edit')->with('post', $post);
    }

    //投稿編集の保存処理
    public function update(PostRequest $request, Post $post) {
        $post->title = $request->title;
        $post->boby = $request->boby;
        $post->save();
        return redirect('/');
    }

    //投稿の削除処理
    public function destroy(Post $post) {
        $post->delete();
        return redirect('/');
    }
}
