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
        Schema::create('notification_templates', function (Blueprint $table) {
            $table->id();
            $table->string('act')->nullable();
            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->string('push_title')->nullable();
            $table->text('email_body')->nullable();
            $table->text('sms_body')->nullable();
            $table->text('push_body')->nullable();
            $table->text('shortcodes')->nullable();
            $table->boolean('email_status')->default(1);
            $table->string('email_sent_from_name')->nullable();
            $table->string('email_sent_from_address')->nullable();
            $table->boolean('sms_status')->default(1);
            $table->string('sms_sent_from')->nullable();
            $table->boolean('push_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_templates');
    }
};
