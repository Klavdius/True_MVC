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
                        'type'=>'\\App\\View\\Block\\dbActive\\dbConnect',
                        'template'=>'db/db/content/dbList.phtml'
                    ]
                ]
            ]
        ]
    ]
];