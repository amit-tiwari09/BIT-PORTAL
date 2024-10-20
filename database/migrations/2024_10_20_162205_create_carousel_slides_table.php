<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselSlidesTable extends Migration
{
    public function up()
    {
        Schema::create('carousel_slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('main_text');  // For "Join College Green Online"
            $table->string('secondary_text')->nullable(); // For "Choose from over 100 online and offline courses"
            $table->string('image')->nullable(); // For optional images in carousel
            $table->boolean('active')->default(false); // For setting the active slide
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carousel_slides');
    }
}


