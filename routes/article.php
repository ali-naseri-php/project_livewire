<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', \App\Livewire\Article\Home::class)->name('/')->middleware(['auth']);
Route::get('/dashboard',\App\Livewire\Article\DashboardArticle::class )->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/articles/new',\App\Livewire\Article\NewArticle::class)->middleware(['auth'])->name('articles.new');
Route::get('/articles/{article}',\App\Livewire\Article\ShowArticle::class)->middleware(['auth'])->name('articles.show');
Route::get('/{whereTag}',\App\Livewire\Article\Home::class)->middleware(['auth'])->name('articles.where');

