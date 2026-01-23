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
                'title' => 'Abertura e Regularização de Empresa',
                'slug' => 'abertura-e-regularizacao-de-empresa',
                'description' => '<p>A empresa SG Serviços é especializada no processo de abertura, alteração e regularização de empresas, com a ajuda das tecnologias digitais e com acesso direto aos sistemas criados para integrarem os órgãos responsáveis como Prefeituras, Receita Federal e Estadual, Junta Comercial e os Cartórios.</p><p>Nossa experiência vivenciada na área permite afirmar a aprovação dos clientes e a qualidade dos serviços, como também contribui muito para agilizar o processo.</p>',
                'thumb' => 'tpl_site/images/services/1.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 1,
            ],
            [
                'title' => 'Escrita Fiscal',
                'slug' => 'escritura-fiscal',
                'description' => '<p>O setor fiscal da SG Serviços realiza a escrituração das notas fiscais de entrada e saída das empresas, no qual o transporte eletrônico dos arquivos XML é feitos por meio digital de acesso ao sistema. Apura e prepara as guias dos impostos, Federais, Estaduais e Municipais.</p><p>Acompanha "Empresas do simples" que precisam de cálculos mensais referentes à receita para apuração da alíquota correta. Também atendemos as obrigações assessórias que são efetuadas de forma mensal e anual pelo setor fiscal, afim de manter os órgãos de fiscalização com todas as informações necessárias para manter o controle conforme legislações vigentes.</p>',
                'thumb' => 'tpl_site/images/services/2.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 2,
            ],
            [
                'title' => 'Contabilidade Geral',
                'slug' => 'contabilidade-geral',
                'description' => '<p>A SG Serviços trabalha com empresas de pequeno, médio porte com atividades de Serviços, Comércio, transportadoras.</p><p>Anualmente é feito uma análise para saber qual a melhor forma de atuação para as empresas. Mensalmente efetuamos lançamentos contábeis de todas as receitas e despesas. Realiza todas as rotinas de escrituração contábil conforme legislação vigente.</p>',
                'thumb' => 'tpl_site/images/services/3.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 3,
            ],
            [
                'title' => 'Terceirização da Área Fiscal e de DP/RH',
                'slug' => 'terceirizacao-da-area-fiscal-e-de-dp-rh',
                'description' => '<p>Terceirize as tarefas fiscais e de departamento pessoal de sua empresa com a SG Serviços e tenha tranquilidade para focar no seu negócio.</p><p><strong>Empresa Simples – Serviços Oferecidos:</strong></p><ul><li>Tenha suas CND\'s em dia</li><li>Suporte completo no Simples Nacional</li><li>Redução de custos com apuração de impostos</li><li>Acompanhamento de pendências fiscais</li><li>Parcelamentos e simulações</li><li>Acompanhamento do limite do Simples Nacional e MEI</li></ul>',
                'thumb' => 'tpl_site/images/services/4.webp',
                'status' => $statusEnabled->id,
                'sort_order' => 4,
            ],
        ];
        
        foreach ($services as $service) {
            Service::create($service);
        }
    }
}