<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_no');
            $table->text('address');
            $table->date('dob');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('department', ['Computer', 'Mechanical', 'Electrical', 'Electronics', 'Civil']);
            $table->string('previous_education');
            $table->decimal('marks', 5, 2);
            $table->year('graduation_year');
            $table->string('registration_no')->unique();
            $table->string('faculty');
            $table->date('admission_date');
            $table->string('image')->nullable(); // Assuming this is for the profile picture
            $table->timestamps();
            
            // Fields for document paths
            $table->string('certificate_path')->nullable();
            $table->string('tc_path')->nullable();
            $table->string('cc_path')->nullable();
            $table->string('marksheet_path')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
