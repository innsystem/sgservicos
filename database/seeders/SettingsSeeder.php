<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'logo', 'value' => null],
            ['key' => 'favicon', 'value' => null],
            ['key' => 'meta_title', 'value' => 'Bem-vindos | SG Serviços'],
            ['key' => 'meta_keywords', 'value' => 'contabilidade, serviços contábeis, abertura de empresa, escrituração fiscal, simples nacional, departamento pessoal, consultoria contábil'],
            ['key' => 'meta_description', 'value' => 'SG Serviços - Escritório contábil moderno e inovador. Oferecemos soluções contábeis eficientes, personalizadas e acessíveis. Abertura de empresas, escrituração fiscal e contabilidade geral.'],
            ['key' => 'script_head', 'value' => ''],
            ['key' => 'script_body', 'value' => ''],
            ['key' => 'site_name', 'value' => 'SG Serviços'],
            ['key' => 'site_proprietary', 'value' => 'SG Serviços LTDA'],
            ['key' => 'site_document', 'value' => '12.345.678/0001-90'],
            ['key' => 'site_email', 'value' => 'contato@sgservicos.com.br'],
            ['key' => 'telephone', 'value' => '(41) 99860-2603'],
            ['key' => 'cellphone', 'value' => '(41) 99860-2603'],
            ['key' => 'address', 'value' => 'Atendimento online - Horário comercial'],
            ['key' => 'hour_open', 'value' => 'Horário comercial'],
            ['key' => 'client_id', 'value' => Str::uuid()],
            ['key' => 'client_secret', 'value' => Str::random(40)],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
