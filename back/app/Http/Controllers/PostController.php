<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return response()->json(DB::table('posts')
        ->join('users','posts.author_id','=','users.id')
        ->select('posts.title','posts.creation_time','users.name','users.lastname')
        ->orderByDesc('posts.creation_time')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(Post::create([
            "title"=>$request->input('title'),
            "text"=>$request->input('text'),
            "creation_time"=>$request->input('creation_time'),
            "author_id"=>$request->input('author_id')
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
        return response()->json(DB::table('posts')
        ->join('users','posts.author_id','=','users.id')
        ->select('posts.title','posts.text','posts.creation_time','users.name','users.lastname')
        ->where('posts.id','=',$id)
        ->get()
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        return response()->json($post->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(Post::destroy($id));
    }
}
