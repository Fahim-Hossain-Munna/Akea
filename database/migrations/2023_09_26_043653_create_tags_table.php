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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag_name');
            $table->string('tag_slug');
            $table->longText('tag_description');
            $table->timestamps();
        });
        Schema::create('blog_tag', function (Blueprint $table) {
            $table->integer('blog_id');
            $table->integer('tag_id');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('blog_tag');
    }
};
