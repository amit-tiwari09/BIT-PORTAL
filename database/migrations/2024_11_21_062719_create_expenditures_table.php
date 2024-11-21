<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item'); // Expenditure item
            $table->decimal('amount', 20, 2); // Amount spent
            $table->date('date'); // Date of expenditure
            $table->string('person_name'); // Name of the person who spent the money
            $table->text('description')->nullable(); // Optional description
            $table->timestamps(); // Cr
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenditures');
    }
}
