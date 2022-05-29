<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTricksTable extends Migration
{
    public function up()
    {
        Schema::create('tricks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->json('categories')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('favorites')->default(0);
            $table->string('slug')->nullable();
            $table->string('status');
            $table->string('title');
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tricks');
    }
}
