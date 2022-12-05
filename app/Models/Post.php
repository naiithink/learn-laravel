<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        return File::files(resource_path('posts/'));
    }

    public static function find($slug)
    {
        // base_path()          := '/' project root path
        // app_path()           := '/app' dir path
        // resource_path()      := '/resources' dir path
        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
            // return redirect('/');
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", 1, fn() => file_get_contents($path));
    }
}
