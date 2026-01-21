<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;
use App\Models\Status;

class SpecialtiesSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('specialties')->delete();
        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        $specialties = [
            ['title' => 'Oftalmologia Geral', 'description' => 'Atendimento completo para prevenção, diagnóstico e tratamento de doenças oculares.', 'image' => 'tpl_site/images/services/1.webp', 'link' => '/#contato', 'status' => $statusEnabled->id, 'sort_order' => 1],
            ['title' => 'Cirurgia de Catarata', 'description' => 'Procedimentos modernos e seguros, com recuperação rápida e visão renovada.', 'image' => 'tpl_site/images/services/2.webp', 'link' => '/#contato', 'status' => $statusEnabled->id, 'sort_order' => 2],
            ['title' => 'Cirurgia Refrativa', 'description' => 'Tratamentos a laser para corrigir miopia, hipermetropia e astigmatismo.', 'image' => 'tpl_site/images/services/3.webp', 'link' => '/#contato', 'status' => $statusEnabled->id, 'sort_order' => 3],
            ['title' => 'Retina e Vítreo', 'description' => 'Diagnóstico e tratamento de retinopatias, degeneração macular e descolamentos.', 'image' => 'tpl_site/images/services/4.webp', 'link' => '/#contato', 'status' => $statusEnabled->id, 'sort_order' => 4],
            ['title' => 'Glaucoma', 'description' => 'Avaliação completa, diagnóstico precoce e controle contínuo com tecnologia de ponta.', 'image' => 'tpl_site/images/services/5.webp', 'link' => '/#contato', 'status' => $statusEnabled->id, 'sort_order' => 5],
            ['title' => 'Oftalmoplástica & Oftalmopediatria', 'description' => 'Tratamentos funcionais e estéticos, além do acompanhamento especializado para crianças.', 'image' => 'tpl_site/images/services/6.webp', 'link' => '/#contato', 'status' => $statusEnabled->id, 'sort_order' => 6],
        ];
        
        foreach ($specialties as $specialty) {
            Specialty::create($specialty);
        }
    }
}

