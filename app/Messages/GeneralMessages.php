<?php

return [
    'email' => [
        'welcome' => [
            'subject' => 'Bem-vindo ao nosso sistema!',
            'body' => 'Estamos felizes em tê-lo conosco!',
        ],


        'password_recovery' => [
            'subject' => 'Recuperação de Senha',
            'body' => '<p>Foi solicitada uma recuperação de senha para seu e-mail {{email_hidden}}.</p>
                       <p>Digite o código abaixo para redefinir sua senha.</p>
                       <p>{{password_code}}</p>
                       ',
        ],
    ],

    'whatsapp' => [
        'welcome' => 'Olá {{name}}, bem-vindo ao nosso sistema!',
    ],
];
