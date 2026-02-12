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
        //
        Schema::table('categories', function (Blueprint $table) {
            // phân cấp category
            $table->foreignId('parent_id')
                ->nullable()
                ->after('slug')
                ->constrained('categories')
                ->nullOnDelete();

            // bật / tắt hiển thị
            $table->boolean('is_active')
                ->default(true)
                ->after('parent_id');

            // sắp xếp menu
            $table->unsignedInteger('sort_order')
                ->default(0)
                ->after('is_active');

            // SEO
            $table->string('meta_title')
                ->nullable()
                ->after('sort_order');

            $table->text('meta_description')
                ->nullable()
                ->after('meta_title');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
