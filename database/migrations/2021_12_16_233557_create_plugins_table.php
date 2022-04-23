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
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('author_name')->nullable();
            $table->json('categories')->nullable();
            $table->longText('description')->nullable();
            $table->longText('docs')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_paid')->default(0);
            $table->string('github_repository')->nullable();
            $table->string('license');
            $table->string('license_url');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('status');
            $table->string('unlock_id')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('views')->default(0);
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
