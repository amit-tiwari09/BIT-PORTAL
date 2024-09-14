<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleAndFacultyToStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->string('role')->after('image'); // Add role column
            $table->string('faculty')->after('role'); // Add faculty column
        });
    }
    
    public function down()
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->dropColumn(['role', 'faculty']);
        });
    }
    
}
