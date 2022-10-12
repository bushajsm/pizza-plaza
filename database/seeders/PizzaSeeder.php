<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza;
use Illuminate\Support\Str;
class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pizza::create([
            'id'=>4,
            'name' => 'Magherita',
            'slug' => Str::slug('Magherita'),
            'description' => 'Eine leckere Käsepizza.',
            'image_name' => '1.png',
            'price' =>  4.00,
            'sale_price' => 4.00,
            'pizza_of_the_day'=> 1
        ]);
        Pizza::create([
            'id'=>5,
            'name' => 'Napoli',
            'slug' => Str::slug('Napoli'),
            'description' => 'Ein Mix aus Sardellen und Oliven bieten den ultimativen Flair.',
            'image_name' => '2.png',
            'price' =>  5.50,
            'sale_price' => 5.50,
            'pizza_of_the_day'=> 1
        ]);
        Pizza::create([
            'id'=>6,
            'name' => 'Salami',
            'slug' => Str::slug('Salami'),
            'description' => 'Der Klassiker unter den Pizzen.',
            'image_name' => '3.png',
            'price' =>  4.70,
            'sale_price' => 4.70,
            'pizza_of_the_day'=> 1
            
        ]);
        Pizza::create([
            'id'=>7,
            'name' => 'Prosciutto',
            'slug' => Str::slug('Prosciutto'),
            'description' => 'Der im Volksmund auch als Schinkenpizza bekannte Klassiker.',
            'image_name' => '4.png',
            'price' =>  4.70,
            'sale_price' => 4.70,
            'pizza_of_the_day'=> 0
        ]);
        Pizza::create([
            'id'=>8,
            'name' => 'Funghi',
            'slug' => Str::slug('Funghi'),
            'description' => 'Die beste Wahl für alle Pilzliebhaber.',
            'image_name' => '5.png',
            'price' =>  4.70,
            'sale_price' => 4.70,
            'pizza_of_the_day'=> 0
        ]);
        Pizza::create([
            'id'=>9,
            'name' => 'Salami-Paprika',
            'slug' => Str::slug('Salami-Paprika'),
            'description' => 'Die beste Kombination zwischen deftig und frisch!',
            'image_name' => '6.png',
            'price' =>  5.50,
            'sale_price' => 5.50,
            'pizza_of_the_day'=> 0
        ]);
        Pizza::create([
            'id'=>10,
            'name' =>  'Tricolore',
            'slug' => Str::slug('Tricolore'),
            'description' => '100% vegetarisch - 100% lecker!',
            'image_name' => '1.png',
            'price' =>  5.50,
            'sale_price' => 5.50,
            'pizza_of_the_day'=> 0
        ]);
        Pizza::create([
            'id'=>11,
            'name' => 'Diavolo',
            'slug' => Str::slug('Diavolo'),
            'description' => 'Teuflisch scharf!',
            'image_name' => '2.png',
            'price' =>  5.50,
            'sale_price' => 5.50,
            'pizza_of_the_day'=> 0
        ]);
        Pizza::create([
            'id'=>12,
            'name' => 'Roma',
            'slug' => Str::slug('Roma'),
            'description' => 'Schinken und Champignons, köstlich im Steinofen zubereitet.',
            'image_name' => '3.png',
            'price' =>  5.50,
            'sale_price' => 5.50,
            'pizza_of_the_day'=> 0
        ]);
        

    }
}
