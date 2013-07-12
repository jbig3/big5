<?php
return array(

    'service_manager' => array(
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),

    'translator' => array(
        'translation_file_patterns' => array(
            array(
                'type'         => 'gettext',
                'base_dir'     => realpath(__DIR__ . '/../language'),
                'pattern'      => '%s.mo',
            ),
        ),
//        'cache' => array(
//            'adapter' => array(
//                'name' => 'filesystem',
//                'options' => array(
//                    'cache_dir'  => realpath(BIG5_ROOT . '/data/cache/objects'),
//                    'ttl'        => 30,
//                ),
//            ),
//            'plugins' => array(
//                'serializer'
//            ),
//        ),
    ),

);

