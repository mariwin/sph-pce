<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Populate industries
        factory(App\Industries::class, 15)->create();

        // Populate jobs
        factory(App\Jobs::class, 20)->create();

        // Get all the industries attaching up to 3 random industries to each jobs
        $industries = App\Industries::all();

        // Populate the pivot table
        App\Jobs::all()->each(function ($jobs) use ($industries) { 
            $jobs->industries()->attach(
                $industries->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });
    }
}
