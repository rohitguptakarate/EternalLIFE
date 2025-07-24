<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::table('subcategory', function (Blueprint $table) {
            $table->dropColumn('Category_Name');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('subcategory', function (Blueprint $table) {
            $table->string('Category_Name')->nullable(); // or remove nullable if not needed
        });
    }
};