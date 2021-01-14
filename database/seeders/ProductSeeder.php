<?php

namespace Database\Seeders;

namespace Database\Seeders\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory(50)->create();
    }
}
