<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Remove the catch-all route that returns a view
// Route::get('/{any}', function () {
//     return view('app');
// })->where('any', '.*');

// Define only the route for serving your application's main view
Route::view('/{path?}', 'app')->where('path', '.*');

// Define the route for serving your application's main view and remove catch-all route
// This route should be the last one in the file to avoid conflicts with other routes
// Route::get('/{any}', function () {
//     return view('app');
// })->where('any', '.*');

// Define the resourceful route for books
Route::resource('books', BookController::class)->only(['index', 'show']);
