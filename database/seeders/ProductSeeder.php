<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $productosJson = file_get_contents("database/pokemon.json");
        $productosArray = json_decode($productosJson, true);
        var_dump($productosArray);

        foreach ($productosArray as $key => $value) {
            $key = new Product();
            $key->setName($value['name']);
            $key->setDescription($value['description']);
            $key->setImage($value['image']);
            $key->setPrice($value['price']);
            $key->save();
        }
    }
}
