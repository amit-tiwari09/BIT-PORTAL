<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_no');
            $table->text('address');
            $table->date('dob');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('applicant_type', ['student', 'staff']); // Added for type differentiation
            $table->enum('department', ['Computer', 'Mechanical', 'Electrical', 'Electronics', 'Civil'])->nullable();
            $table->string('previous_education')->nullable(); // Only for students
            $table->decimal('marks', 5, 2)->nullable(); // Only for students
            $table->year('graduation_year')->nullable(); // Only for students
            $table->string('subject')->nullable(); // Only for staff
            $table->integer('experience')->nullable(); // Only for staff
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');

            // Fields for document paths (students only)
            $table->string('certificate_path')->nullable();
            $table->string('tc_path')->nullable();
            $table->string('cc_path')->nullable();
            $table->string('marksheet_path')->nullable();

            // Resume field (staff only)
            $table->string('resume_path')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
