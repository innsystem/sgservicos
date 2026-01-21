<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hero;
use App\Models\Status;

class HeroesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('heroes')->delete();
        
        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        $statistics = [
            [
                'title' => 'Anos dedicados à saúde ocular',
                'value' => '+X',
                'description' => ''
            ],
            [
                'title' => 'Pacientes atendidos na região',
                'value' => '+1000',
                'description' => ''
            ],
            [
                'title' => 'Especialidades oftalmológicas',
                'value' => '8',
                'description' => ''
            ],
            [
                'title' => 'Suporte e acompanhamento',
                'value' => '24h',
                'description' => ''
            ],
        ];
        
        Hero::create([
            'title' => 'Excelência em Oftalmologia no Sudeste Goiano',
            'description' => 'Sejam bem-vindos ao maior hospital de olhos do Sudeste Goiano, referência em tecnologia, excelência médica e atendimento humanizado. Agora, estamos ainda mais próximos de você com a nova unidade em Pires do Rio.',
            'button_text' => 'Agendar agora',
            'button_link' => '/#contato',
            'background_image' => 'tpl_site/images/background/1.webp',
            'satisfied_patients_count' => '24k',
            'satisfied_patients_label' => 'Pacientes satisfeitos',
            'statistics' => $statistics,
            'status' => $statusEnabled->id,
            'sort_order' => 1,
        ]);
    }
}

