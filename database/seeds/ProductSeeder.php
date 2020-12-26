<?php

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
        $record = [
    [
        "description"=> "Screwdriver",
        "category"=> "1",
        "price"=> "9.75"
    ],
    [
        "description"=> "Electric screwdriver",
        "category"=> "1",
        "price"=> "49.50"
    ],
    [
        "description"=> "Basic on-off switch",
        "category"=> "2",
        "price"=> "4.99"
    ],
    [
        "description"=> "Press button",
        "category"=> "2",
        "price"=> "4.99"
    ],
    [
        "description"=> "Switch with motion detector",
        "category"=> "2",
        "price"=> "12.95"
    ]
];
        \Illuminate\Support\Facades\DB::table('products')->insert($record);
    }
}
