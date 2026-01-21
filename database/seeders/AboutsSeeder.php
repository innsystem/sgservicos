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
            'Atendimento humanizado',
            'Nova unidade em Pires do Rio',
            'Equipamentos de alta tecnologia',
            'Equipe multidisciplinar especializada',
        ];
        
        About::create([
            'subtitle' => 'Sobre a SG Serviços',
            'title' => 'Hospital de olhos referência em tecnologia e cuidado',
            'description' => 'Com mais de X anos de experiência dedicados à saúde ocular, contamos com uma equipe de oftalmologistas especialistas, equipamentos de alta tecnologia e a confiança de centenas de pacientes satisfeitos em toda a região.',
            'description_2' => 'Nossa estrutura foi planejada para oferecer conforto, segurança e acolhimento, em um ambiente totalmente acessível e preparado para proporcionar uma experiência única para você e sua família.',
            'features' => $features,
            'button_text' => 'Conheça nossos tratamentos',
            'button_link' => '/#contato',
            'image_1' => 'tpl_site/images/misc/l1.webp',
            'image_2' => 'tpl_site/images/misc/s1.webp',
            'status' => $statusEnabled->id,
            'sort_order' => 1,
        ]);
    }
}

