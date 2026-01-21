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
            ['title' => 'Mapeamento de Retina', 'description' => 'Exame detalhado do fundo do olho para detectar alterações na retina, mácula e nervo óptico.', 'icon' => 'fas fa-eye', 'status' => $statusEnabled->id, 'sort_order' => 1],
            ['title' => 'Tonometria de Aplanação', 'description' => 'Mede a pressão intraocular com precisão, fundamental para prevenir e acompanhar o glaucoma.', 'icon' => 'fas fa-tachometer-alt', 'status' => $statusEnabled->id, 'sort_order' => 2],
            ['title' => 'Paquimetria', 'description' => 'Avalia a espessura da córnea e auxilia no diagnóstico de doenças corneanas e cirurgias refrativas.', 'icon' => 'fas fa-diagnoses', 'status' => $statusEnabled->id, 'sort_order' => 3],
            ['title' => 'Ceratoscopia', 'description' => 'Mapeia a curvatura da córnea, permitindo identificar irregularidades e diagnosticar ceratocone.', 'icon' => 'fas fa-project-diagram', 'status' => $statusEnabled->id, 'sort_order' => 4],
        ];
        
        foreach ($exams as $exam) {
            Exam::create($exam);
        }
    }
}

