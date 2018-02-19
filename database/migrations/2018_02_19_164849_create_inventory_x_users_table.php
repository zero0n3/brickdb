<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryXUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_x_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('part_id',20);
            $table->foreign('part_id')->on('parts')->references('part_num');
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')->on('colors')->references('id');
            $table->integer('quantity')->unsigned();
            $table->integer('inventory_list_id')->unsigned();
            $table->foreign('inventory_list_id')->on('inventory_lists')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('inventory_x_users');
    }
}
