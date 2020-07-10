<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCertificateSentToWinners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('winners', function (Blueprint $table) {
            //
            $table->boolean('certificate_sent')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('winners', function (Blueprint $table) {
            //
            $table->dropColumn('certificate_sent');
        });
    }
}
