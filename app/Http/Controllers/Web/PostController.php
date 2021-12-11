<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->where("status", 1)->paginate(10);

        return view("web.pages.home.home", compact("posts"));
    }

    public function show(Post $post)
    {
        $comments = $post->comments->where("status", 1);

        return view("web.pages.posts.show", ["post" => $post, "comments" => $comments]);
    }

    public function search(Request $request)
    {
        if ($request->has("s") && strlen($request->get("s")) > 0) {
            $query = $request->get("s");

            $posts = Post::where('title', 'like', '%' . $query . '%')->paginate(10);

            return view("web.pages.posts.search", ["posts" => $posts, "query" => $query]);
        }

        return redirect()->route("index");
    }
}
