<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePluginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plugins', function (Blueprint $table) {
            $table->id();
            $table->longText('description')->nullable();
            $table->longText('docs')->nullable();
            $table->boolean('is_hosted')->default(false);
            $table->string('name');
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->string('package_name')->nullable();
            $table->unsignedBigInteger('price')->default(0);
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plugins');
    }
}
