<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class YachtRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yacht-room', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('yacht_id');
            $table->longtext('image');
            $table->string('name');
            $table->string('slug');
            $table->longtext('properties');
            $table->longtext('services');
            $table->integer('prices');
            $table->integer('discount')->default(0);
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
        Schema::dropIfExists('yacht-room');
    }
}
