<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;
use App\Models\Status;

class AboutsSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('abouts')->delete();
        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        $features = [
            'Proximidade e atendimento humanizado',
            'Clareza e objetividade',
            'Inovação e tecnologia',
            'Agilidade nos processos',
            'Compromisso com resultados',
            'Respeito às pessoas e aos negócios',
        ];
        
        About::create([
            'subtitle' => 'Sobre a SG Serviços',
            'title' => 'Escritório contábil moderno, inovador e próximo do cliente',
            'description' => 'Fundada em 29-10-2024, a SG Serviços oferece soluções contábeis eficientes, personalizadas e acessíveis, simplificando processos e garantindo tranquilidade fiscal para nossos clientes.',
            'description_2' => 'Somos reconhecidos pela agilidade, clareza das informações e excelência no atendimento. Trabalhamos com empresas de pequeno e médio porte, com atividades de Serviços, Comércio e Transportadoras.',
            'features' => $features,
            'button_text' => 'Conheça nossos serviços',
            'button_link' => '/#contato',
            'image_1' => 'fotos/about-three-img-1.jpg',
            'image_2' => 'fotos/about-three-img-2.jpg',
            'status' => $statusEnabled->id,
            'sort_order' => 1,
        ]);
    }
}

