<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\PluginController;
use Illuminate\Support\Facades\Route;

Route::get('plugins', [PluginController::class, 'index']);
Route::get('plugins/{plugin:slug}', [PluginController::class, 'show']);

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{author:slug}', [AuthorController::class, 'show']);
