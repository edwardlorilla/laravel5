<?php

use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::get('usersearch', function (Request $request) {

    $search = $request->search;
    $users = User::where('name', 'LIKE' , "%$search%")->orderBy('created_at', 'desc')->get();

    return response()->json(['users' => $users]);
});
Route::get('users', function () {

    $users = User::orderBy('created_at', 'desc')->get();

    return response()->json(['fetchUsers' => $users]);
});
Route::resource('/schedule', 'ScheduleController');
