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
            ['category' => 'Abertura e Regularização', 'question' => 'Quanto tempo leva para abrir uma empresa?', 'answer' => 'O tempo varia conforme o tipo de empresa e a região, mas geralmente o processo leva de 7 a 30 dias. Utilizamos tecnologias digitais que agilizam a integração com os órgãos responsáveis.', 'status' => $statusEnabled->id, 'sort_order' => 1],
            ['category' => 'Abertura e Regularização', 'question' => 'Quais documentos são necessários para abrir uma empresa?', 'answer' => 'Os documentos variam conforme o tipo societário, mas geralmente incluem: RG, CPF, comprovante de residência, certidão de casamento (se casado) e comprovante de ocupação do imóvel. Nossa equipe orienta sobre todos os documentos necessários.', 'status' => $statusEnabled->id, 'sort_order' => 2],
            ['category' => 'Abertura e Regularização', 'question' => 'Vocês fazem alteração contratual de empresas?', 'answer' => 'Sim. Realizamos alterações contratuais, mudanças de endereço, alteração de capital social, inclusão ou exclusão de sócios e outras alterações necessárias.', 'status' => $statusEnabled->id, 'sort_order' => 3],
            ['category' => 'Escrituração Fiscal', 'question' => 'Como funciona a escrituração fiscal?', 'answer' => 'Realizamos a escrituração das notas fiscais de entrada e saída, apuração de impostos federais, estaduais e municipais, além do acompanhamento de obrigações assessórias mensais e anuais.', 'status' => $statusEnabled->id, 'sort_order' => 1],
            ['category' => 'Escrituração Fiscal', 'question' => 'Vocês atendem empresas do Simples Nacional?', 'answer' => 'Sim. Acompanhamos empresas do Simples Nacional com cálculos mensais referentes à receita para apuração da alíquota correta, além de orientações sobre limites e enquadramentos.', 'status' => $statusEnabled->id, 'sort_order' => 2],
            ['category' => 'Escrituração Fiscal', 'question' => 'Como são enviadas as obrigações fiscais?', 'answer' => 'O transporte eletrônico dos arquivos XML é feito por meio digital, com acesso direto aos sistemas dos órgãos responsáveis, garantindo agilidade e segurança no processo.', 'status' => $statusEnabled->id, 'sort_order' => 3],
            ['category' => 'Contabilidade Geral', 'question' => 'Quais tipos de empresa vocês atendem?', 'answer' => 'Atendemos empresas de pequeno e médio porte com atividades de Serviços, Comércio e Transportadoras. Realizamos análise anual para determinar a melhor forma de atuação para cada empresa.', 'status' => $statusEnabled->id, 'sort_order' => 1],
            ['category' => 'Contabilidade Geral', 'question' => 'Como funciona o acompanhamento contábil?', 'answer' => 'Mensalmente efetuamos lançamentos contábeis de todas as receitas e despesas, realizando todas as rotinas de escrituração contábil conforme legislação vigente.', 'status' => $statusEnabled->id, 'sort_order' => 2],
            ['category' => 'Contabilidade Geral', 'question' => 'Vocês oferecem consultoria contábil?', 'answer' => 'Sim. Oferecemos consultoria para auxiliar na tomada de decisões estratégicas, análise de viabilidade e orientações sobre a melhor forma de atuação para sua empresa.', 'status' => $statusEnabled->id, 'sort_order' => 3],
            ['category' => 'Geral', 'question' => 'Como funciona o atendimento?', 'answer' => 'Oferecemos atendimento online no horário comercial. Você pode entrar em contato pelo telefone (41) 99860-2603 ou através do nosso site para esclarecer dúvidas e solicitar orçamentos.', 'status' => $statusEnabled->id, 'sort_order' => 1],
        ];
        
        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}

