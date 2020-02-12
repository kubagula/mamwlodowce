<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreservativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preservatives', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('code', 8);
            $table->string('name', 300);
            $table->longText('description');
            $table->string('category', 300);
            $table->boolean('bad')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preservatives');
    }
}
