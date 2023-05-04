<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tricks', function (Blueprint $table) {
            $table->string('filament_version')->nullable()->after('views');
        });
    }

    public function down() {
        Schema::table('tricks', function (Blueprint $table) {
            $table->dropColumn('filament_version');
        });
    }
};
