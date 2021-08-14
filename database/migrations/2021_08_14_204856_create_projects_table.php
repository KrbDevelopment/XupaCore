<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('title');
            $table->string('slogan');
            $table->text('description');

            $table->string('thumbnail')->nullable();
            $table->string('logo')->nullable();
            $table->string('color')->default('#e74c3c');

            $table->string('location_address')->nullable();
            $table->string('location_city')->nullable();

            $table->string('website_link')->nullable();
            $table->string('website_title')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
