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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->boolean('status')->default(1)->comment('0 => banned, 1 => active');
            $table->boolean('ev')->default(0)->comment('0 => email unverified, 1 => email verified');
            $table->string('ver_code')->comment('stores verification code')->nullable();
            $table->dateTime('ver_code_send_at')->comment('stores verification send time')->nullable();
            $table->string('ban_reason')->nullable();
            $table->string('login_by')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('provider')->nullable();
            $table->text('provider_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
