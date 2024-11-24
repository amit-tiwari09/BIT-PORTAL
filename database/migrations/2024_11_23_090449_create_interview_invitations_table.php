<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_invitations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('application_id'); // Reference to job applications
            $table->date('interview_date');
            $table->time('interview_time');
            $table->string('interview_place');
            $table->timestamps();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            // Add foreign key constraint to the job application
            $table->foreign('application_id')->references('id')->on('job_applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_invitations');
    }
}
