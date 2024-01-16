<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDelivaredHubToParcelInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parcel_infos', function (Blueprint $table) {
            $table->string('delivared_branch')->nullable();
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
            $table->dropColumn('derivared_branch');
        });
    }
}
