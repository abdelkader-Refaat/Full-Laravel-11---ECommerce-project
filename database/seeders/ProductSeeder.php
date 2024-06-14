<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DB::table('products')->insert([
        //     "category_id" => "required|exists:App\Models\Category,id",
        //     "name_ar" => "required",
        //     "name_en" => "required",
        //     "slug" => "required",
        //     "short_description_ar" => "required",
        //     "short_description_en" => "required",
        //     "image" => "required|image",
        //     "price" => "required",
        //     "selling_price" => "required",
        //     "qty" => "required",
        //     "tax" => "required",
        //     "meta_title" => "required",
        //     "description_ar" => "required",
        //     "description_en" => "required",
        //     "meta_keywords" => "required",
        //  ]);
    }
}
