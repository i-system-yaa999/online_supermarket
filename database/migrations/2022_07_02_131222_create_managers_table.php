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
        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->unsignedInteger('genre_id')->comment('売り場ジャンル');
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
        Schema::dropIfExists('managers');
    }
};
