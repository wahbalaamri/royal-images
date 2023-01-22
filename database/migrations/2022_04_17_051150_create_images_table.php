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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image_url');//auto extraction
            $table->date('image_date');//entered by user
            $table->string('image_year');//auto extraction
            $table->string('image_month');//auto extraction
            // $table->json('vips_in_image');//entered by user
            $table->string('image_occasion');//entered by user
            $table->string('image_location');//entered by user
            $table->string('image_color_mode');//entered by user and maybe extracted from image
            $table->string('image_quality');//entered by user
            $table->string('image_type');//entered by user
            $table->string('image_file_type');//extracted from image
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
        Schema::dropIfExists('images');
    }
};
