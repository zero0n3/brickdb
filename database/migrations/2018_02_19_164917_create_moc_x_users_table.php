<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMocXUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moc_x_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('part_id',20)->nullable();
            $table->foreign('part_id')->on('parts')->references('part_num')->onDelete('set null')->onUpdate('cascade');
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')->on('colors')->references('id');
            $table->integer('quantity')->unsigned();
            $table->integer('moc_list_id')->unsigned();
            $table->foreign('moc_list_id')->on('moc_lists')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('moc_x_users');
    }
}
