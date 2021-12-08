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
                        'type' => '\\App\\View\\Block\\Content\\Start',
                        'template'=>'default/default/content/start.phtml'
                    ]
                  ]
            ]
        ]
    ]
];