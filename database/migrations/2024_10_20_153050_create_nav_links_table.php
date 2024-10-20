<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavLinksTable extends Migration
{
    public function up()
    {
        Schema::create('nav_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->unique(); // Name of the nav link
            $table->text('value'); // URL of the nav link
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nav_links');
    }
}
