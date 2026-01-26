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
            ['title' => 'Abertura e Regularização de Empresa', 'description' => 'Especializados no processo de abertura, alteração e regularização de empresas, com acesso direto aos sistemas dos órgãos responsáveis.', 'image' => 'tpl_site/images/services/1.webp', 'link' => '/#contato', 'icon' => 'fas fa-building', 'status' => $statusEnabled->id, 'sort_order' => 1],
            ['title' => 'Escrita Fiscal', 'description' => 'Realizamos a escrituração das notas fiscais de entrada e saída, apuração de impostos e acompanhamento de obrigações assessórias mensais e anuais.', 'image' => 'tpl_site/images/services/2.webp', 'link' => '/#contato', 'icon' => 'fas fa-file-invoice-dollar', 'status' => $statusEnabled->id, 'sort_order' => 2],
            ['title' => 'Contabilidade Geral', 'description' => 'Atendemos empresas de pequeno e médio porte com atividades de Serviços, Comércio e Transportadoras. Lançamentos contábeis mensais e rotinas de escrituração.', 'image' => 'tpl_site/images/services/3.webp', 'link' => '/#contato', 'icon' => 'fas fa-calculator', 'status' => $statusEnabled->id, 'sort_order' => 3],
        ];
        
        foreach ($specialties as $specialty) {
            Specialty::create($specialty);
        }
    }
}

