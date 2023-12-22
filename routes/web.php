<?php

use App\Http\Controllers\GithubController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\VkontakteController;
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

// Домашняя страница сайта
Route::get('/', function () {
    return view('home');
});

// Способоы авторизации
Route::get('/auth/github', [GithubController::class, 'redirectToGithub'])->name('auth.github');
Route::get('/auth/github/callback', [GithubController::class, 'handleGithubCallback'])->name('auth.github.callback');

Route::get('/auth/vk', [VkontakteController::class, 'redirectToVk'])->name('auth.vk');
Route::get('/auth/vk/callback', [VkontakteController::class, 'handleVkCallback'])->name('auth.vk.callback');

Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');


Route::get('/checklist/{id}', [ChecklistsController::class, 'index'])->name('checklist.index');