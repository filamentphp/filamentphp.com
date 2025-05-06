<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('stars')
            ->where('starrable_id', 'filament-themes')
            ->update(['starrable_id' => 'zepfietje-themes']);
    }
};
