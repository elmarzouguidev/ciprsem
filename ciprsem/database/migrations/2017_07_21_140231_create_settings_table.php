<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home_background')->nullable();
            $table->string('news_background')->nullable();
            $table->string('activities_background')->nullable();
            $table->string('picturs_background')->nullable();
            $table->string('videos_background')->nullable();
            $table->string('contact_background')->nullable();
            $table->integer('admin_id')->nullable();

            $table->foreign('admin_id')->references('id')->on('admins');
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
