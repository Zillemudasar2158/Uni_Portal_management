<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultymemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facultymem', function (Blueprint $table) {
            $table->id();
            $table->string('CNIC');
            $table->string('email');
            $table->string('dept_id');
            $table->string('deptname');
            $table->string('password');
            $table->string('name');
            $table->string('designation');
            $table->string('add_charge');
            $table->string('profile_img');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('facultymem');
    }
}
