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
            $table->string('part_num',20);
            $table->string('name',128);
            $table->integer('part_cat_id')->unsigned();
            $table->foreign('part_cat_id')->on('categories')->references('id');
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
