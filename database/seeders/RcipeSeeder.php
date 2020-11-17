<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\MessageBag;


class RcipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'title' => Str::random(''),
            'instructions' => Str::random(20),
            'imageUrl' => Str::title('https://thecozycook.com/wp-content/uploads/2019/08/Bolognese-Sauce.jpg')
        ]);
    }
}
