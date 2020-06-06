<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    //コメントの保存処理
    public function store(Request $request ,Post $post) {
        $this->validate($request, [
            'boby' => 'required'
        ]);
        $comment = new Comment(['boby' => $request->boby]);
        $post->comments()->save($comment);
        return redirect()->action('PostsController@show', $post);
    }

    //コメントの削除処理
    public function destroy(Post $post, Comment $comment) {
        $comment->delete();
        return redirect()->back();
    }
}
