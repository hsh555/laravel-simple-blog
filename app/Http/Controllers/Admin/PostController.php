<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view("admin.pages.posts.index", compact("posts"));
    }


    public function create(Request $request)
    {
        $categories = Category::all();
        $authors = User::where("role", "author")->get();

        return view("admin.pages.posts.create", ["categories" => $categories, "authors" => $authors]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:128',
            'author' => 'required',
            'category' => 'required',
            'img_path' => 'required',
            'body' => 'required'
        ]);

        $uploadFile = Post::uploadImg($request);

        if ($uploadFile[0]) {
            $post = Post::create([
                "title" => $validated["title"],
                "user_id" => $validated["author"],
                "category_id" => $validated["category"],
                "body" => $validated["body"],
                "img_path" => $uploadFile[1]
            ]);
        } else {
            unlink($uploadFile[1]);
        }

        alert()->success('Post Created Successfully.', 'Success Message')->persistent("close");

        return redirect()->route("admin.posts.index");
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $authors = User::where("role", "author")->get();

        return view("admin.pages.posts.edit", ["post" => $post, "categories" => $categories, "authors" => $authors]);
    }

    public function update(Request $request, Post $post)
    {

        $validated = $request->validate([
            'title' => 'required|max:128',
            'author' => 'required',
            'category' => 'required',
            'img_path' => 'required',
            'body' => 'required'
        ]);

        $uploadFile = Post::uploadImg($request);

        if ($uploadFile[0]) {
            $post->update([
                "title" => $validated["title"],
                "user_id" => $validated["author"],
                "category_id" => $validated["category"],
                "body" => $validated["body"],
                "img_path" => $uploadFile[1]
            ]);
        } else {
            unlink($uploadFile[1]);
            alert()->error('SomeThing Went Wrong!', 'Error Message')->persistent("close");

            return redirect()->route("admin.posts.index");
        }

        alert()->success('Post Edited Successfully.', 'Success Message')->persistent("close");

        return redirect()->route("admin.posts.index");
    }

    public function active(Post $post)
    {
        $post->update([
            "status" => !$post->status
        ]);

        alert()->success('Post Visibility Changed Successfully.', 'Success Message')->persistent("close");

        return redirect()->route("admin.posts.index");
    }

    public function delete(Post $post) {
        $post->delete();

        alert()->success('Post Deleted Successfully.', 'Success Message')->persistent("close");

        return redirect()->route("admin.posts.index");
    }
}
