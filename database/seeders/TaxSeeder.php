<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taxes')->insert([
            ['id' => 1, 'name' => 'IGST(0%)', 'tax_per' => 0.00, 'tax_type' => 'IGST', 'type' => 'S'],
            ['id' => 2, 'name' => 'IGST(5%)', 'tax_per' => 5.00, 'tax_type' => 'IGST', 'type' => 'S'],
            ['id' => 3, 'name' => 'IGST(12%)', 'tax_per' => 12.00, 'tax_type' => 'IGST', 'type' => 'S'],
            ['id' => 4, 'name' => 'IGST(18%)', 'tax_per' => 18.00, 'tax_type' => 'IGST', 'type' => 'S'],
            ['id' => 5, 'name' => 'IGST(28%)', 'tax_per' => 28.00, 'tax_type' => 'IGST', 'type' => 'S'],
            ['id' => 6, 'name' => 'CGST(0%)', 'tax_per' => 0.00, 'tax_type' => 'CGST', 'type' => 'S'],
            ['id' => 7, 'name' => 'CGST(2.5%)', 'tax_per' => 2.50, 'tax_type' => 'CGST', 'type' => 'S'],
            ['id' => 8, 'name' => 'CGST(6%)', 'tax_per' => 6.00, 'tax_type' => 'CGST', 'type' => 'S'],
            ['id' => 9, 'name' => 'CGST(9%)', 'tax_per' => 9.00, 'tax_type' => 'CGST', 'type' => 'S'],
            ['id' => 10, 'name' => 'CGST(14%)', 'tax_per' => 14.00, 'tax_type' => 'CGST', 'type' => 'S'],
            ['id' => 11, 'name' => 'SGST(0%)', 'tax_per' => 0.00, 'tax_type' => 'SGST', 'type' => 'S'],
            ['id' => 12, 'name' => 'SGST(2.5%)', 'tax_per' => 2.50, 'tax_type' => 'SGST', 'type' => 'S'],
            ['id' => 13, 'name' => 'SGST(6%)', 'tax_per' => 6.00, 'tax_type' => 'SGST', 'type' => 'S'],
            ['id' => 14, 'name' => 'SGST(9%)', 'tax_per' => 9.00, 'tax_type' => 'SGST', 'type' => 'S'],
            ['id' => 15, 'name' => 'SGST(14%)', 'tax_per' => 14.00, 'tax_type' => 'SGST', 'type' => 'S'],
            ['id' => 16, 'name' => 'GST(0%)', 'tax_per' => 0.00, 'tax_type' => 'GST', 'type' => 'G'],
            ['id' => 17, 'name' => 'GST(5%)', 'tax_per' => 5.00, 'tax_type' => 'GST', 'type' => 'G'],
            ['id' => 18, 'name' => 'GST(12%)', 'tax_per' => 12.00, 'tax_type' => 'GST', 'type' => 'G'],
            ['id' => 19, 'name' => 'GST(18%)', 'tax_per' => 18.00, 'tax_type' => 'GST', 'type' => 'G'],
            ['id' => 20, 'name' => 'GST(28%)', 'tax_per' => 28.00, 'tax_type' => 'GST', 'type' => 'G'],
        ]);
    }
}