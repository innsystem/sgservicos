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
                'title' => 'Anos de experiência',
                'value' => '+2',
                'description' => ''
            ],
            [
                'title' => 'Clientes atendidos',
                'value' => '+100',
                'description' => ''
            ],
            [
                'title' => 'Serviços oferecidos',
                'value' => '3',
                'description' => ''
            ],
            [
                'title' => 'Atendimento',
                'value' => 'Online',
                'description' => ''
            ],
        ];
        
        Hero::create([
            'title' => 'Soluções Contábeis Eficientes e Personalizadas',
            'description' => 'Oferecemos soluções contábeis eficientes, personalizadas e acessíveis, simplificando processos e garantindo tranquilidade fiscal para nossos clientes. Escritório contábil moderno, inovador e próximo do cliente.',
            'button_text' => 'Fale conosco',
            'button_link' => '/#contato',
            'background_image' => 'tpl_site/images/background/1.webp',
            'satisfied_patients_count' => '+100',
            'satisfied_patients_label' => 'Clientes satisfeitos',
            'statistics' => $statistics,
            'status' => $statusEnabled->id,
            'sort_order' => 1,
        ]);
    }
}

