<?php

namespace App\Models;

class Post
{
    public static function find($slug)
    {
        // base_path()          := '/' project root path
        // app_path()           := '/app' dir path
        // resource_path()      := '/resources' dir path
        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
            return redirect('/');
        }

        return cache()->remember("posts.{$slug}", 1, fn() => file_get_contents($path));
    }
}
