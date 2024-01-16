<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserDistrictToParcelInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parcel_infos', function (Blueprint $table) {
            $table->string('user_district');
        });
    }

    public function down()
    {
        Schema::table('parcel_infos', function (Blueprint $table) {
            $table->dropColumn('user_district');
        });
    }
}
