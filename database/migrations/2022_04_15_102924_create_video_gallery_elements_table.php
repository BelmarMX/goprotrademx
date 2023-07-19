<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoGalleryElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_gallery_elements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('video_gallery_id');
            $table->enum('type', ['image', 'video', 'podcast', 'mixed']);
            $table->string('title');
            $table->string('description')->nullable();
            $table->text('image')->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('url')->nullable();
            $table->text('insertion_code')->nullable();
            $table->text('full_script')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('video_gallery_id')->references('id')->on('video_galleries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_gallery_elements');
    }
}
