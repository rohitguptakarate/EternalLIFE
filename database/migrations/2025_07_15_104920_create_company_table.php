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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name', 150);
            $table->string('contact', 15);
            $table->string('email', 100);
            $table->string('gst_in', 15);
            $table->string('pan', 10);
            $table->text('office_address');
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('pin_code', 6);
            $table->string('account_name', 100);
            $table->string('account_number', 20);
            $table->string('ifsc', 11);
            $table->string('bank_name', 100);
            $table->string('branch_name', 100);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};  

            // $table->id();
            // $table->timestamps();
            // $table->string('first_name');
            // $table->string('middle_name')->nullable();
            // $table->string('last_name');
            // $table->date('dob');
            // $table->string('gender');
            // $table->string('mobile_no');
            // $table->string('alternate_mobile_no');
            // $table->string('email_address');
            // $table->string('subject_name');