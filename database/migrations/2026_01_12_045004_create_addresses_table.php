<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('addresses', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('label')->default('home'); // home/work/others
    $table->string('main_location');          // địa chỉ chính
    $table->string('landmark')->nullable();   // gần địa danh
    $table->string('alternative')->nullable();// địa chỉ phụ
    $table->string('pin_code')->nullable();
    $table->string('city_state')->nullable();
    $table->string('country')->nullable();
    $table->boolean('is_default')->default(false);
    $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
