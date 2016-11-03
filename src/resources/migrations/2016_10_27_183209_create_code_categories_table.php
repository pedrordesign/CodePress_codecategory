<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */    
    public function up()
    {
        Schema::create('codepress_categories', function (Blueprint $table){
            $table->increments('id');
            $table->integer('parent_id')->nullable(true)->unsigned();
            $table->foreign('parent_id')->references('id')->on('codepress_categories');
            $table->string('name');
            $table->string('slug');
            $table->boolean('active')->default(false);
            $table->integer('categorizable_id')->nullable();
            $table->string('categorizable_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('codepress_categories');
    }
}
