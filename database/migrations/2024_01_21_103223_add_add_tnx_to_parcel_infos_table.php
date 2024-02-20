<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddTnxToParcelInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parcel_infos', function (Blueprint $table) {
            $table->string('our_account')->nullable();
            $table->string('pay_method')->nullable();
            $table->string('pay_account')->nullable();
            $table->string('pay_date')->nullable();
            $table->string('pay_tnx')->nullable();
            $table->string('pay_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parcel_infos', function (Blueprint $table) {
           $table->dropColumn('our_account');
           $table->dropColumn('pay_method');
           $table->dropColumn('pay_account');
           $table->dropColumn('pay_date');
           $table->dropColumn('pay_tnx');
           $table->dropColumn('pay_status');
        });
    }
}
