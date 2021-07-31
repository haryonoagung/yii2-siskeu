<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'formatter' => [
        'thousandSeparator' => ',',
        'currencyCode' => 'Rp',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
