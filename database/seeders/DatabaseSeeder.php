<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Listing::factory(6)->create();

        // Listing::create([
        //     'title' => 'Land For Sale',
        //     'tags' => 'Land,Sale',
        //     'property' => 'Land',
        //     'location' => 'Bhaisipati,Lalitpur',
        //     'email' => 'xyz@email.com',
        //     'website' => 'realestate.com',
        //     'description' => 'Located at peaceful environment with the rapid pace of infrastructure development
        //     this property is the best for home as well as official purpose.',
        // ]);

        // Listing::create([
        //     'title' => 'Office,Retail Shop',
        //     'tags' => 'Land,Building,Sale,Office',
        //     'property' => 'Land,Building',
        //     'location' => 'Newroad,Kathmandu',
        //     'email' => 'abc@email.com',
        //     'website' => 'realestate.com',
        //     'description' => 'Located at the heart of the city, the most value this property offers is the business
        //     hub that it has.From retail store,wholesale store and office it gives the buyer a lot of advantages in 
        //     building their business or renting them too',

        // ]
        // );
    }
}
