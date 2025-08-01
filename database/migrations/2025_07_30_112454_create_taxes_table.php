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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->string('name'); // VARCHAR(255) NOT NULL
            $table->decimal('tax_per', 19, 2); // DECIMAL(19,2) NOT NULL

            // ENUM values
            $table->enum('tax_type', ['IGST', 'CGST', 'SGST', 'GST']);
            $table->enum('type', ['S', 'G']);

            $table->timestamps(); // optional created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};