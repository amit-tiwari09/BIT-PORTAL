<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaLinksTable extends Migration
{
    public function up()
    {
        Schema::create('social_media_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('url');
            $table->string('image')->nullable(); // For storing the image name
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_media_links');
    }
}
