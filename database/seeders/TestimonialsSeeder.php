<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use App\Models\Status;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('testimonials')->delete();

        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        $testimonials = [
            [
                'name' => 'Carlos Silva',
                'avatar' => 'tpl_site/images/testimonial/1.webp',
                'content' => 'A SG Serviços abriu minha empresa de forma rápida e eficiente. O atendimento foi humanizado e todas as informações foram passadas com clareza. Recomendo!',
                'rating' => 5,
                'localization' => '15 March 2025',
                'sort_order' => 1,
                'status' => $statusEnabled->id,
            ],
            [
                'name' => 'Maria Santos',
                'avatar' => 'tpl_site/images/testimonial/2.webp',
                'content' => 'Terceirizei toda a parte fiscal da minha empresa com a SG Serviços e foi a melhor decisão. Tenho minhas CNDs em dia e o suporte no Simples Nacional é excelente.',
                'rating' => 5,
                'localization' => '2 February 2025',
                'sort_order' => 2,
                'status' => $statusEnabled->id,
            ],
            [
                'name' => 'João Oliveira',
                'avatar' => 'tpl_site/images/testimonial/3.webp',
                'content' => 'A agilidade nos processos e o compromisso com resultados são impressionantes. A equipe sempre está disponível para esclarecer dúvidas e orientar sobre questões fiscais.',
                'rating' => 5,
                'localization' => '20 January 2025',
                'sort_order' => 3,
                'status' => $statusEnabled->id,
            ],
            [
                'name' => 'Ana Costa',
                'avatar' => 'tpl_site/images/testimonial/4.webp',
                'content' => 'Escritório contábil moderno e inovador. A tecnologia utilizada facilita muito o processo e o atendimento online é muito prático. Estou muito satisfeita com os serviços.',
                'rating' => 5,
                'localization' => '8 December 2024',
                'sort_order' => 4,
                'status' => $statusEnabled->id,
            ],
        ];
        
        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
