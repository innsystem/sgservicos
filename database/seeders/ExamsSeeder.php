<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exam;
use App\Models\Status;

class ExamsSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('exams')->delete();
        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        $exams = [
            ['title' => 'Terceirização do setor fiscal | DP', 'description' => 'Terceirize o setor fiscal e departamento pessoal da sua empresa, garantindo eficiência e tranquilidade nos processos.', 'icon' => 'fas fa-clipboard-check', 'status' => $statusEnabled->id, 'sort_order' => 1],
            ['title' => 'Suporte Simples Nacional', 'description' => 'Acompanhamento completo do Simples Nacional, incluindo cálculos mensais e orientações sobre alíquotas.', 'icon' => 'fas fa-calculator', 'status' => $statusEnabled->id, 'sort_order' => 2],
            ['title' => 'Acompanhamento de Pendências', 'description' => 'Monitoramento constante de pendências fiscais e trabalhistas, com alertas e orientações para regularização.', 'icon' => 'fas fa-exclamation-triangle', 'status' => $statusEnabled->id, 'sort_order' => 3],
            ['title' => 'Parcelamentos e Simulações', 'description' => 'Análise de parcelamentos disponíveis e simulações de valores para facilitar a regularização da empresa.', 'icon' => 'fas fa-chart-line', 'status' => $statusEnabled->id, 'sort_order' => 4],
            ['title' => 'Suporte MEI- Simples Nacional', 'description' => 'Acompanhamento especializado para Microempreendedor Individual (MEI) e empresas do Simples Nacional, com orientações personalizadas.', 'icon' => 'fas fa-handshake', 'status' => $statusEnabled->id, 'sort_order' => 5],
        ];
        
        foreach ($exams as $exam) {
            Exam::create($exam);
        }
    }
}

