<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
laravel new NOME_DO_PROJETO

composer update --ignore-platform-reqs

php artisan serve

php artisan make:controller HelloController
*/


Route::prefix('stores')->group(function (){
    Route::get('/', 'App\Http\Controllers\StoreController@index')->name('stores.index');
    Route::get('/create', 'App\Http\Controllers\StoreController@create')->name('stores.create');
    Route::post('/store', 'App\Http\Controllers\StoreController@store')->name('stores.store');
    Route::get('/{store}/edit', 'App\Http\Controllers\StoreController@edit')->name('stores.edit');
    Route::post('/update/{store}', 'App\Http\Controllers\StoreController@update')->name('stores.update');
    Route::get('/destroy/{store}', 'App\Http\Controllers\StoreController@destroy')->name('stores.destroy');
});

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

Route::get('/add_user', function () {
    $user = new \App\Models\User();
    $user->name = 'nome';
    $user->email = 'email';
    $user->password = bcrypt('12345678');

    return $user->save();

});

Route::get('hello/{nome?}', [\App\Http\Controllers\HelloController::class, 'hello']);

Route::get('/store', function () {
    $user = \App\Models\User::find(4);
    return $user->store;
});

Route::get('/models', function () {
    //pega o usuario
    $user = \App\Models\User::find(1);

    //add uma loja ao usuario
    $store = $user->store()->create([
        'name'=>"Loja teste",
        'description'=>'Descricao',
        'mobile_phone' => 'mobile phone',
        'phone'=>'phone',
        'slug' => 'loja-teste'
    ]);

    //add produto na loja
    $store = \App\Models\Store::find(41);
    $store->products()->create([
        'name' => '$this->faker->name()',
        'description' => '$this->faker->sentence',
        'body' => '$this->faker->paragraph(3, true)',
        'price' =>10.00,
        'slug' => '$this->faker->slug',
    ]);

    //cria categoria
    $categoria = \App\Models\Category::create([
        'name' =>' $this->faker->categoria()',
        'description' => '$this->faker->sentence',
        'slug' => '$this->faker->paragraph(3, true)',
    ]);

    //add categoria ao produto
    $produto = \App\Models\Product::find(1);
    dd($produto->categories()->sync([1]));

});


















