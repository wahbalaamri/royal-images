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
        Schema::create('vips_names', function (Blueprint $table) {
            $table->id();
            $table->integer('vip_title');
            $table->integer('vip_group');
            $table->integer('nationality');
            $table->string("name_ar");
            $table->string("name_en");
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
        Schema::dropIfExists('vips_names');
    }
};
