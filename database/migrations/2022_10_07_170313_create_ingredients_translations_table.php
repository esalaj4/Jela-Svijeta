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
        Schema::create('ingredients_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('ingredients_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
        
            $table->unique(['ingredients_id', 'locale'],'ingredients_locale');
            $table->foreign('ingredients_id')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_translations');
    }
};
