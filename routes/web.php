<?php

use App\Models\BlogPost;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    return view('posts', [
        'posts' => BlogPost::all()
    ]);
});

                       // BlogPost::where('slug', $post)->firstOrFail()
// Route::get('posts/{post:slug}', function (BlogPost $post) {
Route::get('posts/{post}', function (BlogPost $post) {
    return view('post', [
        'post' => $post
    ]);
});
