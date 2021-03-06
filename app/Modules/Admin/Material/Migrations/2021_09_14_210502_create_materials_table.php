<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');

            $table->string('alias');
            $table->string('title');

            $table->integer('courses_id')->unsigned()->nullable();;
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');

            $table->integer('methods_id')->unsigned()->nullable();

            $table->foreign('methods_id')->references('id')->on('methods')->onDelete('cascade');

            $table->string('description');
            $table->string('content');

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
        Schema::dropIfExists('materials');
    }
}
