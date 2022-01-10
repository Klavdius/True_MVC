<?php
// основа

return [
    'root'=>[
        'type' => '\\Core\\Block\\Template',
        'template' => 'page/3string.phtml',
        'children' =>[
            'head'=>[
                'type' => '\\Core\\Block\\Template',
                'template' =>'page/head.phtml'
            ],
            'header'=>[
                'type' => '\\Core\\Block\\Template',
                'template' =>'page/header.phtml'
            ],
            'content'=>[
                'type'=> '\\Core\\Block\\Template',
                'template' => 'page/content.phtml'
            ],
            'footer'=>[
                'type'=>'\\Core\\Block\\Template',
                'template'=>'page/footer.phtml'
            ]
        ]
    ]
];


