<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidPlayedToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_order', function (Blueprint $table) {
            $table->boolean('paid')->default(0);
            $table->boolean('played')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_order', function (Blueprint $table) {
            $table->dropColumn('paid');
            $table->dropColumn('played');
        });
    }
}
