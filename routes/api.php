<?php

Route::get('plugins', [\App\Http\Controllers\Api\PluginController::class, 'index']);
Route::get('plugins/{plugin:slug}', [\App\Http\Controllers\Api\PluginController::class, 'show']);
