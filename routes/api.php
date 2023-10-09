<?php

use App\Models\Plugin;

Route::get('/plugins', function(){
    return (Plugin::all());
});
