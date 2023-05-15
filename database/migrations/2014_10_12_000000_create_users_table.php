<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('f_name_ar');
            $table->string('s_name_ar')->nullable();
            $table->string('t_name_ar')->nullable();
            $table->string('l_name_ar')->nullable();
            $table->string('f_name_en');
            $table->string('s_name_en')->nullable();
            $table->string('t_name_en')->nullable();
            $table->string('l_name_en')->nullable();
            $table->string('job_title_ar');
            $table->string('job_title_en');
            $table->string('user_type')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
