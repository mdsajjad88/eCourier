<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddBalancesTable extends Migration
{
    
    public function up()
    {
        Schema::create('add_balances', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('tnx_code');
            $table->string('our_account')->nullable();
            $table->string('pay_method')->nullable();
            $table->string('pay_account')->nullable();
            $table->string('pay_date')->nullable();
            $table->string('pay_tnx')->nullable();
            $table->string('pay_status')->nullable();
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
        Schema::dropIfExists('add_balances');
    }
}
