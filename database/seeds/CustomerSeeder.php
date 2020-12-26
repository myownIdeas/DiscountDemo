<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $record =  [
            [

            'name' => 'coca cola',
            'since' => now(),
            'revenue' => '492.12',
        ],
        [

        "name"=> "Teamleader",
        "since"=> "2015-01-15",
        "revenue"   => "1505.95"
    ],
    [
        "name"=> "Jeroen De Wit",
        "since"=> "2016-02-11",
        "revenue"=> "0.00"
    ]
        ];
        \Illuminate\Support\Facades\DB::table('customer')->insert($record);
    }
}
