<?php

use Illuminate\Database\Seeder;
use App\System;
class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        System::create([
            'type'=> '1',
            'quantity'=> '0',
            'price'=> '0',
            'active'=> false,
        ]);
        System::create([
            'type'=> '2',
            'quantity'=> '0',
            'price'=> '0',
            'active'=> false,

        ]);
        System::create([
            'type'=> '3',
            'quantity'=> '0',
            'price'=> '0',
            'active'=> false,

        ]);
        System::create([
            'type'=> '4',
            'quantity'=> '0',
            'price'=> '0',
            'active'=> false,

        ]);
    }
}
