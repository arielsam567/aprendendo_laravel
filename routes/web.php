<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
laravel new NOME_DO_PROJETO

composer update --ignore-platform-reqs

php artisan serve

php artisan make:controller HelloController
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/teste', function () {
    return 'view(welcome)';
});

Route::get('teste/{nome?}', function () {
    return 'view(welcome)';
});


Route::get('jobs', function () {
    return \App\Models\Job::all();
});

Route::get('jobs/{id}', function ($id) {
    //$job = \App\Models\Job::where('id', $id).first();
    $job = \App\Models\Job::find($id);
    return $job;
});


//ATRIBUICAO EM MASSA

Route::get('/users/create', function () {

    return \App\Models\User::create([
        'name'=> "testre",
        'email'=> "da1",
        'password'=>bcrypt(96385274)
    ]);

});

Route::get('jobs/remove', function () {
    $job = \App\Models\Job::find(33);
    return $job->delete();
});

Route::get('users', function () {
    return User::all();
});

Route::get('/model', function () {
    $user = new \App\Models\User();
    $user->name = 'nome';
    $user->email = 'email';
    $user->password = bcrypt('12345678');

    return $user->save();

});



Route::get('hello/{nome?}', [\App\Http\Controllers\HelloController::class, 'hello']);
