<?php

return [
    'root' => [
        'children' => [
            'head' =>[
                'type' => '\\Core\\Block\\Template',
                'template' => 'db/db/head.phtml'
            ],
            'content'=> [
                'type' => '\\Core\\Block\\Template',
                'template' => 'default/default/content.phtml',
                'children' => [
                    'middle'=> [
                        'type'=>'\\App\\View\\Block\\dbActive\\dbCreateConnect',
                        'template'=>'db_create/db_create/content/db_create.phtml'
                    ]
                ]
            ]
        ]
    ]
];