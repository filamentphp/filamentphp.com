<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('commentator', 'commentator_comments');
            $table->morphs('commentable');
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');
            $table->longText('original_text');
            $table->longText('text');
            $table->json('extra')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });

        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('commentator', 'commentator_reactions');
            $table->foreignId('comment_id')->references('id')->on('comments')->cascadeOnDelete();
            $table->string('reaction')->collation('utf8mb4_bin');
            $table->timestamps();
        });

        Schema::create('comment_notification_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->morphs('commentable', 'cn_subscriptions_commentable');
            $table->morphs('subscriber', 'cn_subscriptions_subscriber');
            $table->string('type');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('reactions');
        Schema::dropIfExists('comment_notification_subscriptions');
    }
};
