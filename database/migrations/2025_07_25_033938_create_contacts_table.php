<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            // Basic Info
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('website')->nullable();

            // Billing Address
            $table->text('billaddress')->nullable();
            $table->unsignedBigInteger('billstate')->nullable();
            $table->foreign('billstate')->references('id')->on('states')->onDelete('set null');
            $table->string('billcity')->nullable();
            $table->string('billpin')->nullable();

            // Shipping Address
            $table->text('shippaddress')->nullable();
            $table->unsignedBigInteger('shippstate')->nullable();
            $table->foreign('shippstate')->references('id')->on('states')->onDelete('set null');
            $table->string('shippcity')->nullable();
            $table->string('shipppin')->nullable();

            // Other Information
            $table->string('gsttreatment')->nullable();
            $table->string('gstin')->nullable();
            $table->string('pan')->nullable();
            $table->unsignedBigInteger('sourceofsupply')->nullable();
            $table->foreign('sourceofsupply')->references('id')->on('states')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};