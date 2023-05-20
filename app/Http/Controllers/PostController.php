<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;
    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }
    public function index()
    {
        return response()->json([
            "success" => true,
            "code" => 200,
            "message" => "Berhasil get data post!",
            "data" => $this->post->getAllPosts()
        ], 200);
    }
    public function store(Request $request)
    {
        $postData = $request->all();
        return response()->json([
            "success" => true,
            "code" => 201,
            "message" => "Berhasil membuat post baru!",
            "data" => $this->post->createPost($postData)
        ], 201);
    }
    public function show($postId)
    {
        return response()->json([
            "success" => true,
            "code" => 200,
            "message" => "Berhasil mendapatkan detail post!",
            "data" => $this->post->getDetailPost($postId)
        ], 200);
    }
    public function update(Request $request, $postId)
    {
        $postData = $request->all();
        return response()->json([
            "success" => true,
            "code" => 200,
            "message" => "Berhasil update data post!",
            "data" => $this->post->updatePost($postId, $postData)
        ], 200);
    }
    public function destroy($postId)
    {
        return response()->json([
            "success" => true,
            "code" => 200,
            "message" => "Berhasil delete data post!",
            "data" => $this->post->deletePost($postId)
        ], 200);
    }
}
