<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function store(array $data, $image = null)
    {
        DB::transaction(function () use($data, $image) {
            $post = Post::create($data);

            if($image){
                $post->addMedia($image)->toMediaCollection();
            }
        }, 5);
    }
}
