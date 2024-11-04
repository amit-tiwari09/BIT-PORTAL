<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeStructuresTable extends Migration
{
    public function up()
    {
        Schema::create('fee_structures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('department', ['Computer', 'Mechanical', 'Electrical', 'Electronics', 'Civil']);
            $table->decimal('semester1_fee', 12, 2); // Allows for values up to 9999999999.99
            $table->decimal('semester2_fee', 12, 2);
            $table->decimal('semester3_fee', 12, 2);
            $table->decimal('semester4_fee', 12, 2);
            $table->decimal('semester5_fee', 12, 2);
            $table->decimal('semester6_fee', 12, 2);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fee_structures');
    }
}
