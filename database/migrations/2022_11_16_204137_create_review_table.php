<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title', 100);
            $table->string('publisher', 100)->comment('出版会社');
            $table->string('image_path')->nullable()->comment('表紙の画像パス');
            $table->unsignedTinyInteger('score')->comment('得点');
            $table->string('content', 10000)->comment('感想本文');
            $table->boolean('is_favorite')->default(false)->comment('trueの場合はお気に入り');
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
        Schema::dropIfExists('reviews');
    }
};
