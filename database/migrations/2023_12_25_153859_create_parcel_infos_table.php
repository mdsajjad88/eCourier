<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_infos', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('category');
            $table->string('type');
            $table->string('contact');
            $table->string('name');
            $table->string('address');
            $table->string('district');
            $table->string('policestation');
            $table->string('cod');
            $table->string('note')->nullable();
            $table->string('weight')->nullable();
            $table->string('exchenge')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('parcel_infos');
    }
}
