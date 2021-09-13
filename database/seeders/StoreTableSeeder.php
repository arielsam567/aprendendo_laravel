<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{

    public function run()
    {
        $stores = \App\Models\Store::all();

        foreach($stores as $store)
        {
            $store->products()->save(factory(\App\Models\Product::class)->make());
        }
    }
}
