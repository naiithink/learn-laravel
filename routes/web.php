<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome'); // ['foo' => 'bar']; // 'hello, world';
    return view('posts');
});

// Route::get('posts/{post}', function($slug) {
//     // return $slug;

//     // $post = file_get_contents(__DIR__ . "/../resources/posts/{$slug}.html");
//     $path = __DIR__ . "/../resources/posts/{$slug}.html";

//     // ddd($path);

//     if (! file_exists($path)) {
//         // ddd  := Dump, Die, Debug
//         // ddd('File does not exist');

//         // dd   := Dump and Die
//         // dd('File does not exist');

//         // abort(404);

//         return redirect('/');
//     }


//     // $post = file_get_contents($path);

//     // <https://laravel.com/docs/9.x/cache#the-cache-helper>
//     // cache()->remember(key: String, sec: int, )
//     // $post = cache()->remember("posts.{$slug}", now()->addMinites(20), function() use ($path) {
//     // $post = cache()->remember("posts.{$slug}", 1200, function() use ($path) {
//     //     var_dump('file_get_contents');
//     //     return file_get_contents($path);
//     // });

//     $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));


//     return view('post', [
//         // 'post' => '<h1>Hello World</h1>' // $post
//         'post' => $post
//     ]);

//     // where(<var>, <regex>)
//     // '{post}', the 1st param of 'Route::get()'
// })->where('post', '[A-z_\-]+');
// // })->whereAlpha('post');

Route::get('posts/{post}', function($slug) {
    // Find a post by its slug and pass it to a view called "post"

    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);

    // if (! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
    //     return redirect('/');
    // }

    // $post = cache()->remember("posts.{$slug}", 1, fn() => file_get_contents($path));

    // return view('post', [
    //     'post' => $post
    // ]);
})->where('post', '[A-z_\-]+');
