<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Guest;

class guestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
     Guest::create([
            'guest_name' => '佐藤さん',
        ]);  
    
     Guest::create([
            'guest_name' => '田中さん',
        ]); 
    
     Guest::create([
            'guest_name' => '高橋さん',
        ]); 
    
        
    
        
        //
    }
}
