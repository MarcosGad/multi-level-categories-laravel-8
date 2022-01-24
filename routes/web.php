<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;


Route::get('/', function () {
    return view('welcome', [
        'categories' => Category::tree(),
    ]);
})->name('welcome');

Route::get('tree', function () {
    return Category::tree();
});

Route::get('/category/{category}', function (Category $category) {
    return $category;
})->name('category');
