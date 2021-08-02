<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('TrackID')->unique();
            $table->string('item_name');
            $table->double('item_weight');
            $table->double('item_cost');
            $table->string('owner_name');
            $table->string('owner_email');
            $table->string('owner_address');
            $table->string('owner_phone');
            $table->date('doc');
            $table->date('dod');
            $table->string('r_address');
            $table->string('r_phone');
            $table->string('r_name');
            $table->string('r_email');
            $table->integer('status');
            $table->string('c_location');
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();

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
        Schema::dropIfExists('items');
    }
}