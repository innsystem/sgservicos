<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Status;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('services')->delete();
        
        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        $services = [
            [
                'title' => 'Oftalmologia Geral',
                'slug' => 'oftalmologia-geral',
                'description' => '<p>Atendimento completo para prevenção, diagnóstico e tratamento de doenças oculares.</p>',
                'thumb' => 'tpl_site/images/services/1.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 1,
            ],
            [
                'title' => 'Cirurgia de Catarata',
                'slug' => 'cirurgia-de-catarata',
                'description' => '<p>Procedimentos modernos e seguros, com recuperação rápida e visão renovada.</p>',
                'thumb' => 'tpl_site/images/services/2.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 2,
            ],
            [
                'title' => 'Cirurgia Refrativa',
                'slug' => 'cirurgia-refrativa',
                'description' => '<p>Tratamentos a laser para corrigir miopia, hipermetropia e astigmatismo.</p>',
                'thumb' => 'tpl_site/images/services/3.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 3,
            ],
            [
                'title' => 'Retina e Vítreo',
                'slug' => 'retina-e-vitreo',
                'description' => '<p>Diagnóstico e tratamento de retinopatias, degeneração macular e descolamentos.</p>',
                'thumb' => 'tpl_site/images/services/4.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 4,
            ],
            [
                'title' => 'Glaucoma',
                'slug' => 'glaucoma',
                'description' => '<p>Avaliação completa, diagnóstico precoce e controle contínuo com tecnologia de ponta.</p>',
                'thumb' => 'tpl_site/images/services/5.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 5,
            ],
            [
                'title' => 'Oftalmoplástica & Oftalmopediatria',
                'slug' => 'oftalmoplastica-oftalmopediatria',
                'description' => '<p>Tratamentos funcionais e estéticos, além do acompanhamento especializado para crianças.</p>',
                'thumb' => 'tpl_site/images/services/6.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 6,
            ],
        ];
        
        foreach ($services as $service) {
            Service::create($service);
        }
    }
}