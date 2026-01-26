<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
use App\Models\Status;

class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('sliders')->delete();
        
        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        // Número padrão do WhatsApp baseado no telephone do SettingsSeeder: (41) 99860-2603
        $defaultWhatsApp = 'https://api.whatsapp.com/send/?phone=5541998602603';
        
        $sliders = [
            [
                'title' => 'Soluções Contábeis Eficientes e Confiáveis',
                'href' => $defaultWhatsApp,
                'target' => '_blank',
                'image' => 'fotos/main-slider-3-1.jpg',
                'image_position' => 'center',
                'status' => $statusEnabled->id,
            ],
            [
                'title' => 'Tranquilidade Fiscal para Sua Empresa',
                'href' => $defaultWhatsApp,
                'target' => '_blank',
                'image' => 'fotos/main-slider-3-2.jpg',
                'image_position' => 'center',
                'status' => $statusEnabled->id,
            ],
            [
                'title' => 'Atendimento Online e Tecnologia de Ponta',
                'href' => $defaultWhatsApp,
                'target' => '_blank',
                'image' => 'fotos/main-slider-3-3.jpg',
                'image_position' => 'center',
                'status' => $statusEnabled->id,
            ],
        ];
        
        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
