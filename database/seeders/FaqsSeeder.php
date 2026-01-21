<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\Status;

class FaqsSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('faqs')->delete();
        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        $faqs = [
            ['category' => 'Consultas e exames', 'question' => 'Como agendar uma consulta?', 'answer' => 'Agende pelo site, telefone ou WhatsApp. Em casos de urgência, fazemos o possível para encaixar no mesmo dia.', 'status' => $statusEnabled->id, 'sort_order' => 1],
            ['category' => 'Consultas e exames', 'question' => 'Preciso de encaminhamento médico?', 'answer' => 'Para consultas eletivas não é necessário. Para procedimentos específicos, seguimos as orientações do seu médico ou convênio.', 'status' => $statusEnabled->id, 'sort_order' => 2],
            ['category' => 'Consultas e exames', 'question' => 'Com que frequência devo fazer exames oftalmológicos?', 'answer' => 'Adultos devem consultar a cada 1 ou 2 anos. Crianças, idosos e pacientes com fatores de risco precisam de acompanhamento mais frequente.', 'status' => $statusEnabled->id, 'sort_order' => 3],
            ['category' => 'Consultas e exames', 'question' => 'Quanto tempo dura um exame?', 'answer' => 'Em média, 30 a 45 minutos, variando conforme os exames solicitados e a necessidade de dilatação das pupilas.', 'status' => $statusEnabled->id, 'sort_order' => 4],
            ['category' => 'Consultas e exames', 'question' => 'O que levar para a consulta?', 'answer' => 'Documento com foto, carteirinha do convênio, óculos ou lentes em uso e a relação de medicamentos ou exames anteriores.', 'status' => $statusEnabled->id, 'sort_order' => 5],
            ['category' => 'Tratamentos e procedimentos', 'question' => 'Vocês realizam cirurgias a laser?', 'answer' => 'Sim. Realizamos avaliação completa para cirurgias refrativas e acompanhamos todo o pré e pós-operatório com equipe especializada.', 'status' => $statusEnabled->id, 'sort_order' => 1],
            ['category' => 'Tratamentos e procedimentos', 'question' => 'Quais tratamentos oferecem para olho seco?', 'answer' => 'Contamos com colírios específicos, terapias avançadas e acompanhamento contínuo para controlar sintomas e causas.', 'status' => $statusEnabled->id, 'sort_order' => 2],
            ['category' => 'Tratamentos e procedimentos', 'question' => 'Posso receber meus óculos no mesmo dia?', 'answer' => 'Em muitos casos sim. Possuímos parceiros que agilizam a confecção e entregam em prazos reduzidos.', 'status' => $statusEnabled->id, 'sort_order' => 3],
            ['category' => 'Tratamentos e procedimentos', 'question' => 'Vocês tratam glaucoma e catarata?', 'answer' => 'Sim. Fazemos diagnóstico, tratamento clínico e cirúrgico, além do acompanhamento periódico de cada condição.', 'status' => $statusEnabled->id, 'sort_order' => 4],
            ['category' => 'Tratamentos e procedimentos', 'question' => 'Lentes de contato são seguras para crianças?', 'answer' => 'Quando indicadas por um especialista e com higiene adequada, são seguras a partir dos 10–12 anos, sempre com supervisão.', 'status' => $statusEnabled->id, 'sort_order' => 5],
        ];
        
        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}

