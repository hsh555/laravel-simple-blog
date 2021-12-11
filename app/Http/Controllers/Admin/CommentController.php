<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(5);

        return view("admin.pages.comments.index", compact("comments"));
    }

    public function delete(Comment $comment)
    {
        $comment->delete();

        alert()->success('Comment Deleted Successfully.', 'Success Message')->persistent("close");

        return redirect()->route("admin.comments.index");
    }


    public function active(Comment $comment)
    {
        $comment->update([
            "status" => !$comment->status
        ]);

        alert()->success('Comment Visibility Changed Successfully.', 'Success Message')->persistent("close");

        return redirect()->route("admin.comments.index");
    }
}
