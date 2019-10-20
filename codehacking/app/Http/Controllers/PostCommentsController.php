<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{

    public function index()
    {
         $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = [

          'post_id' =>$request->post_id,
          'author' =>$user->name,
          'email' =>$user->email,
          'photo' =>$user->photo['file'],
          'body' =>$request->body
        ];
        Comment::create($data);
        $request->session()->flash('comment_message', 'Your message has been submitted and is waiting for moderation');
        return redirect()->back();
     }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('admin.comments.show', compact('comments'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());
        return redirect('/admin/comments');
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return redirect()->back();
    }
}
