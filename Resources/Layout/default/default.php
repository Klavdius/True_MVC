<?php

/**
 * default base maket
 */

return [
    'root' => [
        'children' => [
            'content'=> [
                'type' => '\\Core\\Block\\Template',
                'template' => 'default/default/content.phtml',
                'children' => [
                    'top'=> [
                        'type' => '\\App\\View\\Block\\Content\\Top',
                        'template'=>'default/default/content/top.phtml'
                    ],
//                    'middle'=> [
//                        'type'=>'\\Core\\Block\\Template',
//                        'template'=>'default/default/content/middle.phtml'
//                    ],
//                    'bottom'=> [
//                        'type'=>'\\Core\\Block\\Template',
//                        'template'=>'default/default/content/bottom.phtml'
//                    ]
                ]
            ]
        ]
    ]
];