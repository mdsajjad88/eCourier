<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marchents', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('primary_num');
            $table->string('local_address');
            $table->string('upozilla');
            $table->string('district');
            $table->string('division');
           
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
        Schema::dropIfExists('marchents');
    }
}
