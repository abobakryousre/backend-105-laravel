<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => "test Product 1",
            "price" => 10.5
        ]);
        DB::table('products')->insert([
            'name' => "test Product 2",
            "price" => 200.20
        ]);
    }
}
