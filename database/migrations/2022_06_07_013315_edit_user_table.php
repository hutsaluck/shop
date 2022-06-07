<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usders', function (Blueprint $table) {
            $table->string('lastname')->after('name')->nullable();
            $table->string('phone')->after('email')->nullable();
            $table->string('address')->after('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usders', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
};
