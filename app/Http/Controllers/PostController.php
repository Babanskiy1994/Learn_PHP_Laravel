<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Стандартная пагинация не работает после контейнеризации: $posts = Post::orderBy("created_at", "DESC")->paginate(3);
        $page = $request->input('page');
        $posts = DB::table('posts')->paginate($perPage = 3, $columns = ['*'], $pageName = 'page', $page);
        $posts->withPath('/posts');

        return view('posts.index', [
            "posts" => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', [
            "post" => $post,
        ]);
    }

    public function comment($id, CommentForm $request)
    {
        $post = Post::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect(route("posts.show", $id));
    }
}
