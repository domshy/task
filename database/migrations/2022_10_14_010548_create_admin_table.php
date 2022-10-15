<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('admin', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('admin_id')->unique();
        //     $table->string('fname');
        //     $table->string('middlename');
        //     $table->string('lname');
        //     $table->string('gender');
        //     $table->string('contact');
        //     $table->string('dob');
        //     $table->string('birth_place');
        //     $table->string('email')->unique();
        //     $table->string('address');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
