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
                'name' => 'Emily Johnson',
                'avatar' => 'tpl_site/images/testimonial/1.webp',
                'content' => 'A equipe foi extremamente atenciosa e explicou cada resultado com clareza. Saí com o tratamento ideal e com muito mais segurança para o meu dia a dia.',
                'rating' => 5,
                'localization' => '15 March 2025',
                'sort_order' => 1,
                'status' => $statusEnabled->id,
            ],
            [
                'name' => 'Michael Lee',
                'avatar' => 'tpl_site/images/testimonial/2.webp',
                'content' => 'Levei meu filho para um exame e ele se sentiu acolhido o tempo todo. A médica foi cuidadosa, gentil e nos orientou sobre cada etapa do tratamento.',
                'rating' => 5,
                'localization' => '2 February 2025',
                'sort_order' => 2,
                'status' => $statusEnabled->id,
            ],
            [
                'name' => 'Sophia Martinez',
                'avatar' => 'tpl_site/images/testimonial/3.webp',
                'content' => 'Convivi com desconforto nos olhos por muito tempo, mas o plano indicado trouxe alívio rápido. A equipe acompanhou cada evolução e garantiu meu bem-estar.',
                'rating' => 5,
                'localization' => '20 January 2025',
                'sort_order' => 3,
                'status' => $statusEnabled->id,
            ],
            [
                'name' => 'David Wilson',
                'avatar' => 'tpl_site/images/testimonial/4.webp',
                'content' => 'Os equipamentos são modernos e muito precisos. Recebi todas as orientações com transparência e hoje sigo o tratamento confiante na minha saúde ocular.',
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
