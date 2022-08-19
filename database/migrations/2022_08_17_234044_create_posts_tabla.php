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
        Schema::create('posts_tabla', function (Blueprint $table) {
            $table->id();
            $table->string("title",255);
            $table->string("slug",255);
            $table->text("content");
            $table->string("image");
            $table->enum("posted",['yes','not']);
            $table->timestamps();
            //$table->foreingId('categories_id')->constrained() -> onDeleted('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_tabla');
    }
};
