<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Yacht extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yacht', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->string('name');
            $table->string('slug');
            $table->longtext('map');
            $table->longtext('images');
            $table->longtext('description');
            $table->longtext('service');
            $table->longtext('utilities');
            $table->longtext('vehicle');
            $table->longtext('detail');
            $table->longtext('policy');
            $table->integer('trending')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yacht');
    }
}
