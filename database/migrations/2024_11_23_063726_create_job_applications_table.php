<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_vacancy_id'); // Job Vacancy ID
            $table->unsignedBigInteger('student_id'); // Student who applied
            
            // Foreign key to the job_vacancies and students tables
            $table->foreign('job_vacancy_id')->references('id')->on('job_vacancies')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->json('documents'); // Store student-submitted documents in JSON format
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
}
