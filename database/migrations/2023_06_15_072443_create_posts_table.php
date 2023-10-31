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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('age');
            $table->integer('gender');
            $table->string('fname');
            $table->string('mname');
            $table->string('paddress');
            $table->string('lfarea');
            $table->date('lfdate');
            $table->string('image');
            $table->longText('description');
            $table->string('nametwo');
            $table->integer('phone');
            $table->string('email');
             
            $table->tinyInteger('request');
            $table->tinyInteger('category');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
