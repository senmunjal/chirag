<?php

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

Route::get('post/{post}', function ($post) {
    $posts=[
        '1'=>"chirag",
        '2'=>"test"
    ];
    return view('welcome',[
        'post'=>$posts[$post] ?? 'Nothing'
    ]);
});

Route::get('/',function(){
    return view('adduser');
});

Route::resource('/user','StudentController');