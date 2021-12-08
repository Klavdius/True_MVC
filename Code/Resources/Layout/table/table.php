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
                    'top'=> [
                        'type' => '\\App\\View\\Block\\Content\\Top',
                        'template'=>'table/table/content/top.phtml'
                    ],
                    'middle'=> [
                        'type'=>'\\App\\View\\Block\\Content\\Middle',
                        'template'=>'table/table/content/middle.phtml'
                    ],
                    'bottom'=> [
                        'type'=>'\\App\\View\\Block\\Content\\Bottom',
                        'template'=>'table/table/content/bottom.phtml'
                    ]
                ]
            ]
        ]
    ]
];