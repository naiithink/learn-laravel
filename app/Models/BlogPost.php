<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $guarded = ['id'];
    // protected $fillable = ['title', 'content'];

    // Alternative of Route::get('posts/{post:slug}', function (BlogPost $post) {
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
