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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 191)->comment('名前');
            $table->unsignedInteger('genre_id')->comment('売り場ID');
            $table->unsignedInteger('area_id')->comment('産地ID');
            $table->double('price')->comment('価格');
            $table->text('description')->comment('説明');
            $table->string('image', 191)->comment('画像URL');
            $table->timestamp('created_at')->useCurrent()->nullable()->comment('作成日時');
            $table->timestamp('updated_at')->useCurrent()->nullable()->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
