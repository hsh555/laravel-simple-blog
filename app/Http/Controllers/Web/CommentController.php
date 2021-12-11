<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:128',
            'user_name' => 'required',
            'user_email' => 'required',
            'body' => 'required|min:4',
        ]);

        Comment::create([
            'title' => $validated["title"],
            'user_name' => $validated["user_name"],
            'user_email' => $validated["user_email"],
            'body' => $validated["body"],
            'post_id' => $id
        ]);


        alert()->success('Comment Added Successfully.', 'Success Message')->persistent("close");

        return redirect()->back();
    }
}
