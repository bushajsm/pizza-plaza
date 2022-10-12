<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Extra;
use Illuminate\Support\Facades\DB;
class ExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Extra::create([
            'name' => 'Tomaten',
            'price' =>  1,
            'isChoosable' => 0,
        ]);
        Extra::create([
            'name' => 'Käse',
            'price' =>  1,
            'isChoosable' => 0,
        ]);
        Extra::create([
            'name' => 'Sardellen',
            'price' =>  1,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' => 'Oliven',
            'price' =>  1,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' => 'Salami',
            'price' =>  0.5,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' => 'Schinken',
            'price' =>  0.5,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' => 'Champignons',
            'price' =>  0.75,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' => 'Paprika',
            'price' =>  0.5,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' => 'Mozzarella',
            'price' =>  1,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' => 'Basilikum',
            'price' =>  0.75,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' =>  'Peperoniwurst',
            'price' =>  1,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' => 'Zwiebeln',
            'price' =>  0.5,
            'isChoosable' => 1,
        ]);
        Extra::create([
            'name' => 'Knoblauch',
            'price' =>  0.5,
            'isChoosable' => 1,
        ]);
        
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 4,
            'extra_id' => 1
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 4,
            'extra_id' => 2
        ]);   
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 5,
            'extra_id' => 1
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 5,
            'extra_id' => 2
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 5,
            'extra_id' => 3
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 5,
            'extra_id' => 4
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 6,
            'extra_id' => 1
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 6,
            'extra_id' => 2
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 6,
            'extra_id' => 5
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 7,
            'extra_id' => 1
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 7,
            'extra_id' => 2
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 7,
            'extra_id' => 6
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 8,
            'extra_id' => 1
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 8,
            'extra_id' => 2
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 8,
            'extra_id' => 7
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 9,
            'extra_id' => 1
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 9,
            'extra_id' => 2
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 9,
            'extra_id' => 5
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 9,
            'extra_id' => 8
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 10,
            'extra_id' => 1
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 10,
            'extra_id' => 2
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 10,
            'extra_id' => 9
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 10,
            'extra_id' => 10
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 11,
            'extra_id' => 1
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 11,
            'extra_id' => 2
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 11,
            'extra_id' => 11
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 11,
            'extra_id' => 12
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 11,
            'extra_id' => 13
        ]);
        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 12,
            'extra_id' => 1
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 12,
            'extra_id' => 2
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 12,
            'extra_id' => 11
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 12,
            'extra_id' => 12
        ]);

        DB::table('pizza_has_extra')->insert([
            'pizza_id' => 12,
            'extra_id' => 13
        ]);



    }
}
