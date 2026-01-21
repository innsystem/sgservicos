<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Status;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('teams')->delete();

        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        // Teams serão criados via admin, mas deixamos o seeder preparado
        // Se houver dados hardcoded na home, adicione aqui
    }
}

