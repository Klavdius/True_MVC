<?php

return [
    'root' => [

        'children' => [
            'head' =>[
                'type' => '\\Core\\Block\\Template',
                'template' => 'table/table/head.phtml'
            ],
            'content'=> [
                'type' => '\\Core\\Block\\Template',
                'template' => 'default/default/content.phtml',
                'children' => [
                    'middle'=> [
                        'type'=>'\\App\\View\\Block\\Content\\Middle',
                        'template'=>'table/table/content/middle.phtml'
                    ]
                ]
            ]
        ]
    ]
];