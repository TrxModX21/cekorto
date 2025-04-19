<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notification_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(0)->constrained()->cascadeOnDelete();
            $table->string('sender')->nullable();
            $table->string('sent_from')->nullable();
            $table->string('sent_to')->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->string('notification_type')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_logs');
    }
};
