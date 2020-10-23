<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class
CreateMakinasTable extends Migration
{
    /**
     * Run the migrations.database/migrations/2014_10_12_000000_create_users_table.php
        modified:   database/migrations/2020_04_02_175121_create_makinas_table.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makinas', function (Blueprint $table) {
            $table->id();
            $table->string('karburanti');
            $table->string('kambio');
            $table->string('tipi');
            $table->integer('cmimi');
            $table->integer('viti');
            $table->string('qyteti');
            $table->string('pershkrimi');
            $table->boolean('fshire')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('user_id');//foreign key
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');  //kur fshijme user fshihen dhe makinat e tija
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('makinas');
    }
}
