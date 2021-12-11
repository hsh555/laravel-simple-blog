<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::all()->count();

        $postsCount = Post::all()->count();

        $commentsCount = Comment::all()->count();
        return view(
            "admin.pages.dashboard.dashboard",
            ["usersCount" => $usersCount, "postsCount" => $postsCount, "commentsCount" => $commentsCount]
        );
    }

    public function posts()
    {
        $posts = Post::where("status", 1)->orderByDesc("id")->paginate(5);
        return view("admin.pages.posts.index", compact("posts"));
    }
}
