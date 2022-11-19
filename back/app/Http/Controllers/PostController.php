<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    PostStoreRequest,
    PostUpdateRequest
};
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Post::class);

        return response()->json(DB::table('posts')
        ->join('users', 'posts.author_id', '=', 'users.id')
        ->select('posts.title', 'posts.creation_time', 'users.name', 'users.lastname')
        ->orderByDesc('posts.creation_time')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $this->authorize('create',Post::class);

        return response()->json(Post::create([
            "title" => $request->input('title'),
            "text" => $request->input('text'),
            "creation_time" => $request->input('creation_time'),
            "author_id" => $request->input('author_id')
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Post::class);

        return response()->json(DB::table('posts')
        ->join('users', 'posts.author_id', '=', 'users.id')
        ->select('posts.title', 'posts.text', 'posts.creation_time', 'users.name', 'users.lastname')
        ->where('posts.id', '=', $id)
        ->get()
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        return response()->json($post->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        return response()->json($post->delete());
    }
}
