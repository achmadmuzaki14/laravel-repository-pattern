<?php

namespace App\Repositories;

use App\Models\Post;

interface PostRepositoryInteface
{
    public function getAllPosts();
    public function getDetailPost($postId);
    public function createPost(array $data);
    public function updatePost($postId, array $data);
    public function deletePost($postId);
}

class PostRepository implements PostRepositoryInteface 
{
    public function getAllPosts()
    {
        return Post::all();
    }
    public function getDetailPost($postId)
    {
        return Post::findOrFail($postId);
    }
    public function createPost(array $data)
    {
        return Post::create($data);
    }
    public function updatePost($postId, array $data)
    {
        return Post::whereId($postId)->update($data);
    }
    public function deletePost($postId)
    {
        return Post::whereId($postId)->delete();
    }
}
?>