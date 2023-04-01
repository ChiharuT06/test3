<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Position::create([
            'name' => 'A-1',
        ]);  
    
    Position::create([
            'name' => 'A-2',
        ]); 
    
    Position::create([
            'name' => 'A-3',
        ]);     
    
    Position::create([
            'name' => 'B-1',
        ]);  
    
    Position::create([
            'name' => 'B-2',
        ]); 
    
    Position::create([
            'name' => 'B-3',
        ]);
    
    Position::create([
            'name' => 'C-1',
        ]);  
    
    Position::create([
            'name' => 'C-2',
        ]); 
    
    Position::create([
            'name' => 'C-3',
        ]);
    
    
    }
}
