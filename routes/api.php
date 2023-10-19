<?php

use App\Http\Controllers\Api\PluginController;

Route::get('plugins', [PluginController::class, 'index']);
Route::get('plugins/{plugin:slug}', [PluginController::class, 'show']);
