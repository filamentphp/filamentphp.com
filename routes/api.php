<?php

use App\Http\Controllers\Api\PluginController;
use Illuminate\Support\Facades\Route;

Route::get('plugins', [PluginController::class, 'index']);
Route::get('plugins/{plugin:slug}', [PluginController::class, 'show']);
